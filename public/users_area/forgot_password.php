<?php
// Include your database connection file and any necessary functions
include('../includes/connect.php');
include('../functions/common_function.php');

// Check if the form is submitted
if(isset($_POST['submit'])){
    // Retrieve the username or email entered by the user
    $username_or_email = $_POST['username_or_email'];
    
    // Query the database to check if the username or email exists
    $query = "SELECT * FROM `user_table` WHERE username='$username_or_email' OR user_email='$username_or_email'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0){
        // User exists, redirect to reset password page with username or email as parameter
        header("Location: reset_password.php?username_or_email=$username_or_email");
        exit();
    } else {
        echo "<script>alert('User not found.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h3 class="text-center m-4">Forgot Password</h3>
    <form action="" method="post">
        <div class="form-outline mb-4 w-50 m-auto">
        <label for="username_or_email" class="form-label">Username or Email:</label>
        <input type="text" id="username_or_email" name="username_or_email" class="form-control m-auto"required><br>
        <button type="submit" name="submit" class="btn btn-dark m-auto">Submit</button></div>
    </form>
    <!-- Link back to login page -->
    <div class="m-auto">
    <p class='text-center border-1'><a href="login.php" class="text-dark text-center" style='text-decoration:none;'>Back to Sign in</a></p></div>
</body>
</html>
