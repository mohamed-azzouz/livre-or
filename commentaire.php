<?php session_start(); ?>
<!DOCTYPE html>
 <html>
 <head>
 	<title>Commentaire</title>
 	<link rel="stylesheet" href="livre-or.css">
 	<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
 </head>
 <body class="bodycommentaire">
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
                            
            if(isset($_POST["comment"]))
            {
                $comment=$_POST["comment"];
            }      
            else 
            {
                $comment="";
            }   
    
           
            if (!empty($_SESSION['login'])): ?> 
            
                <div class='commentaire'>
                    <form  class='formco' action='commentaire.php' method='post'>

                            <textarea type='text'  placeholder='Votre commentaire' rows='31' cols='74' name='comment' id='comment' resize:none required></textarea><br>

                            <input type='submit' value='Envoyer' name='confirm' />
                    </form>
                </div>
            

            <?php else: ?>
            
                <div id='com'>Vous n'etes pas connecter<br>Vous devez être connecté pour pouvoir commenter</div>

            <?php endif; ?>


            
            <?php if (isset($_POST['confirm']))
                {
                    
                    if (!empty($_POST['comment'])) 
                    {     
                        
                        date_default_timezone_set("Europe/Paris");
                         // Créé la requête
                        $requete = "INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES ('$comment','".$_SESSION['id']."','".date("Y-m-d H:i:s")."')";
                                        
                     
                         // Exécute la requête d'insertion du message
                       $query = mysqli_query($connexion, $requete);
                       
                    }
                }
            ?>  

        </main>

 
 </body>
 </html>

 