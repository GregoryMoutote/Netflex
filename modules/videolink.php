<section class="movie-cell">
    <h3><?php if(isset($video_name)) echo $video_name?></h3>
    <a href="videoviewer.php?name=<?php if(isset($video_name)) echo $video_name?>">
        <img class="video-picture" src="img/<?php
        if(isset($video_name) && file_exists("img/" . $video_name . ".png"))
            echo $video_name;
        else echo "black_pixel"?>.png">
    </a>
    <div class="rating">
        <p><?=isset($rating)?$rating:rand(0,5);?></p>
        <img src="/img/star.png" alt="A wonderful star ! (To illustrate ratings)" class="star-img">
    </div>
</section>