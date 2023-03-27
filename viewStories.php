<?php
require 'connection.php';

// Retrieve all stories from the database
$query = "SELECT * FROM stories";
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html>
<head>
<header>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 
    <!-- css style sheet  -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
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
            <a class="nav-link active" aria-current="page" href="Login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="SignUp.php">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="About.php">About Us</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="viewStories.php">View Stories</a></li>
              <li><a class="dropdown-item" href="Gallery.php">Gallery</a></li>
            </ul>
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

<title>List of Stories</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        
        body {
            background-color: #f5f5f5;
        }
        .list-group-item {
            background-color: #fff;
            border-color: #ddd;
            color: #333;
        }
        .list-group-item h2 {
            color: #1e90ff;
        }
        .list-group-item p:last-child {
            color: #888;
        }
    </style>
</head>
<body>

    <div class="container mt-5">

        <h1 class="text-center mb-3">List of Stories</h1>

        <ul class="list-group">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <li class="list-group-item">
                    <h2><?php echo $row['subject']; ?></h2>
                    <p><?php echo $row['story']; ?></p>
                    <p>By <?php echo $row['username']; ?></p>
                </li>
            <?php endwhile; ?>
        </ul>

    </div>
    <footer>
 
 <div class = “footer”>

   <h6> &copy; 2023 My StoryTelling App | Privacy | Terms</h6>

 </div>

</footer>

</body>
</html>


















