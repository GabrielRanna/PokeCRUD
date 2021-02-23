<div class="container">
    <h2 class="text-center mt-5 mb-5">Treinadores</h2>
    <?php
        while($treinador = mysqli_fetch_array($consulta_treinadores)){
            
            echo"<div class='trainer'>";
            if($treinador['genero'] == 'masculino'){
                echo"<img src='images/male.png' class='img-trainer'>";
            }
            elseif($treinador['genero'] == 'feminino'){
                echo"<img src='images/female.png' class='img-trainer'>";
            }
            else{
                echo"<img src='images/other.png' class='img-trainer'>";
            }
            

            echo"<div class='info-trainer'>";
            
            if($treinador['genero'] == "masculino"){
                echo"<img class='pokemon-sex-symbol' src='images/symbol-male.png'>";
            }
            elseif($treinador['genero'] == "feminino"){
                echo"<img class='pokemon-sex-symbol' src='images/symbol-female.png'>";
            }
            else{
                echo"<img class='pokemon-sex-symbol' src='images/symbol-asex.png'>";
            }
                
            echo"<p>".$treinador['nome']."</p>
            <p> PokéDollar: $".$treinador['dinheiro']."</p>
            </div>";


            $username_id = $treinador['username'];
            $query_pokemons = "SELECT * FROM POKEMON WHERE username_id = '$username_id' ";
            $consulta_pokemons = mysqli_query($db, $query_pokemons);
            echo"</div>";
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
                    </tr>
                </thead>
                <tbody>";
            while($pokemon = mysqli_fetch_array($consulta_pokemons)){
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
                    </tr>";
            }
            echo"</tbody></table>
            <img src='images/separator.png' class='separator d-block mx-auto'>
            ";

            
            }
            else{
                echo"<p class='text-center'>Não Há Pokémon</p>";
            }
            

            
        }
    ?>

    </div>