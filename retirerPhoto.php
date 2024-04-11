<?php
    include("fonctions.php");
    $id=$_GET['id'];
    $idAlb=$_GET['idAlb'];
    $cnx=mysqli_connect("localhost","root","","albums");
    
    if (mysqli_connect_error()) {
        echo "Erreur de connexion a la base de donnees : ".mysqli_connect_error();
        exit();
    }
    $sql="UPDATE photos SET visible = 0 WHERE idPh = $id";
    $res=mysqli_query($cnx, $sql);
    mysqli_close($cnx);
    header("Location: index.php?id=".$idAlb);
?>