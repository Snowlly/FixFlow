<?php

session_start();

$zone = $_SESSION['Zone'];

$queryAffihceDemande = "SELECT * FROM Demande WHERE Fait = 0 && FaitPar = 0 && Zone = $zone ORDER BY Date DESC ";
$afficheDemande = $bdd->prepare($queryAffihceDemande);
$afficheDemande->execute();

if(isset($_POST['supprimer'])){

    $idDemande = $_POST['idDemande'];

    $requeteSupprimeCR = "DELETE FROM Demande WHERE Id_demande = $idDemande";
    $supprimeCR = $bdd->prepare($requeteSupprimeCR);
    $supprimeCR->execute();

    header('Location: index.php?page=TableauGDemat');
}

//Attribution de la demande

$id = $_SESSION['Id_user'];

if (isset($_POST['attribuer'])) {
    $idDemande  = $_POST['idDemande'];
    $queryAttribution = "UPDATE Demande SET FaitPar = $id, Status = 1 WHERE Id_demande = $idDemande";
    $afficheAttribution = $bdd->prepare($queryAttribution);
    $afficheAttribution->execute();

    header('Location: index.php?page=TableauGDemat');
}

?>