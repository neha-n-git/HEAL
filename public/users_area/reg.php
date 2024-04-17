<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<?php
    if(isset($_POST['user_register'])){
        $user_username=$_POST['user_username'];
        $user_password=$_POST['user_password'];
        $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
        $user_email=$_POST['user_email'];
        $conf_user_password=$_POST['conf_user_password'];
        $user_address=$_POST['user_address'];
        $user_contact= $_POST['user_contact'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name'];
        $user_ip=getIPAddress();

        //Select query- to check if the username already exists or not
        $query="SELECT * FROM `user_table` WHERE username='$user_username' or user_email='$user_email' or user_mobile='$user_contact' ";
        $result=mysqli_query($con,$query);
        $rows_count=mysqli_num_rows($result);

        if($rows_count>0){
            echo "<script>alert('User already exists')</script>"; 
        }else if($user_password!=$conf_user_password){
            echo "<script>alert('The passwords do not match')</script>";  
        }
        else if(strlen($user_password) < 8) {
            echo "<script>alert('Password should be at least 8 characters long')</script>"; 
        }
        else{
        //insert query
        move_uploaded_file($user_image_tmp,"user_images/$user_image");
        $insert_query="INSERT INTO `user_table`(username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
        $sql_execute=mysqli_query($con,$insert_query);
        if($sql_execute){
            $_SESSION['username']=$user_username;
            echo "<script>alert('Data inserted successfully')</script>";
            echo "<script>window.location.href = '../Home/homepage.php';</script>";
            exit();
        }else{
                die(mysqli_error($con));
        }
    } 

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css\style1.css">
<!-- bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url('img/bgsignup.png');
            font-family: 'Poppins';
            background-position: center;
            background-repeat: no-repeat;
        }
        #password-error {
            color: red;
            display: none;
            font-size: 10px;
            font-style: italic;
            }
        .container{
            margin-right:10%;
        }
        
    </style>

</head>
<body class="bg-scroll">
    <div class="container" style="height: 80vh;"><!--content wrapper-->
        <div style="height: 80vh;">
            <form action="" method="post" enctype="multipart/form-data">
                <h2>Sign Up</h2>

                <div class="form-outline">
               
                <label for="user_username" class="label">Username:</label>
                <input type="text" id="user_username"  class="form-control mb-2" style="border-radius:25px;  border: 1px solid #ccc;" autocomplete="off" name="user_username" required>
                </div>


                <div class="form-outline">
                <!-- email -->
                <label for="user_email" class="label">E-mail:</label>
                <input type="email" id="user_email" class="form-control mb-2" style="border-radius:25px;  border: 1px solid #ccc;" autocomplete="off" name="user_email" required>
                </div>

                <div class="form-outline">
                <!-- image feild-->
                <label for="user_image" class="label">User Image:</label>
                <input type="file" id="user_image" class="form-control mb-2" style="border-radius:25px;  border: 1px solid #ccc;" name="user_image" required>
                </div>

                <div class="form-outline">
                <!-- password-->
                <label for="user_password" class="label">Password:</label>
                <input type="password" id="user_password" class="form-control mb-2" style="border-radius:25px;  border: 1px solid #ccc;" name="user_password" required>
                </div>

                <div class="form-outline">
                <!-- confirm password-->
                <label for="conf_user_password" class="label">Confirm Password:</label>
                <input type="password" id="conf_user_password" class="form-control mb-2" style="border-radius:25px;  border: 1px solid #ccc;" name="conf_user_password" required>
                <div id="password-error" class="error"></div>
                </div>

                <div class="form-outline">
                <!-- address -->
                <label for="user_address" class="label">Address:</label>
                <input type="text" id="user_address" class="form-control mb-2" style="border-radius:25px;  border: 1px solid #ccc;" autocomplete="off" name="user_address" required>
                </div>

                <div class="form-outline">
                <!-- contact -->
                <label for="user_contact" class="label">Contact:</label>
                <input type="text" id="user_contact" class="form-control mb-2" style="border-radius:25px;  border: 1px solid #ccc;" autocomplete="off" name="user_contact" required>
                </div>

                <div class="col-12">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                    </div>
                </div>

                <div class="text-center">
                <input type="submit" value="Create Account" class="btn btn-dark py-3 px-5 mt-3" style="border-radius:25px; border: 1px solid #000;" name="user_register">
                </div>

                <p class="small mt-3" style="text-align: center;color:#9e9d9d; margin-top: 5px;">Already have an account? <a href="signin.php"  style="text-decoration:none;color:#196a8d"> Login</a></p>

            </form>
        </div>
    </div>
    <script>
        const passwordInput = document.getElementById("user_password");
        const confirmPasswordInput = document.getElementById("conf_user_password");
        const passwordError = document.getElementById("password-error");
        confirmPasswordInput.addEventListener("input", function() {
        if (passwordInput.value !== confirmPasswordInput.value) {
            passwordError.textContent = "Passwords do not match";
            passwordError.style.display = "block";
        } else {
            passwordError.textContent = "";
            passwordError.style.display = "none";
        }
        });
        


    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
