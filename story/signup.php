
<?php
require 'connection.php';
if(!empty($_SESSION["id"])){
    header("Location: signup.php");
}
if(isset($_POST["submit"]))
{

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tourist WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate)>0)
    {

        echo
        "<script> alert('Username or Email Has Alredy Being Used, Try another one'); </script>";


    }
    else
    {
        if ($password == $confirmpassword)
        {
            $query = "INSERT INTO tourist VALUES('','$username','$email','$password', '')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('Registration Successfull, Click ok then click login');</script>";
            header("Location: login.php");
   
        }
        
        else
        {
            echo
            "<script> alert('Password and Confirm Password does not Match');</script>";
        }

    }



}

?>

<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
    <linl rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
 </head>
 <body>
    
    <div class="wrapper">
        <img src="Images/toris.jpg" alt="" srcset="">
        <h1>Sign Up</h1>
        <form action="" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name = "email" placeholder="Enter your email" required>
            <input type="password" name="password" placeholder="Password" requied>
            <input type="Password" name = "confirmpassword" placeholder="Re-Enter Password" reqired><br>
            <input type="checkbox" id="checkbox">
            <label for="checkbox"> I agree to these <a href="#" >Terms & Conditions</a></label><br>
            <button type="Submit" name="submit" >Sign Up</button>
            <div class="Existing User">
                Existing user? <a href="./login.php">
                    Login Here</a>
            </div>
                    </form>

    </div>
    <br>
<footer>
 
      <div class = “footer”>
 
        <h6> &copy; 2023 My StoryTelling App | Privacy | Terms</h6>
 
      </div>
    
</footer>


 </body>
 </html>

