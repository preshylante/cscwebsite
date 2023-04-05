<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "task";

$connect = mysqli_connect($server, $username, $password, $database);
if(!$connect){
    die('Please something is wrong with your connection'.mysqli_error());
}
?>