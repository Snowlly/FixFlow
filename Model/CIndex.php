<?php

session_start();

try {
    if (isset($_POST['BtnEnvoyerDemande'])) {

        $type = htmlspecialchars($_POST['type']);
        $niveau = htmlspecialchars($_POST['niveau']);
        $numAgence = htmlspecialchars($_POST['agence']);
        $nomclient = htmlspecialchars($_POST['nomclient']);
        $client = htmlspecialchars($_POST['client']);
        $commentaire = htmlspecialchars($_POST['commentaire']);
        $deQui = $_SESSION['Nom'] . " " . $_SESSION['Prenom'];
        $date = date('Y-m-d H:i:s');
        $zone = htmlspecialchars($_SESSION['Zone']);
        $commentaireGD = "";
        $status = 0;

        $reqNewDemande = "INSERT INTO Demande (Type, Niveau, NumAgence, Client, NumClient, Commentaire, DeQui, Date, Fait, FaitPar, Zone, CommentaireGD, Status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 0, 0, ?, ?, ?)";
        $prepareNewDemande = $bdd->prepare($reqNewDemande);
        $prepareNewDemande->execute([$type, $niveau, $numAgence, $nomclient, $client, $commentaire, $deQui, $date, $zone, $commentaireGD, $status]);

        echo "<script> alert('Demande envoyé !') </script>";

        header("location:index.php?page=IndexGCompte");

    }
} catch (PDOException $e) {
    die($e->getMessage());
}


?>
