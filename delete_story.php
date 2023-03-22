<?php
require 'connection.php';


$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM stories WHERE id='$id'");

if($result) {
    header("Location: user.php");
    exit();
} else {
    echo '<div class="alert alert-danger" role="alert">Error deleting story.</div>';
}
?>
