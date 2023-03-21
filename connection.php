<?php

$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "storyteller";


session_start();
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname) or die (mysql_error());
