<?php
include('../includes/connect.php');

if(isset($_POST['insert_br'])){
    $brand_title=$_POST['br_title'];
    //select data from database
    $select_query="SELECT * from brands where brand_title= '$brand_title'"; 
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows( $result_select );
    if($number> 0){
        echo "<script>Brand already exist! </script>";
    }else{
    $insert_query="INSERT INTO brands (brand_title) VALUES ('$brand_title')";
    $result=mysqli_query($con,$insert_query);
     if($result){ 
        echo "<script>alert('Brand Added Successfully');</script>";
     }else{
        die("Query Failed". mysqli_error($con));}
}}
?>
<h2 class="text-center mb-4">Insert Brands</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="br_title" placeholder="Insert Brands" aria-label="brands" aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class="p-3 my-3 border-1" style="background-color:#edf4fc"; name="insert_br" value="Insert Brand" >
    </div>
</form>
