<?php
session_start();


$username = "";
$email    = "";
$errors = array(); 

$servidor = "localhost";
$usuario = "root";
$senha = "";
$db_name = "wdev_pokemon";

$db = mysqli_connect($servidor, $usuario, $senha, $db_name);

$query_treinadores = "SELECT * FROM TREINADOR";
$consulta_treinadores = mysqli_query($db, $query_treinadores);

// REGISTER USER

if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $nome = mysqli_real_escape_string($db, $_POST['nome']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $dinheiro = mysqli_real_escape_string($db, $_POST['dinheiro']);
    $genero = mysqli_real_escape_string($db, $_POST['genero']);
    $insignia = mysqli_real_escape_string($db, $_POST['insignia']);
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Login é requirido"); }
    if (empty($email)) { array_push($errors, "Email é requirido"); }
    if (empty($password_1)) { array_push($errors, "Senha é requirido"); }
    if ($password_1 != $password_2) {
      array_push($errors, "As senhas não batem");
    }
  
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM TREINADOR WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['username'] === $username) {
        array_push($errors, "Username already exists");
      }
  
      if ($user['email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
  
    if (count($errors) == 0) {

        $password = md5($password_1);
        $query = "INSERT INTO TREINADOR (username, email, password, nome, dinheiro, genero, insignia) 
                  VALUES('$username', '$email', '$password', '$nome', '$dinheiro','$genero', '$insignia')";
        
        $result = mysqli_query($db, $query);
        if($result) {
            echo "Success"; 
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Você está logado!";
            header('location: index.php');
           } 
        else { echo "erro";
        }
        
       
    }
  }

  // ADD POKÉMON

  if (isset($_POST['reg_pokemon'])) {
    // receive all input values from the form
    $pokedex_id = mysqli_real_escape_string($db, $_POST['id_pokedex']);
    $nome = mysqli_real_escape_string($db, $_POST['nome']);
    $foto = mysqli_real_escape_string($db, $_POST['photo']);
    $habilidade = mysqli_real_escape_string($db, $_POST['habilidade']);
    $nivel = mysqli_real_escape_string($db, $_POST['nivel']);
    $sexo = mysqli_real_escape_string($db, $_POST['sexo']);
    $tipo1 = mysqli_real_escape_string($db, $_POST['tipo1']);
    $tipo2 = mysqli_real_escape_string($db, $_POST['tipo2']);
    $shiny = mysqli_real_escape_string($db, $_POST['shiny']);
    if ($tipo2 == "") {
        $tipo2 = null;
    }
    $descricao = mysqli_real_escape_string($db, $_POST['descricao']);
    $username = $_SESSION['username'];

  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($pokedex_id)) { array_push($errors, "Pokedex ID é requirido"); }
    if (empty($nome)) { array_push($errors, "Nome é requirido"); }
    if (empty($foto)) { array_push($errors, "Foto é requirida"); }
    if (empty($habilidade)) { array_push($errors, "Habilidade é requirida"); }
    if (empty($nivel)) { array_push($errors, "Nível é requirido"); }
    if (empty($descricao)) { array_push($errors, "Descrição é requirida"); }


    if (count($errors) == 0) {
        $query = "INSERT INTO POKEMON (pokedex_id, nome, foto, habilidade, nivel, sexo, tipo1, tipo2, descricao, username_id, shiny) 
                  VALUES('$pokedex_id', '$nome', '$foto', '$habilidade', '$nivel','$sexo', '$tipo1', '$tipo2', '$descricao', '$username', '$shiny')";
        
        $result = mysqli_query($db, $query);
        if($result) {
            echo "Success"; 
            header('location: ?pagina=gerenciar');
           } 
        else { echo "erro";
        }
        
       
    }
  }

  if (isset($_POST['editar_pokemon'])) {
    $pokedex_id = mysqli_real_escape_string($db, $_POST['id_pokedex']);
    $nome = mysqli_real_escape_string($db, $_POST['nome']);
    $foto = mysqli_real_escape_string($db, $_POST['photo']);
    $habilidade = mysqli_real_escape_string($db, $_POST['habilidade']);
    $nivel = mysqli_real_escape_string($db, $_POST['nivel']);
    $sexo = mysqli_real_escape_string($db, $_POST['sexo']);
    $tipo1 = mysqli_real_escape_string($db, $_POST['tipo1']);
    $tipo2 = mysqli_real_escape_string($db, $_POST['tipo2']);
    $id_pokemon = mysqli_real_escape_string($db, $_POST['id_pokemon']);
    $shiny = mysqli_real_escape_string($db, $_POST['shiny']);
    if ($tipo2 == "") {
        $tipo2 = null;
    }
    $descricao = mysqli_real_escape_string($db, $_POST['descricao']);
    $username = $_SESSION['username'];

  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($pokedex_id)) { array_push($errors, "Pokedex ID é requirido"); }
    if (empty($nome)) { array_push($errors, "Nome é requirido"); }
    if (empty($foto)) { array_push($errors, "Foto é requirida"); }
    if (empty($habilidade)) { array_push($errors, "Habilidade é requirida"); }
    if (empty($nivel)) { array_push($errors, "Nível é requirido"); }
    if (empty($descricao)) { array_push($errors, "Descrição é requirida"); }


    if (count($errors) == 0) {
        $query = "UPDATE POKEMON SET pokedex_id='$pokedex_id', nome='$nome', foto='$foto', habilidade='$habilidade', nivel='$nivel', sexo='$sexo', tipo1='$tipo1', tipo2='$tipo2', descricao='$descricao', username_id='$username', shiny='$shiny' WHERE id = $id_pokemon";
        $result = mysqli_query($db, $query);
        if($result) {
            echo "Success"; 
            header('location: ?pagina=gerenciar');
           } 
        else { echo "erro";
        }
        
       
    }
  }

  // LOGIN USER
  
  if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    
  
    if (empty($username)) {
        array_push($errors, "Usuário requerido");
    }
    if (empty($password)) {
        array_push($errors, "Senha requerida");
        echo "$dinheiro";
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM TREINADOR WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Senha/Usuário incorretos");
        }
    }
  }

  


if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}