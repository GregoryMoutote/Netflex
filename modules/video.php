<video controls muted src="videos/<?php if(isset($video_name) && file_exists("videos/" . $video_name . ".mp4"))
        echo $video_name;
    else {
        echo "video1";
    }?>.mp4">
    <track default kind="subtitles" srclang="en" src="videos/<?php if(isset($video_name)) echo $video_name?>.mp4"/>
</video>