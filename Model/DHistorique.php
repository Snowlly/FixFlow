<?php

session_start();

$zone = $_SESSION['Zone'];

$queryAffihceDemande = "SELECT *, User.Nom as NomGD, User.Prenom as PrenomGD, User.Zone as ZoneUser FROM Demande INNER JOIN User ON Demande.FaitPar = User.ID_user WHERE Fait = 1 && Demande.Zone = $zone && Status = 2 ORDER BY Date DESC";
$afficheDemande = $bdd->prepare($queryAffihceDemande);
$afficheDemande->execute();

?>