<?php
session_start();
if(isset($_POST["email"]) && isset($_POST["mdp"])) {
    if($_POST["email"] === "admin@admin.fr" && $_POST["mdp"] === "admin") {
        $_SESSION["admin"] = true;
        if (isset($_POST["rememberme"]) && $_POST["rememberme"] = true) {
            setcookie("admin", "true", time() + 8640, '/');
        } else if (isset($_POST["rememberme"]) && $_POST["rememberme"] = false) {
            setcookie("admin", "", time() + 8640, '/');
        }
        header("Location: /index.php");
    }
    else {
        try {
            $pdo = new PDO('sqlite:../database/users/database.db');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_NUM);
        } catch (PDOException $pdo_exception) {
            die();
        }
        try {
            $statement = $pdo->prepare("SELECT name, password, id FROM users WHERE email = :email");
            $statement->execute(
                [
                    'email' => $_POST["email"]
                ]
            );
            $user = $statement->fetch();
            if($user != false) {
                if(password_verify($_POST["mdp"], $user[1])) {
                    $_SESSION["pseudo"] = $user[0];
                    $_SESSION["id"] = $user[2];
                    if(isset($_SESSION["user_email"])) {
                        $_SESSION["user_email"] = "";
                    }
                    if (isset($_POST["rememberme"]) && $_POST["rememberme"] = true) {
                        setcookie("pseudo", $_SESSION["pseudo"], time() + 8640, '/');
                        setcookie("id", $_SESSION["id"], time() + 8640, '/');
                    } else if (isset($_POST["rememberme"]) && $_POST["rememberme"] = false) {
                        setcookie("pseudo", "", time() + 8640, '/');
                        setcookie("id", "", time() + 8640, '/');
                    }
                    header("Location: /index.php");
                }
                else {
                    $_SESSION["user_email"] = $_POST["email"];
                    header("Location: /login.php");
                }
            }
        } catch (PDOException $pdo_exception) {
        }
    }
}
else
    header("Location: /index.php");
