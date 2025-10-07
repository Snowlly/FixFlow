<?php

    session_start();

    $id = $_SESSION['Nom'] . " " . $_SESSION['Prenom'];

    $queryAffihceDemande = "SELECT * FROM Demande WHERE Fait = 0 && DeQui = '$id'";
    $afficheDemande = $bdd->prepare($queryAffihceDemande);
    $afficheDemande->execute();

    $queryAffihceDemandeFini = "SELECT *, User.Nom as NomGD, User.Prenom as PrenomGD FROM Demande INNER JOIN User ON Demande.FaitPar = User.ID_user WHERE Fait = 1 && DeQui = '$id'";
    $afficheDemandeFini = $bdd->prepare($queryAffihceDemandeFini);
    $afficheDemandeFini->execute();

    if(isset($_POST['supprimer'])){

        $idDemande = $_POST['idDemande'];

        $requeteSupprimeCR = "DELETE FROM Demande WHERE Id_demande = $idDemande";
        $supprimeCR = $bdd->prepare($requeteSupprimeCR);
        $supprimeCR->execute();

        header('Location: index.php?page=HistoriqueGCompte');
    }

?>