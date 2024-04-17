<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>

        body {
            background-image: url("img/signinbg2.jpg");
            background-size: cover;
            color: #394169;
            background-attachment: fixed;
            margin: 0;
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            overflow-x:  hidden;
        }

        .container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 80vh;
            margin-right: 15%;
        
        }

        form {
            margin-top: 20px;
            background-color: transparent;
            padding: 20px;
            width: 300px;
            font-family: "Poppins", sans-serif;
        }

        form h2 {
            text-align: center;
            color: #333;
            font-size: 33px;
            font-weight: bold;
            font-family: "Montserrat", sans-serif;
        }

        label {
            display: block;
            margin-top: 6px;
            margin-left:15px;
            font-size: 14px;
            color: #394169;
        }

        .btn{
            color: white;
            padding: 14px 15px;
            font-weight: bold;
            font-size: 15px;
            border: none;
            cursor: pointer;
            display: block;
            margin: 0 auto;
            opacity: 1;
            width: 100%;
            border-radius: 25px; 
            margin-top: 18px;
        }
        .btn:hover {
        color: #fdcf34; 
       
    }
        .signup{
            font-size: 10px;
            text-align: center;
            color:#9e9d9d; 
            margin-top: 5px;
        }
        .forgot-password {
            text-align: center;
            font-size:10px;
            margin-top: 2px;
            margin-left:8px;
            }
        </style>
</head>
</head>
<body class="bg-scroll">
    <div class="container"><!--content wrapper-->
        <div>
            <form action="" method="POST">
                <h2>Log in</h2>
                <div class="form-outline">
               <label for="user_username" class="label">Username:</label>
               <input type="text" id="user_username"  class="form-control mb-4 py-2" style="border-radius:25px;  border: 1px solid #ccc;" autocomplete="off" name="user_username" required>
               </div>

               <div class="form-outline">
                <!-- password-->
                <label for="user_password" class="label">Password:</label>
                <input type="password" id="user_password" class="form-control mb-2 py-2" style="border-radius:25px;  border: 1px solid #ccc;" name="user_password" required>
                </div>

                <div class="form-outline">
                <input type="submit" value="LOGIN" class="btn mt-4" style="background-color:#03796d; border-radius:25px; border: 1px solid #000;" name="user_login">
                </div>
            </form>
                <div class="forgot-password">
                    <a href="forgot_password.php" style="color:#9e9d9d; text-decoration: none;"><p>Forgot password?</p></a>
                </div>
                <div class="signup">
                     Don't have an account? 
                    <a href="reg.php" id="signuplink" style="color:#03796d; text-decoration: none;" >Register Here</a>
                </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

<?php
    if(isset($_POST['user_login'])){
        $user_username= $_POST["user_username"];
        $user_password= $_POST["user_password"];

        $select_query= "SELECT * FROM `user_table` WHERE username= '$user_username'";
        $result= mysqli_query($con, $select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);
        if($row_count>0){
            $_SESSION['username']=$user_username;
            if(password_verify($user_password,$row_data['user_password'])){
            $_SESSION['username']=$user_username;
            echo "<script>alert('Login Successful')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
            
          }else{
            echo "<script>alert('Invalid Credentials')</script>";
          }
        }else{
            echo "<script>alert('Username does not exist!')</script>";
        }
    }

?>
