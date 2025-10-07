<html lang="fr">

    <div class="containerDHistorique">
        <div class="Tri">
            <div class="premierTri">
                <a></a>
                <a></a>
                <a></a>
            </div>
            <div class="deuxiemeTri">
                <a></a>
                <a></a>
                <a></a>
            </div>
            <div class="troisiemeTri">
                <a></a>
                <a></a>
                <a></a>
            </div>
            <input type="text" id="rechercheTable" placeholder="Rechercher dans le tableau..." onkeyup="filtrerTableau()">

        </div>

        <h1 class="TitleUser">Demande(s) cloturées</h1>

        <table class="tabDHistorique">
            <thead>
            <tr>
                <th scope="col">Type</th>
                <th scope="col">Niveau</th>
                <th scope="col">N°Agence</th>
                <th scope="col">Nom du Client</th>
                <th scope="col">N°Déclic</th>
                <th class="comSize" scope="col">Commentaire</th>
                <th scope="col">GC</th>
                <th scope="col">Date</th>
                <th scope="col">Fait Par</th>
                <th scope="col">Commentaire GD</th>
            </tr>
            </thead>

            <?php

            while ($row = $afficheDemande->fetch()) {

                $nom = $row['NomGD'] . " " . $row['PrenomGD'];

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
            <td>$nom</td>
            <td>{$row['CommentaireGD']}</td>
        </tr>
        ";
            }

            ?>
            <tbody>

            </tbody>

        </table>

    </div>

</html>
