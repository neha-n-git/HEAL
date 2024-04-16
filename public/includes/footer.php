<?php
include_once('../functions/common_function.php');
session_start();

if(isset($_POST['subscribe'])){
    if(isset($_SESSION['username'])){ 
        $username = $_SESSION['username'];
        $user_email = mysqli_real_escape_string($con, $_POST['email']); // Sanitize user input

        $select_query = "SELECT * FROM `user_table` WHERE username= '$username'";
        $result = mysqli_query($con, $select_query);
        
        if($result){
            $row_count = mysqli_num_rows($result);
            if($row_count > 0){
                $row_data = mysqli_fetch_assoc($result);
                $user_id = $row_data['user_id'];
                
                $insert_query = "INSERT INTO `newsletter_sub`(`user_id`, `username`, `user_email`) VALUES ('$user_id', '$username', '$user_email')";
                $result_query = mysqli_query($con, $insert_query);
                
                if($result_query){
                    echo "<script>alert('Newsletter Subscription successful')</script>";
                } else {
                    echo "<script>alert('Error: " . mysqli_error($con) . "')</script>";
                }
            } else {
                echo "<script>alert('Invalid Credentials')</script>";
            }
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "')</script>";
        }
    } else {
        echo "<script>alert('Error: Session username not set')</script>";
    }
}
?>
