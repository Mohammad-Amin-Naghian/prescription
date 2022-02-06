<?php

$setPersian = array(
    PDO:: MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'
);

$conn = new PDO('mysql:host=localhost;dbname=university','root','',$setPersian);

error_reporting(E_ALL);
ini_set('display_errors',1);
?>