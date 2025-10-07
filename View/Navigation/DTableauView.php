<html lang="fr">

    <div class="containerDTableau">

        <h1 class="TitleUser">Demande(s) en cours...</h1>

        <table class="tabDTableau">
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
            <td class='actionTD'>
                <form method='post'>
                    <button class='BtnAttribuer' name='attribuer'><img src='./View/assets/img/grab.png'></button>
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


    </div>

</html>
