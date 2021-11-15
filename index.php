<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="css/stylesheet.css">
    <title>Netflex</title>
</head>
<body>
    <?php $page_name = "Accueil"; include ("modules/header.php")?>
    <main>
        <div id="searcharea">
            <form action="search.php" method="post">
                <input type="text" placeholder="Search" id="searchbar">
            </form>
        </div>
        <?php $video_name = "video1"; include ("modules/video.php")?>
        <?php $video_name = "video2"; include ("modules/video.php")?>
        <?php $video_name = "video3"; include ("modules/video.php")?>
        <?php $video_name = "video4"; include ("modules/video.php")?>
    </main>
    <?php include ("modules/footer.php")?>
</body>
</html>