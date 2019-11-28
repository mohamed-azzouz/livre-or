<?php 	session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" href="livre-or.css">
	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
</head>
<body class="bodyindex">
	<header>
            
            <nav id="menuheader1">
                <div id="menuheader2">
                    <?php
                        if (isset($_SESSION['login'])) 
                        {
                            echo "  <span class='headerspace'><a href='index.php'>Index</a></span> 
                                    <span class='headerspace'><a href='livre-or.php'>Livre d'Or</a></span>
                                    <span class='headerspace'><a href='commentaire.php'>Commentaire</a></span>
                                    <span class='headerspace'><a href='profil.php'>Profil</a></span>
                                    <span class='headerspace'><form action ='index.php' method='post'><input type='submit' value='Deconnexion' name='deconnexion'></form></span>";
                   
                            if(isset($_POST["deconnexion"]))
                            {
                                session_unset();
                                session_destroy();
                                header('location:index.php');
                            }
                        }
                        else 
                        {
                            echo "  <span class='headerspace'><a href='index.php'>Index</a></span>
                                    <span class='headerspace'><a href='connexion.php'>Connexion</a></span>
                                    <span class='headerspace'><a href='inscription.php'>Inscription</a></span>
                                    <span class='headerspace'><a href='livre-or.php'>Livre d'Or</a></span>
                                    <span class='headerspace'><a href='commentaire.php'>Commentaire</a></span>";
                        } 

                     ?>

                    
                   
                    
                </div>
            </nav>
        </header>

       <div id=container>
         Bienvenue
            <div id=flip>
            <div><div><?php if(isset($_SESSION['login'])){echo $_SESSION['login'];}  ?></div></div>
        Sur le Livre d'Or   
        </div>
        
        </div>

</div>


</body>
</html>