<?php

session_start();

setlocale(LC_TIME, 'fr_FR.UTF-8');


$zone = $_SESSION['Zone'] ?? null;
$id = $_SESSION['Id_user'] ?? null;

// Si c'est une requête AJAX, on ne renvoie que les données des graphiques
if (isset($_GET['ajax']) && $_GET['ajax'] === '1') {
    header('Content-Type: application/json');

    if (!$zone || !$id) {
        echo json_encode(['error' => 'Session invalide']);
        exit;
    }

    $mois = isset($_GET['mois']) ? (int) $_GET['mois'] : date('n');
    $annee = isset($_GET['annee']) ? (int) $_GET['annee'] : date('Y');

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=fixflow;charset=utf8', 'root', '');

        // Données par type et zone
        $reqParType = $bdd->prepare("
            SELECT Type, COUNT(*) as total
            FROM Demande
            WHERE Zone = :zone AND MONTH(Date) = :mois AND YEAR(Date) = :annee
            GROUP BY Type
        ");
        $reqParType->execute(['zone' => $zone, 'mois' => $mois, 'annee' => $annee]);
        $data1 = $reqParType->fetchAll(PDO::FETCH_ASSOC);

        // Données par utilisateur
        $reqParUtilisateur = $bdd->prepare("
            SELECT Type, COUNT(*) as total
            FROM Demande
            WHERE FaitPar = :id AND Fait = 1 AND MONTH(Date) = :mois AND YEAR(Date) = :annee
            GROUP BY Type
        ");
        $reqParUtilisateur->execute(['id' => $id, 'mois' => $mois, 'annee' => $annee]);
        $data2 = $reqParUtilisateur->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode([
            'parType' => $data1,
            'parUtilisateur' => $data2
        ]);
        exit;
    } catch (Exception $e) {
        echo json_encode(['error' => 'Erreur serveur']);
        exit;
    }
}

// ---------- Page normale (HTML + chargement de base) ----------

// AFFICHE LE TOTAL DES DEMANDES PAS ATTRIBUÉES
$reqCountDemande = $bdd->prepare("
    SELECT COUNT(*) AS total 
    FROM Demande 
    WHERE FaitPar = 0 AND Zone = :zone AND Fait = 0
");
$reqCountDemande->execute(['zone' => $zone]);
$resultCountDemande = $reqCountDemande->fetch();

// AFFICHE LE TABLEAU DES DEMANDES PAS ATTRIBUÉES
$queryAfficheDemande = $bdd->prepare("
    SELECT * 
    FROM Demande 
    WHERE Fait = 0 AND Zone = :zone AND FaitPar = 0 
    ORDER BY Id_demande DESC 
    LIMIT 3
");
$queryAfficheDemande->execute(['zone' => $zone]);
$afficheDemande = $queryAfficheDemande;

// ATTRIBUTION
if (isset($_POST['attribuer'])) {
    $idDemande = $_POST['id'];
    $queryAttribution = $bdd->prepare("
        UPDATE Demande 
        SET FaitPar = :id, Status = 1 
        WHERE Id_demande = :idDemande
    ");
    $queryAttribution->execute([
        'id' => $id,
        'idDemande' => $idDemande
    ]);
    header('Location: index.php?page=IndexGDemat');
    exit;
}

// FILTRES STATISTIQUES par défaut (mois en cours)
$mois = isset($_GET['mois']) ? (int) $_GET['mois'] : date('n');
$annee = isset($_GET['annee']) ? (int) $_GET['annee'] : date('Y');

// 1. Total des demandes sur le mois
$reqTotal = $bdd->prepare("
    SELECT COUNT(*) as total
    FROM Demande
    WHERE MONTH(Date) = :mois AND YEAR(Date) = :annee
");
$reqTotal->execute([
    'mois' => $mois,
    'annee' => $annee
]);
$totalDemandesMois = $reqTotal->fetchColumn();

// 2. Répartition par type dans la zone
$reqParType = $bdd->prepare("
    SELECT Type, COUNT(*) as total
    FROM Demande
    WHERE Zone = :zone AND MONTH(Date) = :mois AND YEAR(Date) = :annee
    GROUP BY Type
");
$reqParType->execute([
    'zone' => $zone,
    'mois' => $mois,
    'annee' => $annee
]);
$typeData = $reqParType->fetchAll(PDO::FETCH_ASSOC);

$labels = [];
$values = [];

foreach ($typeData as $row) {
    $labels[] = $row['Type'];
    $values[] = $row['total'];
}

// 3. Répartition des demandes clôturées par l’utilisateur connecté
$reqParUtilisateur = $bdd->prepare("
    SELECT Type, COUNT(*) as total
    FROM Demande
    WHERE FaitPar = :id AND Fait = 1 AND MONTH(Date) = :mois AND YEAR(Date) = :annee
    GROUP BY Type
");
$reqParUtilisateur->execute([
    'id' => $id,
    'mois' => $mois,
    'annee' => $annee
]);
$typeParUtilisateur = $reqParUtilisateur->fetchAll(PDO::FETCH_ASSOC);

$labelsUser = [];
$valuesUser = [];

foreach ($typeParUtilisateur as $row) {
    $labelsUser[] = $row['Type'];
    $valuesUser[] = $row['total'];
}



$queryAffihceDemandeFini = "SELECT * FROM Demande WHERE Zone = $zone && FaitPar = $id && Status = 1";
$afficheDemandeFini = $bdd->prepare($queryAffihceDemandeFini);
$afficheDemandeFini->execute();

if (isset($_POST['valider'])) {
    $commentaireGD = $_POST['commentaireGD'];
    $id = $_POST['id'];

    $reqValider = "UPDATE Demande SET commentaireGD = '$commentaireGD', Status = 2, Fait = 1 WHERE Id_demande = '$id'";
    $validerDemande = $bdd->prepare($reqValider);
    $validerDemande->execute();

    header('Location: index.php?page=MesDemandesGDemat');
}
?>
