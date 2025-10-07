<html lang="fr">

<h1 class="TitleUser">Historique de mes demandes en cours...</h1>

<table>
    <thead>
    <tr>
        <th scope="col">Type</th>
        <th scope="col">Niveau</th>
        <th scope="col">N°Agence</th>
        <th scope="col">Nom du Client</th>
        <th scope="col">N°Déclic</th>
        <th scope="col">Commentaire</th>
        <th scope="col">Date</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
    </tr>
    </thead>

    <?php

    while ($row = $afficheDemande->fetch()) {

        if ($row['Status'] == 0) {
            $status = "Pas attribuée";
        } else if ($row['Status'] == 1) {
            $status = "en cours";
        }

        echo "
        <tr>
            <th scope='row'>{$row['Type']}</th>
            <td><h4 class='pastilleNiveau'>{$row['Niveau']}</h4></td>
            <td>{$row['NumAgence']}</td>
            <td>{$row['Client']}</td>
            <td>{$row['NumClient']}</td>
            <td>{$row['Commentaire']}</td>
            <td>{$row['Date']}</td>
            <td>$status</td>
            <td>
                <form method='post'>
                    <a class='BtnModifier' href='index.php?page=ModifDemandeGCompte&Id_demande={$row['Id_demande']}'><img src='./View/assets/img/pen.png'></a>
                    <input type='hidden' name='idDemande' value='{$row['Id_demande']}'>
                    <button class='BtnSupprimer' name='supprimer'><img src='./View/assets/img/bin.png'></button>
                </form>
            </td>
            
            
        </tr>
        
    ";
}
    ?>
    <tbody>

    </tbody>

</table>

<h2 class="TitleUser">Historique de mes demandes cloturées</h2>

<table>
    <thead>
    <tr>
        <th scope="col">Type</th>
        <th scope="col">N°Agence</th>
        <th scope="col">Nom du Client</th>
        <th scope="col">N°Déclic</th>
        <th scope="col">Commentaire</th>
        <th scope="col">Date</th>
        <th scope="col">Fait Par</th>
        <th scope="col">Commentaire GD</th>
    </tr>
    </thead>

    <?php

    while ($row = $afficheDemandeFini->fetch()) {

        $FaitPar = $row['NomGD'] . " " . $row['PrenomGD'];

        echo "
        <tr>
            <th scope='row'>{$row['Type']}</th>
            <td>{$row['NumAgence']}</td>
            <td>{$row['Client']}</td>
            <td>{$row['NumClient']}</td>
            <td>{$row['Commentaire']}</td>
            <td>{$row['Date']}</td>
            <td>{$FaitPar}</td>
            <td>{$row['CommentaireGD']}</td>;
            
            
        </tr>
        ";
    }

    ?>
    <tbody>

    </tbody>

</table>

</html>
