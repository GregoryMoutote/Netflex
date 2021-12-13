<?php
$item='826';
$tmp = exec("js\surprise_tests\Scripts\python.exe js/4recommendations.py \"" . $item . "\"");
var_dump($tmp);