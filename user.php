<?php
// PHP code for sign-up form
$host = "localhost";
$username = "root";
$password = "";
$dbname = "storyteller";


// Create connection
session_start();
$conn = mysqli_connect($host, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed:" . $conn->connect_error);
        
        } 


        //if session is login
    if(!empty($_SESSION["id"]))
        {
            $id = $_SESSION["id"];
            $result = mysqli_query($conn, "SELECT * FROM tourist  WHERE id = $id");
             $row = mysqli_fetch_assoc($result);
    }
    //else go back to login page
     else{
           header("Location: login.php");
         }

?>
<!<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- css style sheet  -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <title>STORYTTELLING WEB APPLICATION</title>
</head>


<body>
    <header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">AGT Teller</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
            <a class="nav-link active" href="About.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="create.php">Create Story</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Welcome <?php echo $row["username"]; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="logout.php">Log Out</a>
          </li>
        

        
          
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>
<body>
<div class="container">
    <?php
        $id = $row["username"];
        $result = mysqli_query($conn, "SELECT * FROM stories WHERE stories.username = '$id'");
        
        while($row2 = mysqli_fetch_assoc($result)){
            echo '<div class="card mb-3">';
            echo '<div class="card-body">';
            echo "<h2 class='card-title'>{$row2['location']}</h2>";
            echo "<h3 class='card-subtitle mb-2 text-muted'>{$row2['subject']}</h3>";
            echo "<p class='card-text'>{$row2['story']}</p>";
            echo "<img src='{$row2['file']}' alt='no pics for now' class='card-img-bottom'>";
            echo '<div class="mt-3">';
            echo "<a href='edit_story.php?id={$row2['id']}' class='btn btn-primary'>Edit</a>";
            echo "<a href='delete_story.php?id={$row2['id']}' class='btn btn-danger'>Delete</a>";
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    ?>
</div>



</body>         
        
          
         
<footer>
 
      <div class = “footer”>
 
        <h6> &copy; 2023 My StoryTelling App | Privacy | Terms</h6>
 
      </div>
</footer>
      


      
    
 </body>
 </html>