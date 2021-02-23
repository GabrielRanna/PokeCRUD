<!doctype html>
<html>
    <head>
        <link rel="pokeball" href="images/pokeball.png" type="image/png"> 
        <meta charset="utf-8">
        <title>Pokécrud</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/all.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>

    <body>
        <div class='wrapper'>
            <nav class='navbar'>
                <a href="?pagina=home">
                <div class="navbar-logo">
                    <img src="images/pokeball.png" title="Logo"  alt="Logo">
                    <p>Pokécrud</p>
                </div>
                </a>
                
                <div>
                    <ul class="links-navbar"> 
                        <?php
                            if (isset($_SESSION['username'])){
                                echo"<li class='nav-item'><a class='nav-link' href='?logout='1''> Logout </a></li>
                                    <li class='nav-item'><a class='nav-link' href='?pagina=gerenciar'> Gerenciar Pokédex </a></li>";
                            }
                            else{
                                echo"<li class='nav-item'><a class='nav-link' href='?pagina=login'> Login </a></li>";
                            }
                        ?>
                        <li class="nav-item"><a class="nav-link" href="?pagina=treinadores"> Ver Treinadores </a></li>
                    </ul>
                </div>
                    
            </nav>
    

