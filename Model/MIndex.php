<?php
session_start();

$annee = isset($_GET['annee']) ? (int) $_GET['annee'] : date('Y');

// Connexion BDD
$bdd = new PDO('mysql:host=localhost;dbname=fixflow;charset=utf8', 'root', '');

// Récupération des données : total par mois et par type
$stmt = $bdd->prepare("
    SELECT MONTH(Date) as mois, Type, COUNT(*) as total
    FROM Demande
    WHERE YEAR(Date) = :annee
    GROUP BY mois, Type
");
$stmt->execute(['annee' => $annee]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Préparation des données
$types = [];
foreach ($data as $row) {
    $type = $row['Type'];
    $mois = (int)$row['mois'];

    if (!isset($types[$type])) {
        $types[$type] = array_fill(0, 12, 0);
    }

    $types[$type][$mois - 1] = (int)$row['total'];
}

// Construction des datasets au format Chart.js en PHP
$datasetsPHP = [];
$colors = ['#f94144', '#277da1', '#f9c74f', '#43aa8b', '#9b5de5'];
$i = 0;

foreach ($types as $type => $moisData) {
    $color = $colors[$i % count($colors)];
    $datasetsPHP[] = [
        'label' => $type,
        'data' => $moisData,
        'backgroundColor' => $color,
        'borderWidth' => 1
    ];
    $i++;
}
