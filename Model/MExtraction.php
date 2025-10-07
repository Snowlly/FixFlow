<?php

session_start();


// Requête : regrouper par gestionnaire + type
$stmt = $bdd->query("
    SELECT u.Id_user, u.Nom, u.Prenom, d.Type, COUNT(*) AS total
    FROM Demande d
    JOIN User u ON d.FaitPar = u.Id_user
    WHERE d.Fait = 1 AND u.Type = 'GestionnaireDemat'
    GROUP BY d.FaitPar, d.Type
");

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ➕ Obtenir tous les types possibles (colonnes dynamiques)
$types = [];
foreach ($data as $row) {
    if (!in_array($row['Type'], $types)) {
        $types[] = $row['Type'];
    }
}

// 🧩 Réorganiser les données en tableau : [Nom => [Type => total]]
$tableau = [];
foreach ($data as $row) {
    $cle = $row['Nom'] . ' ' . $row['Prenom'];
    if (!isset($tableau[$cle])) {
        $tableau[$cle] = array_fill_keys($types, 0);
    }
    $tableau[$cle][$row['Type']] = (int)$row['total'];
}

// 👉 En-têtes Excel

if (isset($_POST['btnExcel'])) {
    // Forcer le téléchargement en Excel
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=recap_demande.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

// Imprimer l'en-tête du tableau
    echo "Gestionnaire\t" . implode("\t", $types) . "\n";

// Imprimer chaque ligne
    foreach ($tableau as $gestionnaire => $colonnes) {
        echo $gestionnaire;
        foreach ($types as $type) {
            echo "\t" . ($colonnes[$type] ?? 0);
        }
        echo "\n";
    }
    exit;
}



?>