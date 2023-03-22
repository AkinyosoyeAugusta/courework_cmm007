<?php
require 'connection.php';


if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $username = $_POST['username'];
    $location = $_POST['location'];
    $subject = $_POST['subject'];
    $story = $_POST['story'];
    $file = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];

    $fileExt = explode('.', $file);
    $fileActualExt = strtolower(end($fileExt));

    // this is to upload stories in the database
    $query = "UPDATE stories SET username='$username', location='$location', subject='$subject', story='$story', file ='$file'";
    if ($file != '') {
         $query .= ", file='$file'";
    }
    $query .= " WHERE id='$id'";
    $result = mysqli_query($conn,$query);

    if($result) {
    if ($file != '') {
        $fileNameNew = uniqid('', true).".".$fileActualExt;
            move_uploaded_file($_FILES['file']['tmp_name'], "uploads/$fileNameNew");
        }
        header("Location: user.php");
        exit();
    } else {
        echo '<div class="alert alert-danger" role="alert">Error updating story.</div>';
    }
}
$id = $_GET['id'];
// Retrieve 
$result = mysqli_query($conn, "SELECT * FROM stories WHERE id='$id'");
$row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/storystyle.css?v=<?php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit Story</title>
</head>
<body>
    
<form action="" method="post" enctype="multipart/form-data">
    <h3>Create Your Story</h3>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="text" name="username" id = "username" value="<?php echo $row['username']; ?>" required>
    <input type="text" name="location" id = "location" value="<?php echo $row['location']; ?>" required>
    <input type="text" name="subject" id = "subject" value="<?php echo $row['subject']; ?>" required>
    <textarea name="story" rows="5" id = message required><?php echo $row['story']; ?></textarea>
    <input type="file" name="file">
    <button type="submit" name="submit">Save Changes</button>
</form>
</body>
</html>


