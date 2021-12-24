<header>
    <a href="index.php">
        <img src="img/logo.png" alt="Logo de Netflex">
    </a>
    <h1>
        <?php if(isset($page_name)) echo $page_name?>
    </h1>
    <nav>
        <a class="log-button" href=<?php
        if((isset($_SESSION['admin']) && $_SESSION["admin"]) || (isset($_SESSION["pseudo"]))) {
            $link = "modules/logout.php";
        }
        else {
            $link = "login.php";
        }
        echo "\"" . $link . "\"";
        ?> id="loginbutton">
            <?php
            if((isset($_SESSION['admin']) && $_SESSION["admin"]) || isset($_SESSION["pseudo"])) {
                echo "<p>Se déconnecter</p>";
                if(isset($_SESSION['pseudo'])) {
                    echo '<p>';
                    echo $_SESSION['pseudo'];
                    echo '</p>';
                }
            }
            else {
                echo "<p>Se connecter</p>";
            }
            ?>
        </a>
    </nav>
</header>
