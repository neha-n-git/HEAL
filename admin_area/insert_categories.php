<?php
include('../includes/connect.php');

if(isset($_POST['insert_cat'])){
    $category_title=$_POST['cat_title'];

    //select data from database
    $select_query="SELECT * from categories where category_title= '$category_title'"; 
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows( $result_select );
    if($number> 0){
        echo "<script>Category already exist! </script>";
    }else{
    $insert_query="INSERT INTO categories (category_title) VALUES ('$category_title')";
    $result=mysqli_query($con,$insert_query);
     if($result){ 
        echo "<script>alert('Category Added Successfully');</script>";
     }else{
        die("Query Failed". mysqli_error($con));}
}}
?>
<h2 class="text-center mb-4">Insert Catergories</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="categories" aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="p-3 my-3 border-1" style="background-color:#edf4fc"; name="insert_cat" value="Insert Category" >
    </div>
</form>
