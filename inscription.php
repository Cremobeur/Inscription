<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscription</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="inscription.css">

</head>

<body>

<?php

$user_name = $_POST['user_name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$cf_password = $_POST['cf_password'] ?? '';
$errors = [];


if (!empty($_POST)) {
    // Vérifier l'email (Obligatoire) et vérifier le mot de passe (Obligatoire)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'L\'email n\'est pas valide !';
    }

    // Le mot de passe doit faire 6 caractères minimum
    if (strlen($password) < 6) {
        $errors['password'] = 'Le mot de passe est trop court !';
    }

    // Le nom d'utilisateur doit faire 6 caractères minimum
    if (strlen($user_name) < 6) {
        $errors['user_name'] = 'Le pseudo est trop court !';
    }

    // On va vérifier que les 2 mots de passe correspondent
    if ($password !== $cf_password) {
        $errors['cf_password'] = 'Les mots de passe ne correspondent pas !';
    }

}

?>

<div class="container">

    <h1>Inscription</h1>


    <div class="create-account">

        <div class="account">

            <h2>Créer un compte</h2>

            <form method="POST">

                <div>
                    <label for="user_name">Nom d'utilisateur</label>
                    <input type="text" name="user_name" id="user_name">

                    
                    <?php if (isset($errors['user_name'])) {
                        echo '<span>'.$errors['user_name'].'</span>';
                    } ?>

                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                    
                    <?php if (isset($errors['email'])) {
                        echo '<span>'.$errors['email'].'</span>';
                    } ?>

                </div>

                <div>
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password">

                    <?php if (isset($errors['password']) ) {
                        echo '<span>'.$errors['password'].'</span>';
                    } ?>

                    <?php if (isset($errors['cf_password'])) {
                        echo '<span>'.$errors['cf_password'].'</span>';
                    } ?>

                </div>

                <div>
                    <label for="cf_password">Confirmer le mot de passe</label>
                    <input type="password" name="cf_password" id="cf_password">

                    <?php if (isset($errors['password']) ) {
                        echo '<span>'.$errors['password'].'</span>';
                    } ?>
                    
                    <?php if (isset($errors['cf_password'])) {
                        echo '<span>'.$errors['cf_password'].'</span>';
                    } ?>

                </div>

                <div>
                    <button>Créer un compte</button>
                </div>

            </form>

        </div>

    </div>

</div>
    
</body>

</html>