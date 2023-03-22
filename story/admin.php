<?php
    require 'connection.php';
    $query = "SELECT COUNT(*) AS username_count FROM tourist";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $username_count = $row['username_count'];
    
    // Count the number of stories in the database
    $query = "SELECT COUNT(*) AS story_count FROM stories";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $story_count = $row['story_count'];
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--     
  */-- Bootstrap and CSS --*/ -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/styles.css">

    <title>Welcome Admin</title>
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
            <a class="nav-link active" href="#">Welcome Admin</a>
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


<div class="container">
    <h1>Number of Users and stories</h1>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Users</h4>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo $username_count; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Stories</h4>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo $story_count; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>






    <?php
        // to delete story from database and to check 
        if (isset($_GET['delete'])) {
            $id = $_GET['delete'];
          
            $query = "DELETE FROM stories WHERE id='$id'";
            $result = mysqli_query($conn, $query);
        }

      
        $query = "SELECT * FROM stories";
        $result = mysqli_query($conn, $query);
    ?>

    <Main>
        <h1>Welcome Admin</h1>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Location</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Story</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['story']; ?></td>
                        <td>
                        <a href="adminDelete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </Main>


    <footer>
 
      <div class = “footer”>
 
        <h6> &copy; 2023 My StoryTelling App | Privacy | Terms</h6>
 
      </div>
</footer>


<!-- Bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

      
</body>
</html>
