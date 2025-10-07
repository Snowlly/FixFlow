<html lang="fr">

    <h1 class="TitleUser">Mon compte</h1>

    <h2 class="TextMonCompte">Nom : <span><?php echo $_SESSION['Nom'] ?></span></h2>
    <h2 class="TextMonCompte">Prénom : <span><?php echo $_SESSION['Prenom'] ?></span></h2>
    <h2 class="TextMonCompte">Email : <span><?php echo $_SESSION['Email'] ?></span></h2>
    <h2 class="TextMonCompte">Vous êtes <span><?php echo $_SESSION['Type'] ?></span></h2>

</html>
