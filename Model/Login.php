<?php

session_start();

include ('BDD.php');

if (isset($_POST['BtnLogin'])) {
    if (!empty($_POST['mail']) && !empty($_POST['mdp'])) {
        $mail = htmlspecialchars($_POST['mail']);
        $password = $_POST['mdp'];
        $getUser = $bdd->prepare('SELECT * FROM User WHERE Email = ?');
        $getUser->execute(array($mail));
        $user = $getUser->fetch();

        if ($user && password_verify($password, $user['Password'])) {
            if ($user['Type'] == "Temporaire") {
                header('Location: index.php?page=Temporaire');
                exit();
            } else if ($user['Type'] == "GestionnaireCompte") {
                getUserInfo($bdd, $mail, 'Id_user');
                getUserInfo($bdd, $mail, 'Prenom');
                getUserInfo($bdd, $mail, 'Nom');
                getUserInfo($bdd, $mail, 'Email');
                getUserInfo($bdd, $mail, 'Type');
                getUserInfo($bdd, $mail, 'Zone');
                header('Location: index.php?page=IndexGCompte');
                exit();
            } else if ($user['Type'] == "GestionnaireDemat") {
                getUserInfo($bdd, $mail, 'Id_user');
                getUserInfo($bdd, $mail, 'Prenom');
                getUserInfo($bdd, $mail, 'Nom');
                getUserInfo($bdd, $mail, 'Email');
                getUserInfo($bdd, $mail, 'Type');
                getUserInfo($bdd, $mail, 'Zone');
                header('Location: index.php?page=IndexGDemat');
                exit();
            } else if ($user['Type'] == "Manageur") {
                getUserInfo($bdd, $mail, 'Id_user');
                getUserInfo($bdd, $mail, 'Prenom');
                getUserInfo($bdd, $mail, 'Nom');
                getUserInfo($bdd, $mail, 'Email');
                getUserInfo($bdd, $mail, 'Type');
                header('Location: index.php?page=IndexManageur');
                exit();
            } else if ($user['Type'] == "Admin") {
                getUserInfo($bdd, $mail, 'Id_user');
                getUserInfo($bdd, $mail, 'Prenom');
                getUserInfo($bdd, $mail, 'Nom');
                getUserInfo($bdd, $mail, 'Email');
                getUserInfo($bdd, $mail, 'Type');
                header('Location: index.php?page=AIndex');
                exit();
            }
        }
    }
}
function getUserInfo($bdd, $mail, $x)
{
    $recup = $bdd->prepare("SELECT $x FROM User WHERE Email = ?");
    $recup->execute(array($mail));
    $utilisateur = $recup->fetch();
    $_SESSION[$x] = $utilisateur[$x];
}
?>
