<?php

session_start();


if (isset($_GET['Id_demande'])) {
    $id_Demande = $_GET['Id_demande'];

    $queryDemande = "SELECT * FROM Demande WHERE Id_demande = :id";
    $Demande = $bdd->prepare($queryDemande);
    $Demande->bindParam(':id', $id_Demande);
    $Demande->execute();

}


if (isset($_POST['button_Demande'])) {
    // Validation et récupération des données POST
    $n_type = htmlspecialchars($_POST['type']);
    $n_niveau = htmlspecialchars($_POST['niveau']);
    $n_numAgence = htmlspecialchars($_POST['agence']);
    $n_nomclient = htmlspecialchars($_POST['nomclient']);
    $n_client = htmlspecialchars($_POST['client']);
    $n_commentaire = htmlspecialchars($_POST['commentaire']);

    if ($n_type && $n_niveau && $n_numAgence && $n_nomclient && $n_client && $n_commentaire) {
        // Requête pour mettre à jour les info du CR
        $queryUpdateDemande = "UPDATE Demande SET Type = ?, Niveau = ?, NumAgence = ?, Client = ?, NumClient = ?, Commentaire = ? WHERE Id_demande = ?";
        $UpdateCR = $bdd->prepare($queryUpdateDemande);
        $UpdateCR->execute(array($n_type, $n_niveau, $n_numAgence, $n_nomclient, $n_client, $n_commentaire, $id_Demande));

        header('Location: index.php?page=HistoriqueGCompte');
        exit();
    }
}
?>