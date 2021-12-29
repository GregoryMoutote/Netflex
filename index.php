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
    <?php $page_name = "Accueil"; include ("modules/header.php")?>
    <main>
        <div id="search-area">
            <form action="search.php" method="post">
                <input type="text" placeholder="Search" id="searchbar">
                <button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <?php
        $title = "Recommendations";
        if(isset($_SESSION["id"])) {
            $item = ($_SESSION["id"] % 944) . "";
            $videos = exec("js\surprise_tests\Scripts\python.exe js/4recommendations.py \"" . $item . "\"");
            if($videos != "") {
                $video1 = preg_split("/'/", $videos)[1];
                $video1 = exec("js\surprise_tests\Scripts\python.exe js/movie_title_seeker.py \"" . $video1 . "\"");
                $video2 = preg_split("/'/", $videos)[3];
                $video2 = exec("js\surprise_tests\Scripts\python.exe js/movie_title_seeker.py \"" . $video2 . "\"");
                $video3 = preg_split("/'/", $videos)[5];
                $video3 = exec("js\surprise_tests\Scripts\python.exe js/movie_title_seeker.py \"" . $video3 . "\"");
                $video4 = preg_split("/'/", $videos)[7];
                $video4 = exec("js\surprise_tests\Scripts\python.exe js/movie_title_seeker.py \"" . $video4 . "\"");
            }
            else {
                $video1 = "video1";
                $video2 = "video2";
                $video3 = "video3";
                $video4 = "video1";
            }
        }
        else {
            $video1 = "video1";
            $video2 = "video2";
            $video3 = "video3";
            $video4 = "video1";
        }
        include ("modules/videobanner.php");
        ?>
        <?php
        $title = "Récents";
        $videos = exec("js\surprise_tests\Scripts\python.exe js/four_lastest_movies.py");
        if($videos != "") {
            $video1 = preg_split("/\|/", $videos)[0];
            $video2 = preg_split("/\|/", $videos)[1];
            $video3 = preg_split("/\|/", $videos)[2];
            $video4 = preg_split("/\|/", $videos)[3];
        }
        else {
            $video1 = "video1";
            $video2 = "video2";
            $video3 = "video3";
            $video4 = "video1";
        }
        include ("modules/videobanner.php");
        ?>
        <?php
        $title = "Populaires";
        $video1 = "video1";
        $video2 = "video2";
        $video3 = "video3";
        $video4 = "video1";
        include ("modules/videobanner.php");
        ?>
    </main>
    <?php include ("modules/footer.php")?>
</body>
</html>