<?php

$host = 'localhost';
$user = 'root';
$password = 'dbpass';
$dbname = 'LIBRARY';

$con = mysql_connect($host, $user, $password);

if(!$con) {
    die('Unable to connect to database ['.mysql_error().']');   
}else{
    echo "I connected!<br>";
}

$db_selected = mysql_select_db($dbname, $con);

if(!$db_selected){
    die('Can\'t use root at : '.mysql_error());
}else {
    echo 'In Library DB<br>';
}