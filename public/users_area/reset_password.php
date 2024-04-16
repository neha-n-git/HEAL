<?php
// Include your database connection file and any necessary functions
include('../includes/connect.php');
include('../functions/common_function.php');

// Check if the username or email parameter is set
if(isset($_GET['username_or_email'])){
    $username_or_email = $_GET['username_or_email'];

    // Check if the form is submitted
    if(isset($_POST['submit'])){
        // Retrieve the new password entered by the user
        $new_password = $_POST['new_password'];
        
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        
        // Update the user's password in the database
        $update_query = "UPDATE `user_table` SET user_password='$hashed_password' WHERE username='$username_or_email' OR user_email='$username_or_email'";
        $update_result = mysqli_query($con, $update_query);

        if($update_result){
            echo "<script>alert('Password reset successfully.');</script>";
            echo "<script>window.location.href = 'signin.php';</script>";
            exit();
        } else {
            echo "<script>alert('Failed to reset password.');</script>";
        }
    }
} else {
    // Redirect back to forgot password page if username or email parameter is not set
    header("Location: forgot_password.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h3 class="text-center m-4">Reset Password</h3>
    <form action="" method="post">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="new_password" class="form-label">New Password:</label>
            <input type="password" id="new_password" name="new_password" class="form-control m-auto"required><br>
            <button type="submit" name="submit" class="btn btn-dark m-auto">Reset Password</button></div>
    </form>
</body>
</html>
