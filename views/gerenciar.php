<?php 

$username_id = $_SESSION['username'];
$busca = "SELECT * FROM POKEMON WHERE username_id = '$username_id' ";
$total_reg = "5";
$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$prefix = "gerenciar&";
$str = substr($url, strpos($url, $prefix) + strlen($prefix));
$str = (int)$str;

if (!$str) {
    $pc = "1";
} else {
    $pc = $str;
}

$inicio = $pc - 1;
$inicio = $inicio * $total_reg;

$limite = mysqli_query($db ,"$busca LIMIT $inicio,$total_reg");
$todos = mysqli_query($db,$busca);

$tr = mysqli_num_rows($todos); // verifica o número total de registros
$tp = $tr / $total_reg; // verifica o número total de páginas



?>
<div class="container">
    <h2 class="text-center">Gerenciar</h2>
    <div class="d-flex justify-content-end">
        <a href="?pagina=cadastro_pokemon"><button class=" mt-3 mb-3">Adicionar Pokemon</button></a>
    </div>
    
    <?php 
    $username_id = $_SESSION['username'];
    $query_pokemons = "SELECT * FROM POKEMON WHERE username_id = '$username_id' ";
    $consulta_pokemons = mysqli_query($db, $query_pokemons);
    if(mysqli_num_rows($consulta_pokemons)>0){
        echo"<table class='table table-bordered'> 
        <thead class='thead-dark'>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Foto</th>
                <th scope='col'>Nome</th>
                <th scope='col'>Tipo</th>
                <th scope='col'>Habilidade</th>
                <th scope='col'>Nível</th>
                <th scope='col'>Sexo</th>
                <th scope='col'>Descrição</th>
                <th scope='col'>Ações</th>
            </tr>
        </thead>
        <tbody>";
    while($pokemon = mysqli_fetch_array($limite)){
        echo"<tr>
                <th scope='row'>".$pokemon['pokedex_id']."</th>
                <td><img class='pokemon-photo' src='".$pokemon['foto']."'></td>
                <td>".$pokemon['nome']."</td>
                <td>".ucfirst($pokemon['tipo1'])." ".ucfirst($pokemon['tipo2'])."</td>
                <td>".$pokemon['habilidade']."</td>
                <td>".$pokemon['nivel']."</td>";
                if($pokemon['sexo'] == "macho"){
                    echo"<td><img class='pokemon-sex-symbol' src='images/symbol-male.png'></td>";
                }
                elseif($pokemon['sexo'] == "femea"){
                    echo"<td><img class='pokemon-sex-symbol' src='images/symbol-female.png'></td>";
                }
                else{
                    echo"<td><img class='pokemon-sex-symbol' src='images/symbol-asex.png'></td>";
                }
                echo"<td>".$pokemon['descricao']."</td>
                <td><a href='?pagina=cadastro_pokemon&editar=".$pokemon['id']."'><i class='fas fa-edit'></i></a> <a href='deleta_pokemon.php?id=".$pokemon['id']."'><i class='fas fa-trash'></i></a></td>
            </tr>";
    }
    echo"</tbody></table>";
    $anterior = $pc -1;
    $proximo = $pc +1;
    echo"<div class='d-flex justify-content-center mb-4 paginator'>";
    if ($pc>1) {
        echo " <a href='?pagina=gerenciar&$anterior'><i class='fas fa-arrow-left'></i> Anterior</a> ";
        }
    if ($pc<$tp and $pc>1){echo " |";}
    if ($pc<$tp) {
    echo " <a href='?pagina=gerenciar&$proximo'>Próxima <i class='fas fa-arrow-right'></i></a>";
    }

    }
    else{
        echo"<p class='text-center'>Não Há Pokémon</p>";
    }
    echo"</div>";

?>
</div>