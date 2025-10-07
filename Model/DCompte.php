<?php

session_start();

// Afficher les comptes temporaire

$reqCompteTemporaire = "SELECT * FROM user WHERE Type = 'Temporaire'";
$CompteTemporaire = $bdd->prepare($reqCompteTemporaire);
$CompteTemporaire->execute();

// Accepter la demande d'autorisation

if(isset($_POST['accept'])){

    $idUser = $_POST['id'];

    $reqAcceptUser= "UPDATE user Set Type = 'GestionnaireCompte' WHERE Id_user = $idUser";
    $AcceptUser = $bdd->prepare($reqAcceptUser);
    $AcceptUser->execute();

    header('Location: index.php?page=CompteGDemat');
}



// Refuser la demande d'autorisation

if(isset($_POST['refuse'])){

    $iduser = $_POST['id'];

    $reqRefuseUser = "DELETE FROM user WHERE Id_user = $iduser";
    $RefuseUser = $bdd->prepare($reqRefuseUser);
    $RefuseUser->execute();

    header('Location: index.php?page=CompteGDemat');
}



?>
