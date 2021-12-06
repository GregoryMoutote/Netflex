<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Video player</title>
</head>
<body>
    <?php $page_name = "Netflex"; include ("modules/header.php")?>
     <main>
         <div class="video-viewer-wrapper">
            <div class="video-container">
                <?php $video_name = isset($_GET['name'])?$_GET['name']:"video1"; include ("modules/video.php")?>
            </div>
            <div class="video-desc">
                <h2><?php echo $video_name?></h2>
                <div>
                    <p><?=rand(0,5);?></p>
                    <img src="/img/star.png" alt="A wonderful star ! (To illustrate ratings)" class="star-img">
                </div>
                <h2> Description</h2>
                <p> <?php if($video_name=="video1"){
                    echo "Rémy1 parle de sa raison de devenir développeur... rendre réelles ses waifus !";
                    }
                    elseif($video_name=="video2"){
                    echo "Gregory présente aussi son but en tant que développeur !";
                    }
                    else{
                     echo "Rémy2 développe ses maléfiques desseins remplis de vengeance après être devenu développeur =O";
                    }
                    ?></p>
            </div>
         </div>
    </main>
</body>
</html>
