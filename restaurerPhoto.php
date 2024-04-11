<?php
    session_start();
    include('fonctions.php');
    $cnx=mysqli_connect("localhost","root","","albums");
    if (mysqli_connect_error()) {
        echo "Erreur de connexion � la base de donn�es : ".mysqli_connect_error();
        exit();
    }
    $sql="UPDATE photos SET visible = 1 WHERE idPh = ".$_GET['id'];
    $res=mysqli_query($cnx, $sql);
    mysqli_close($cnx);
    echo $sql;
    header("Location: index.php");
?>