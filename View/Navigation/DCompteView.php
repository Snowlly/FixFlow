<html lang="fr">

    <div class="containerDCompte">

        <div class="ContainerCompte1">
            <h1 class="TitleUser">Mon compte</h1>

            <h2 class="TextMonCompte">Nom : <span><?php echo $_SESSION['Nom'] ?></span></h2>
            <h2 class="TextMonCompte">Prénom : <span><?php echo $_SESSION['Prenom'] ?></span></h2>
            <h2 class="TextMonCompte">Email : <span><?php echo $_SESSION['Email'] ?></span></h2>
            <h2 class="TextMonCompteStatus">Vous êtes
                <span>
                    <?php
                        if ($_SESSION['Type'] = 'GestionnaireDemat')  {
                            echo 'Gestionnaire de dématérialisation';
                        } else if ($_SESSION['Type'] = 'GestionnaireCompte') {
                            echo 'Gestionnaire de compte';
                        }
                    ?>
                </span>
            </h2>
        </div>

        <div class="trait"></div>

        <div class="ContainerCompte2">

            <h2 class="TitleUser">Demande(s) d'autorisation</h2>

            <table class="center">
                <thead>
                <tr>

                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Zone</th>
                    <th scope="col">Action à faire</th>

                </tr>
                </thead>

                <?php

                while ($row = $CompteTemporaire->fetch()) {

                    echo "
        <tr>
            <th scope='row'>{$row['Nom']}</th>
            <td><b>{$row['Prenom']}</b></td>
            <td>{$row['Email']}</td>
            <td>CG{$row['Zone']}</td>
            <td class='spaceCompte'>
                <form class='formCompte' method='post'>
                    <input type='hidden' name='id' value='{$row['Id_user']}'>
                    <button class='BtnAccept' name='accept'>Autoriser</button>
                    <button class='BtnRefuse' name='refuse'>Refuser</button>
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

    </div>

</html>