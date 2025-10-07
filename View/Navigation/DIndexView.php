<html lang="fr">

<div class="container-dashboard">
    <div class="container-module">
        <!-- MODULE 1 :  -->
        <div class="module module1">
            <h3>Nombre <br> de <br> demandes</h3>
            <div class="trait"></div>
            <?php

            echo "<p>{$resultCountDemande['total']}</p>";

            ?>
        </div>
        <!-- MODULE 2 :  -->
        <div class="module module2">
            <h3>À valider</h3>
            <img src="./View/assets/img/stamp.png">
        </div>
        <!-- MODULE 3 :  -->
        <div class="module module3">
            <h3>Statistiques</h3>
            <img src="./View/assets/img/analytics.png">
        </div>
    </div>


    <div class="container-view-module1">
        <table class="center">
            <thead>
            <tr>
                <th scope="col">Type</th>
                <th scope="col">Niveau</th>
                <th scope="col">N°Agence</th>
                <th scope="col">Nom du Client</th>
                <th scope="col">N°Déclic</th>
                <th scope="col">Commentaire</th>
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
            <td>{$row['Client']}</td>
            <td>{$row['NumClient']}</td>
            <td class='commentaire'>{$row['Commentaire']}</td>
            <td>{$row['Date']}</td>
            <td>
                <form method='post'>
                    <input type='hidden' name='id' value='{$row['Id_demande']}'>
                    <button class='BtnAttribuer2' name='attribuer'><img src='./View/assets/img/grab.png'></button>
                </form>
            </td>
            
        </tr>
        ";
            }

            ?>
            <tbody>
                <tr id="noResult2" style="display: none; text-align: center;">
                    <td colspan="8">Aucun résultat trouvé.</td>
                </tr>
            </tbody>

        </table>

        <a class="BtnDemande" href="index.php?page=TableauGDemat">Aller sur le tableau des demandes</a>

    </div>

    <div class="container-view-module2">
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

            while ($row = $afficheDemandeFini->fetch()) {

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
                <td><button class='BtnValider btnFini' name='valider'><img class='imgFini' src='./View/assets/img/check.png'></button></td>
            </form>
                
        </tr>
        ";
            }

            ?>
            <tbody>

            </tbody>

        </table>
    </div>

    <div class="container-view-module3">
        <div class="content-graphique">
            <div class="graph-controls" style="margin-bottom: 20px;">
                <label for="mois">Mois :</label><br>
                <select id="mois">
                    <?php
                    $moisActuel = date('n'); // Mois actuel (1-12)
                    for ($m = 1; $m <= 12; $m++) {
                        $selected = ($m == $moisActuel) ? 'selected' : '';
                        $nomMois = strftime('%B', mktime(0, 0, 0, $m, 1)); // nom en français si locale ok
                        echo "<option value=\"$m\" $selected>$nomMois</option>";
                    }
                    ?>
                </select><br><br><br><br>

                <label for="annee">Année :</label><br>
                <select id="annee">
                    <?php
                    $anneeActuelle = date('Y');
                    for ($y = $anneeActuelle; $y >= $anneeActuelle - 5; $y--) {
                        $selected = ($y == $anneeActuelle) ? 'selected' : '';
                        echo "<option value=\"$y\" $selected>$y</option>";
                    }
                    ?>
                </select>
                <br>
                <button id="btnFiltrer">Appliquer</button>
            </div>
            <div class="gridModuleStat">
                <div>
                    <h2 id="titre1" class="">Ce mois-ci : <?= $totalDemandesMois ?></h2>
                </div>
                <div>
                    <canvas id="camembertTypes" class=""></canvas>
                </div>
            </div>
            <div class="gridModuleStat">
                <div>
                    <h2 id="titre2" class="">Demandes clôturées par soi-même</h2>
                </div>
                <div>
                    <canvas id="camembertUtilisateur" class=""></canvas>
                </div>
            </div>
        </div>

    </div>
</div>



</html>
