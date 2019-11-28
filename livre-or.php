<?php   session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Livre-Or</title>
    <link rel="stylesheet" href="livre-or.css">
</head>
<body class="bodylivre">
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

        <h1 class="titrelivreor">Livre Or</h1>


</body>
</html>

<?php
  

    $connexion = mysqli_connect("localhost", "root", "", "livreor");
    $log = "SELECT id,login FROM utilisateurs";
    $com = "SELECT * FROM commentaires";
    $query = mysqli_query($connexion, $com);
    $resultat = mysqli_fetch_all($query);
    $query2 = mysqli_query($connexion, $log);
    $resultat2 = mysqli_fetch_all($query2);    

    $i = 0; 
    while($i < count($resultat))
    {
        $i2 = 0;
        while($i2 < count($resultat2))
        {
            if($resultat[$i][2] == $resultat2[$i2][0])
            {
                $date = $resultat[$i][3];
                $date2 = date("d-m-Y à H:i:s",strtotime($date));


                echo "<section class='post'>";
                echo '<div id="post2">'."Posté par ".$resultat2[$i2][1]." le ".$date2.'<br/>'.'</div>';
                echo '<div id="post2">'.$resultat[$i][1].'<br/><br/>'.'</div>';
                echo "<br><br>";
                echo "</section>";

            }
            $i2++;
        }
        $i++;
    }
?>
