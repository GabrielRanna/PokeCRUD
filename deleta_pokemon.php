<?php

include 'includes/db.php';

$id_pokemon = $_GET['id'];

$query = "DELETE FROM POKEMON WHERE ID = $id_pokemon";

mysqli_query($db, $query);

header('location: index.php?pagina=gerenciar');
