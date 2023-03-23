<?php
require 'connection.php';


if(isset($_POST['submit']))
{

    $username = $_POST['username'];
    $location = $_POST['location'];
    $subject = $_POST['subject'];
    $story = $_POST['story'];
    $file = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];


    $fileExt = explode('.', $file);
    $fileActualExt = strtolower(end($fileExt));
    
  
    $query = "INSERT INTO stories VALUES('','$username', '$location', '$subject','$story', '$file')";
    $result =  mysqli_query($conn,$query);
    if($result)
   {
   
            $fileActualExt = strtolower(end($fileExt));
                
            //  files that are acceptable for upload
            $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'mp4');

            if (in_array($fileActualExt, $allowed))
            {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                move_uploaded_file($_FILES['file']['tmp_name'], "$file");

                    if ($fileSize < 50000000)
                        {
                        
                            ?>
                            <div class="alert alert-success" role="alert" width = 2px;>
                    <?php echo  "This is a success alert—check it out!"?>
                    </div>
                    <?php
                              header ("Location: user.php"); 

                        }
                        else
                            {
                                
                                $msg = '<div class = "alert alert-danger">File too large.</div>';
                            }
                

                
            }else
                {
                    echo
                    "<script> alert('Your file is not supportted, Use only 'jpg', 'jpeg','png', 'pdf'');</script>";
                }


    
    }
    else
    {
        echo
        "<script> alert('Your file is not supportted, Use only 'jpg', 'jpeg','png', 'pdf'');</script>";
    }

          
}


           
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <title>Create a Story</title>
<!-- this is the link to bootsrap and css -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="css/storystyle.css?v=<?php echo time();?>">
</head>
<body>
    <div class="container">
            <form action="" method="post" enctype = "multipart/form-data">
                <h3>Create Your Story</h3>
                <input type="text" name = "username" id = "username" placeholder="Enter your username.." required>
                <input type="text" name = "location" id = "location" placeholder="Enter the Tourist Location.." required>
                <input type="text" name = "subject" id = "subject" placeholder="Topic.." required>
                <textarea name="story" id="message"  rows="5" placeholder="Share Toursim Experience?"></textarea>
                <input type="file" name="file" id="">
                <button type="submit" name = "submit">Send</button
            </form>
    </div>
   
  

    
</body>
</html>
