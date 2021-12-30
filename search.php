<?php
include ("include/config.php");
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Netflex</title>
</head>
<body>
    <?php $page_name = "Recherche"; include ("modules/header.php")?>
    <main>
        <div id="search-area">
            <form action="search.php" method="get">
                <input type="text" name="searchbar" placeholder="Search" id="searchbar">
                <button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div>
            <?php
            if(isset($_GET["searchbar"])) {
                $videos = exec("js\surprise_tests\Scripts\python.exe js/search.py \"" . $_GET["searchbar"] . "\"");
                if($videos != "[]") {
                    $videos = preg_split("/\|/", $videos);
                    foreach ($videos as $video) {
                        $rating1 = exec("js\surprise_tests\Scripts\python.exe js/get_rating.py \"" . $video . "\"");
                        echo '<div class="video-frame">';
                        if (isset($rating1)) $rating = $rating1;
                        $video_name = $video;
                        include("modules/videolink.php");
                        echo '</div>';
                    }
                }
                else {
                    echo "<h2>Aucun résultat</h2>";
                }
            }
            ?>
        </div>
    </main>
    <?php include ("modules/footer.php")?>
</body>
</html>