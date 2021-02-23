<div class="container">
    <?php
    if(!isset($_GET['editar'])){ ?>
        <h2>Cadastro</h2>
        <div class="d-flex justify-content-end">
        <a href="?pagina=gerenciar"><button class=" mb-3">Voltar</button></a>
        </div>
        
        <form method="post" action="?pagina=cadastro_pokemon">

        <div class="form-group">
            <label for="exampleFormControlInput1">Nome</label>
            <input type="text" class="form-control nome-input" id="exampleFormControlInput1" name="nome" value="" >
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Pokedex Id</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="id_pokedex"  >
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Link Foto</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="photo"  >
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Habilidade</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="habilidade"  >
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Nível</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="nivel"  >
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Sexo</label>
            <select class="form-control" id="exampleFormControlSelect1" name="sexo" >
                <option>Macho</option>
                <option>Femea</option>
                <option>Nulo</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlSelect1">Shiny</label>
            <select class="form-control shiny-pokemon" id="exampleFormControlSelect1" name="shiny" value="<?php echo $pokemon['shiny'];?>" >
                <option value="">Não</option>
                <option class="shiny">Sim</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo Primário</label>
            <select class="form-control tipo1" id="exampleFormControlSelect1" name="tipo1" >
                <option value="Bug" class='Bug'>Bug</option>
                <option value="Dark" class='Dark'>Dark</option>
                <option value="Dragon" class='Dragon'>Dragon</option>
                <option value="Electric" class='Electric'>Electric</option>
                <option value="Fairy" class='Fairy'>Fairy</option>
                <option value="Fighting" class='Fighting'>Fighting</option>
                <option value="Fire" class='Fire'>Fire</option>
                <option value="Flying" class='Flying'>Flying</option>
                <option value="Ghost" class='Ghost'>Ghost</option>
                <option value="Grass" class='Grass'>Grass</option>
                <option value="Ground" class='Ground'>Ground</option>
                <option value="Ice" class='Ice'>Ice</option>
                <option value="Normal" class='Normal'>Normal</option>
                <option value="Poison" class='Poison'>Poison</option>
                <option value="Psychic" class='Psychic'>Psychic</option>
                <option value="Rock" class='Rock'>Rock</option>
                <option value="Steel " class='Steel'>Steel</option>
                <option value="Water" class='Water'>Water</option>
            </select>
        </div>


        <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo Secundário</label>
            <select class="form-control tipo2" id="exampleFormControlSelect1" name="tipo2">
                <option></option>
                <option value="Bug" class='Bug'>Bug</option>
                <option value="Dark" class='Dark'>Dark</option>
                <option value="Dragon" class='Dragon'>Dragon</option>
                <option value="Electric" class='Electric'>Electric</option>
                <option value="Fairy" class='Fairy'>Fairy</option>
                <option value="Fighting" class='Fighting'>Fighting</option>
                <option value="Fire" class='Fire'>Fire</option>
                <option value="Flying" class='Flying'>Flying</option>
                <option value="Ghost" class='Ghost'>Ghost</option>
                <option value="Grass" class='Grass'>Grass</option>
                <option value="Ground" class='Ground'>Ground</option>
                <option value="Ice" class='Ice'>Ice</option>
                <option value="Normal" class='Normal'>Normal</option>
                <option value="Poison" class='Poison'>Poison</option>
                <option value="Psychic" class='Psychic'>Psychic</option>
                <option value="Rock" class='Rock'>Rock</option>
                <option value="Steel " class='Steel'>Steel</option>
                <option value="Water" class='Water'>Water</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descrição</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao"></textarea>
        </div>
        <div class="form-group d-flex justify-content-center">
        <button type="submit" class="" name="reg_pokemon">Registrar</button>
        </div>

        <?php  if (count($errors) > 0) : ?>
        <div class="error">
            <?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
            <?php endforeach ?>
        </div>
        <?php  endif ?>
         
        </form>
        <?php } else{ ?>
            <?php 
                $id_pokemon = $_GET['editar'];
                $query = "SELECT * FROM POKEMON WHERE id = $id_pokemon";
                $consulta_pokemon = mysqli_query($db, $query);
                while($pokemon = mysqli_fetch_array($consulta_pokemon)){
                    ?>
                
            <h2>Editar Pokemon</h2>
            <form method="post" action="?pagina=cadastro_pokemon">

            <input type="hidden" name="id_pokemon" value="<?php echo $_GET['editar'];?>">

            <div class="form-group">
                <label for="exampleFormControlInput1">Nome</label>
                <input type="text" class="form-control nome-input" id="exampleFormControlInput1" name="nome" value="<?php echo $pokemon['nome'];?>" >
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Pokedex Id</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="id_pokedex" value="<?php echo $pokemon['pokedex_id'];?>">
            </div>

            

            <div class="form-group">
                <label for="exampleFormControlInput1">Link Foto</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="photo" value="<?php echo $pokemon['foto'];?>" >
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Habilidade</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="habilidade" value="<?php echo $pokemon['habilidade'];?>"  >
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Nível</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" name="nivel" value="<?php echo $pokemon['nivel'];?>" >
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Sexo</label>
                <select class="form-control sexo-pokemon" id="exampleFormControlSelect1" name="sexo" value="<?php echo $pokemon['sexo'];?>" >
                    <option value="Macho">Macho</option>
                    <option value="Femea">Femea</option>
                    <option value="Nulo">Nulo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Shiny</label>
                <select class="form-control shiny-pokemon" id="exampleFormControlSelect1" name="shiny" value="<?php echo $pokemon['shiny'];?>" >
                    <option class="not-shiny" value="">Não</option>
                    <option class="shiny">Sim</option>
                </select>
            </div>
            

            <div class="form-group">
                <label for="exampleFormControlSelect1">Tipo Primário</label>
                <select id="exampleFormControlSelect1" name="tipo1" <?php echo "class='form-control tipo1 ".$pokemon['tipo1']."' "; ?> value="<?php echo $pokemon['tipo1'];?>" >
                    <option value="Bug" class='Bug'>Bug</option>
                    <option value="Dark" class='Dark'>Dark</option>
                    <option value="Dragon" class='Dragon'>Dragon</option>
                    <option value="Electric" class='Electric'>Electric</option>
                    <option value="Fairy" class='Fairy'>Fairy</option>
                    <option value="Fighting" class='Fighting'>Fighting</option>
                    <option value="Fire" class='Fire'>Fire</option>
                    <option value="Flying" class='Flying'>Flying</option>
                    <option value="Ghost" class='Ghost'>Ghost</option>
                    <option value="Grass" class='Grass'>Grass</option>
                    <option value="Ground" class='Ground'>Ground</option>
                    <option value="Ice" class='Ice'>Ice</option>
                    <option value="Normal" class='Normal'>Normal</option>
                    <option value="Poison" class='Poison'>Poison</option>
                    <option value="Psychic" class='Psychic'>Psychic</option>
                    <option value="Rock" class='Rock'>Rock</option>
                    <option value="Steel " class='Steel'>Steel</option>
                    <option value="Water" class='Water'>Water</option>
                </select>
            </div>


            <div class="form-group">
                <label for="exampleFormControlSelect1">Tipo Secundário</label>
                <select id="exampleFormControlSelect1" name="tipo2" <?php echo "class='form-control tipo2 ".$pokemon['tipo2']."' "; ?> value="<?php echo $pokemon['tipo2'];?>">
                    <option value=""></option>
                    <option value="Bug" class='Bug'>Bug</option>
                    <option value="Dark" class='Dark'>Dark</option>
                    <option value="Dragon" class='Dragon'>Dragon</option>
                    <option value="Electric" class='Electric'>Electric</option>
                    <option value="Fairy" class='Fairy'>Fairy</option>
                    <option value="Fighting" class='Fighting'>Fighting</option>
                    <option value="Fire" class='Fire'>Fire</option>
                    <option value="Flying" class='Flying'>Flying</option>
                    <option value="Ghost" class='Ghost'>Ghost</option>
                    <option value="Grass" class='Grass'>Grass</option>
                    <option value="Ground" class='Ground'>Ground</option>
                    <option value="Ice" class='Ice'>Ice</option>
                    <option value="Normal" class='Normal'>Normal</option>
                    <option value="Poison" class='Poison'>Poison</option>
                    <option value="Psychic" class='Psychic'>Psychic</option>
                    <option value="Rock" class='Rock'>Rock</option>
                    <option value="Steel " class='Steel'>Steel</option>
                    <option value="Water" class='Water'>Water</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao" ><?php echo $pokemon['descricao'];?></textarea>
            </div>
            <div class="form-group d-flex justify-content-center">
            <button type="submit" class="" name="editar_pokemon">Editar</button>
            </div>

            <?php  if (count($errors) > 0) : ?>
            <div class="error">
                <?php foreach ($errors as $error) : ?>
                <p><?php echo $error ?></p>
                <?php endforeach ?>
            </div>
            <?php  endif ?>
            
            </form>


        <?php }
            } ?>


</div>
