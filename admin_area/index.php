<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css" />
    <!--fontawesome(?)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .admin-image{
            width:100px;
            object-fit: contain;
            }
        .footer{
        position:absolute;
        bottom:0;
        }
        body{
        overflow-x:hidden;
        }
    </style>

</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg" style="background-color:#edf4fc;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> <!--link to home-->
                <img src="..\assets\Logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                HEAL
                </a>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Welcome Guest !</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <div class="bg-transparent">
            <h3 class="text-center p-4">Manage Details</h3>
        </div>
        <div class="row">
            <div class="col-md-12 p-2 d-flex align-items-center " style="background-color:#edf4fc;">
                <div class= p-5>
                    <a href="#"><img class="admin-image" src="../E-commerce/img/admin.jpg" alt=""></a>
                    <p class="text-dark text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="btn btn-outline-dark m-2"><a href="insert_product.php" class="nav-link my-2 mx-1"> Insert Products</a></button>
                    <button class="btn btn-outline-dark m-2"><a href="index.php?view_products" class="nav-link my-2 mx-1"> View Products</a></button>
                    <button class="btn btn-outline-dark m-2"><a href="index.php?insert_category" class="nav-link my-2 mx-1"> Insert Categories</a></button>
                    <button class="btn btn-outline-dark m-2"><a href="" class="nav-link my-2 mx-1"> View Categories</a></button>
                    <button class="btn btn-outline-dark m-2"><a href="index.php?insert_brand" class="nav-link my-2 mx-1"> Insert Brands</a></button>
                    <button class="btn btn-outline-dark m-2"><a href="" class="nav-link my-2 mx-1"> View Brands</a></button>
                    <button class="btn btn-outline-dark m-2"><a href="" class="nav-link my-2 mx-1"> All Orders</a></button>
                    <button class="btn btn-outline-dark m-2"><a href="" class="nav-link my-2 mx-1"> All Payments</a></button>
                    <button class="btn btn-outline-dark m-2"><a href="" class="nav-link my-2 mx-1"> User List</a></button>
                    <button class="btn btn-outline-dark m-2"><a href="" class="nav-link my-2 mx-1"> Logout</a></button>
                </div>
            </div>
        </div>
        <div class="container my-5">
        <?php
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');
        }
        if(isset($_GET['insert_brand'])){
            include('insert_brands.php');
        }
        ?>
        </div>
    </div>
    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
