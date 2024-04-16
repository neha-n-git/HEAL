<?php
    if(isset($_GET['edit_account'])){
        $user_session=$_SESSION['username'];
        $select_query="SELECT * FROM `user_table` where username='$user_session'";
        $select_result=mysqli_query($con,$select_query);
        $row_fetch=mysqli_fetch_array($select_result);
        $user_id= $row_fetch['user_id'];
        $username= $row_fetch['username'];
        $user_email= $row_fetch['user_email'];
        $user_mobile= $row_fetch['user_mobile'];
        $user_address= $row_fetch['user_address'];
    }

    if(isset($_POST['user_update'])){
        $update_id= $user_id;
        if(isset($_POST['username'])){
        $username= $_POST['username'];}
        if(isset($_POST['user_email'])){
        $user_email= $_POST['user_email'];}
        if(isset($_POST['user_mobile'])){
        $user_mobile= $_POST['user_mobile'];}
        if(isset($_POST['user_address'])){
        $user_address= $_POST['user_address'];}
        if(isset($_FILES['user_image']) && $_FILES['user_image']['error'] == 0){
            $user_image=$_FILES['user_image']['name'];
            $user_image_tmp=$_FILES['user_image']['tmp_name'];
            // Move the uploaded image to the desired directory
            move_uploaded_file($user_image_tmp,"user_images/$user_image");
        }

        //update query
        $update_data="UPDATE `user_table` set username='$username', user_email='$user_email', user_mobile=' $user_mobile', user_address=' $user_address', user_image='$user_image' where user_id='$update_id'";
        $result_query_update= mysqli_query( $con,$update_data);
        if($result_query_update){
            echo "<script>alert('Profile Information Updated Successfully!')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }
 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h3 class="text-center m-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="username" class="form-label">Username: </label>
            <input type="text" class="form-control m-auto" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="user_email" class="form-label">Email:</label>
            <input type="text" class="form-control m-auto" name="user_email" value=<?php echo $user_email; ?>>
        </div>
        <div class="form-outline mb-0 w-50 m-auto">
        <label for="user_image" class="form-label">Profile Image:</label>
        </div>
        <div class="form-outline mb-4 w-50 h-70 m-auto d-flex">
            <input type="file" class="form-control m-auto" name="user_image">
            <img style="border-radius:100%;height:50px; " src="user_images/<?php echo $user_image ?>" alt="">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="user_address" class="form-label">Address: </label>
            <input type="text" class="form-control m-auto" name="user_address" value="<?php echo $user_address;?>" >
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="user_mobile" class="form-label">Contact:</label>
            <input type="text" class="form-control m-auto" name="user_mobile" value=<?php echo $user_mobile; ?>>
        </div>
        <div class="text-center">
        <input type="submit" value="Update" class="bg-dark py-2 px-3 border-0 text-light" name="user_update" style="border-radius:5px;">
        </div>
    </form>
</body>
</html>