<?php
session_start();
$_SESSION = [];
setcookie("admin","", time() + 8640, '/');
setcookie("pseudo","", time() + 8640, '/');
setcookie("id","", time() + 8640, '/');
session_destroy();
header("Location: /index.php");