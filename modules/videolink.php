<section class="movie-cell">
    <h3>Nom du film</h3>
    <a href="videoviewer.php?name=<?php if(isset($video_name)) echo $video_name?>"><img class="video-picture" src="img/<?php if(isset($video_name)) echo $video_name?>.png"></a>
    <div class="rating">
        <p>0.5</p>
        <img src="/img/star.png" alt="A wonderful star ! (To illustrate ratings)" class="star-img">
    </div>
</section>