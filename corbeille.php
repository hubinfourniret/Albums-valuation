<?php
    session_start();
    include('fonctions.php');
    $cnx=mysqli_connect("localhost","root","","albums");
    if (mysqli_connect_error()) {
        echo "Erreur de connexion � la base de donn�es : ".mysqli_connect_error();
        exit();
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>
    <body>
        <header>
            <h1>Corbeille</h1>
            <a href='index.php'><img class='icnImg1' src='images/retour.png'/></a>
        </header>
        <main class='main-index'>
        <?php
            $res = select(['photos'], ['visible'=>0]);
            while ($ligne = mysqli_fetch_array($res)) {
                echo '<div>';
                echo '<img src="photos/'.$ligne["nomPh"].'"class="main-img" alt="Image" onclick="ouvrirImage(\'' . $ligne["nomPh"] . '\')"/>';
                echo "<a href='restaurerPhoto.php?id=".$ligne['idPh']."'><img class='icnImg2' src='images/edit.png'/></a>";
                echo "<a href='supprimerPhoto.php?id=".$ligne['idPh']."'><img class='icnImg1' src='images/corbeille.png'/></a>";
                echo '</div>';
            }
            mysqli_free_result ($res);
            mysqli_close($cnx);
            /*$sql=SELECT * FROM albums, useralbums WHERE albums.idAlb=useralbums.idAlb AND idUser=1;    pour récuperer tout les albums de l'utilisateur 1         pour le menu nav
            $res = mysqli_query($cnx, $sql);*/
            ?>
        </main>
    </body>
</html>