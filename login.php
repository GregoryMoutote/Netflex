<?php
session_start();
include ("classes/FormCreator.php");
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Page de connexion</title>
</head>
<body>
    <?php $pagename = "Connexion"; require 'modules/header.php'?>
    <main>
        <?php
        $form = new FormCreator("post", "modules/loginverification.php");
        $form->field_set_start("Formulaire de connexion");
        $form->input("email", [
            "label" => "Adresse eMail",
            "pattern" => "[a-zA-Z0-p]+@[a-zA-Z0-p]+\.[a-zA-Z0-p]+",
            "value" => isset($_SESSION["user_email"])?$_SESSION["user_email"]:""
        ]);
        $form->input("mdp",[
            "id" => "inputpassword",
            "type" => "password",
            "label" =>"Mot de passe",
        ]);
        $form->input("rememberme",[
            "type" => "checkbox",
            "label" => "Se souvenir de moi",
        ]);
        $form->field_set_end();
        $form->submit_button("Se connecter");
        $form->form_end();
        ?>
    </main>
    <?php include 'modules/footer.php'?>
</body>
</html>
