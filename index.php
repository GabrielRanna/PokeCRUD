<?php

# Base de dados
include 'includes/db.php';

#Cabeçalho
include 'includes/header.php';

#Conteúdo da página
if(isset($_GET['pagina'])){
    $pagina = $_GET['pagina'];
}
else{
    $pagina='home';
}

if($pagina == 'login'){
    include 'views/login.php';
}
elseif($pagina == 'treinadores'){
    include 'views/treinadores.php';
}
elseif($pagina == "cadastro"){
    include 'views/cadastro.php';
}
elseif($pagina == "gerenciar"){
    include 'views/gerenciar.php';
}
elseif($pagina == "cadastro_pokemon"){
    include 'views/cadastro_pokemon.php';
}
else{
    include 'views/home.php';
}

#Rodapé
include 'includes/footer.php';
