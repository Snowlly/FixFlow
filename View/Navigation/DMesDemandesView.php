<html lang="fr">

<div class="containerDHistorique">

    <h1 class="TitleUser">Mes demandes en cours..</h1>

    <table class="tabDHistorique">
        <thead>
        <tr>
            <th scope="col">Type</th>
            <th scope="col">Niveau</th>
            <th scope="col">N°Agence</th>
            <th scope="col">Nom du Client</th>
            <th scope="col">N°Déclic</th>
            <th scope="col">Commentaire</th>
            <th scope="col">GC</th>
            <th scope="col">Date</th>
            <th scope="col">CommentaireGD</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <?php

        while ($row = $afficheDemande->fetch()) {

            echo "
        <tr>
            <th scope='row'>{$row['Type']}</th>
            <td><h4 class='pastilleNiveau'>{$row['Niveau']}</h4></td>
            <td>{$row['NumAgence']}</td>
            <td><b>{$row['Client']}</b></td>
            <td>{$row['NumClient']}</td>
            <td>{$row['Commentaire']}</td>
            <td>{$row['DeQui']}</td>
            <td>{$row['Date']}</td>
            <form method='post'>
                <input type='hidden' name='id' value='{$row['Id_demande']}'>
                <td><textarea name='commentaireGD' required></textarea></td>
                <td><button class='BtnValider' name='valider'><img src='./View/assets/img/check.png'></button></td>
            </form>
                
        </tr>
        ";
        }

        ?>
        <tbody>

        </tbody>

    </table>

</div>

</html>

