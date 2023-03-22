<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
 </head>
 <body>
    <div class="wrapper">
        <img src="Images/toris.jpg" alt="" srcset="">

        <h1>Login</h1>
        <form action="#" method = post>
            <input type="text" name = "email" placeholder="Enter your email">
            <input type="password" name = "password" placeholder="Password">
            <button type = "submit" name = "submit">Login</button>
        <div class="recover">
            <a href="#">Forgot Password?</a>
        </div>
        </form>

<div class="Existing User">
    Not an Existing User<a href="signup.php">
Register Now
</a>
</div>
</div>

<footer>
 
      <div class = “footer”>
 
        <h6> &copy; 2023 My StoryTelling App | Privacy | Terms</h6>
 
      </div>
    
</footer>
    
 </body>
 </html>

 

 <?php
        session_start();

        require 'connection.php';

        if(isset($_POST["submit"]))
        {
            $usernameemail = $_POST["email"];
            $password = $_POST["password"];

            $result = mysqli_query($conn, "SELECT * FROM tourist WHERE email = '$usernameemail'");
            $row = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result) > 0 )
            {
                if($password == $row["password"])
                {
                    $_SESSION["login"] = true;
                    $_SESSION["id"] = $row["id"];

                    if ($row["usertype"] == "admin")
                    {
                        header("Location: admin.php");
                    }
                    elseif ($row["usertype"] == "")
                    {
                        header("Location: user.php");
                    }
                }
                else
                {
                    echo "<script>alert('Wrong Password, insert your correct password');</script>";
                }
            }
            else
            {
                echo "<script>alert('User Not Found');</script>";
            }
        }
        ?>

