<?php
//connect to data PAGE
require 'connection.php';
$_SESSION = [];
session_unset();
//LOG OUT
session_destroy();
//GO BACK TO HOMEPAGE
header("Location: index.php");