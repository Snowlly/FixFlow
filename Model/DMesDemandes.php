<?php

session_start();

$zone = $_SESSION['Zone'];
$id = $_SESSION['Id_user'];

$queryAffihceDemande = "SELECT * FROM Demande WHERE Zone = $zone && FaitPar = $id && Status = 1";
$afficheDemande = $bdd->prepare($queryAffihceDemande);
$afficheDemande->execute();

if (isset($_POST['valider'])) {
    $commentaireGD = $_POST['commentaireGD'];
    $id = $_POST['id'];

    $reqValider = "UPDATE Demande SET commentaireGD = '$commentaireGD', Status = 2, Fait = 1 WHERE Id_demande = '$id'";
    $validerDemande = $bdd->prepare($reqValider);
    $validerDemande->execute();

    header('Location: index.php?page=MesDemandesGDemat');
}

?>