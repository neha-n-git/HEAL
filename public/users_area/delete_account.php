    <h3 class="text-danger mt-4 mb-4 text-center">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="delete" value="Delete Account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="cancel" value="Cancel">
        </div>
    </form>

    <?php
    $username=$_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_user= "DELETE from `user_table` where username='$username'";
        $result=mysqli_query($con,$delete_user);
        if($result){
            session_destroy();
            echo "<script> alert('Account Deleted Successfully') </script>";
            echo "<script> window.open('../index/index.php','_self') </script>";
        }
    }
    if(isset($_POST['cancel'])){
        echo "<script> window.open('profile.php','_self') </script>";
    }
    ?>