 <?php


session_start();

if (isset($_POST['BtnNewAccount'])) {

    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $mail = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['mdp']);
    $confirmPassword = htmlspecialchars($_POST['confirmMdp']);
    $zone = htmlspecialchars($_POST['zone']);

    if ($password === $confirmPassword) {

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $reqNewAccount = "INSERT INTO User (Nom, Prenom, Email, Password, Zone, Type) VALUES (?, ?, ?, ?, ?, 'Temporaire')";
        $prepareNewAccount = $bdd->prepare($reqNewAccount);
        $prepareNewAccount->execute([$nom, $prenom, $mail, $passwordHash, $zone]);

        echo "<script> alert('Inscription réussie !') </script>";
        header('location: index.php?page=Login');
    } else {
        echo "<script> alert('La confirmation du mot de passe n\'est pas bonne !') </script>";
    }

    echo "<script> alert('Inscription impossible !') </script>";

}


?>