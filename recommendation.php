<?php
include ("include/config.php");
/*
$item=isset($_SESSION["id"])?$_SESSION["id"]."":"1";
$tmp = exec("js\surprise_tests\Scripts\python.exe js/4recommendations.py \"" . $item . "\"");
var_dump($tmp);

$item="1600";
$tmp = exec("js\surprise_tests\Scripts\python.exe js/movie_title_seeker.py \"" . $item . "\"");
var_dump($tmp);


$videos = exec("js\surprise_tests\Scripts\python.exe
                js/4recommendations.py \"" . $_SESSION["id"] . "\"");
*/

$item = isset($_SESSION["id"])?($_SESSION["id"] % 944)."":"1";
$videos = exec("js\surprise_tests\Scripts\python.exe js/4recommendations.py \"" . $item . "\"");
$video1 = preg_split("/'/", $videos)[1];
$video2 = preg_split("/'/", $videos)[3];
$video3 = preg_split("/'/", $videos)[5];
$video4 = preg_split("/'/", $videos)[7];
var_dump($video1);
var_dump($video2);
var_dump($video3);
var_dump($video4);