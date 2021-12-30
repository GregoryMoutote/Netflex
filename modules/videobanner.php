<div class="category-title">
    <h2>
        <?= $title?>
    </h2>
</div>
<div class="video-banner">
    <div class="video-frame">
        <?php if(isset($rating1)) $rating = $rating1; $video_name = $video1; include ("modules/videolink.php")?>
    </div>
    <div class="video-frame">
        <?php if(isset($rating2)) $rating = $rating2; $video_name = $video2; include ("modules/videolink.php")?>
    </div>
    <div class="video-frame">
        <?php if(isset($rating3)) $rating = $rating3; $video_name = $video3; include ("modules/videolink.php")?>
    </div>
    <div class="video-frame">
        <?php if(isset($rating4)) $rating = $rating4; $video_name = $video4; include ("modules/videolink.php")?>
    </div>
</div>