<?php session_start(); ?>


<!DOCTYPE html>
    <html>
        <head>
            <title>Page de connexion</title>
            <link rel="stylesheet" href="livre-or.css">
            <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
        </head>
    <body class="bodyconnexion">
    	   <header>
            
             <nav id="menuheader1">
                <div id="menuheader2">
                    <?php
                        if (isset($_SESSION['login'])):?>  
                                    <span class='headerspace'><a href='index.php'>Index</a></span> 
                                    <span class='headerspace'><a href='livre-or.php'>Livre d'Or</a></span>
                                    <span class='headerspace'><a href='commentaire.php'>Commentaire</a></span>
                                    <span class='headerspace'><a href='profil.php'>Profil</a></span>
                                    <span class='headerspace'><form action ='index.php' method='post'><input type='submit' value='Deconnexion' name='deconnexion'></form></span>
                   
                            <?php if(isset($_POST["deconnexion"])):
                                session_unset();
                                session_destroy();
                                header('location:index.php');
                                endif; ?>
                        <?php else: ?>
                                    <span class='headerspace'><a href='index.php'>Index</a></span>
                                    <span class='headerspace'><a href='connexion.php'>Connexion</a></span>
                                    <span class='headerspace'><a href='inscription.php'>Inscription</a></span>
                                    <span class='headerspace'><a href='livre-or.php'>Livre d'Or</a></span>
                                    <span class='headerspace'><a href='commentaire.php'>Commentaire</a></span>
                        <?php endif; ?>
                     

                    
                   
                    
                </div>
            </nav>
        </header>

        <main>
        <?php

    
    
            $connexion = mysqli_connect("localhost", "root","", "livreor");

            $requete = "SELECT * FROM utilisateurs";

            $query = mysqli_query($connexion, $requete);

            $result = mysqli_fetch_all($query);

            $cmp= false ;

            if(isset($_POST['connexion']) == true)
            {
                foreach($result as $key => $value)
                {
                    if($result[$key][1] == $_POST['login'] && $result[$key][2] == $_POST['password'])
                    {
                        $cmp = true;
                        $_SESSION['id'] = $result[$key][0] ;
                    }
                    
                    
                    
                }
                if($cmp == true)
                {
                    
                    $_SESSION['login'] = $_POST['login'];
                    echo "<div id='divconnexion'>Bienvenue ".$_SESSION['login']. "</div>";
                }

                else
                {
                    echo "<div  id='divconnexion'>Login ou mot de passe incorrect</div>";
                }

            }

            if(!isset($_SESSION['login'])):?>
                <div class='formulaireconnexion'>

                    <h1 id='titreconnexion'>Connexion</h1>

                    <form method='POST' action='connexion.php'>
                        <div class='infoconnexion'>
                            <label for='login'>Login :<br> </label> 
                            <input type='text' name='login' required><br><br>
                            <label for='password'>Mot de passe :<br></label><input type='password' name='password' required><br><br>
                            <input type='submit' value='Connexion' name='connexion'>
                        </div>
                    </form>
                </div>
            
            <?php else: ?>
            
                <div  id='divconnexion'>Vous etes connecté</div>
           
            <?php endif ; ?>
            
            <?php mysqli_close($connexion); ?>


        </main>
    </body>
</html>