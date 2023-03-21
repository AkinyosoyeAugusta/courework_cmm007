<?php
require 'connection.php';

// Get the ID of the story to be deleted
$id = $_GET['id'];

// Delete the story from the database
$result = mysqli_query($conn, "DELETE FROM stories WHERE id='$id'");

if($result) {
    header("Location: admin.php");
    exit();
} else {
    // If there is an error
    echo '<div class="alert alert-danger" role="alert">Error deleting story.</div>';
}
?>
