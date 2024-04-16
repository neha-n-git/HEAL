<?php
include('../includes/connect.php');

//getting products
function getproducts(){
    global $con;
    //condition to check isset or not
    if(!isset($_GET['category'])){
         if(!isset($_GET['brand'])){
        $select_query="SELECT * FROM products order by rand()";
        $result=mysqli_query($con,$select_query);
            while ($row = mysqli_fetch_assoc($result)) { 
            $product_id= $row['product_id'];
            $product_title= $row['product_title'];
            $product_description= $row['product_description'];
            $category_id= $row['category_id'];
            $brand_id= $row['brand_id'];
            $product_image1= $row['product_image1'];
            $product_price= $row['product_price'];
            echo "<div class='col-md-4 mb-5'>
            <div class='card' >
            <img src='../admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: Rs.$product_price</p>
                <a href='shop.php?add_to_cart=$product_id' class='btn btn-dark'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-outline-dark'>View More</a>
            </div>
            </div>
        </div>"; 
    }}}}

//displaying brands in sidenav
function get_unique_category(){
    global $con;
    //condition to check isset or not
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
        $select_query="SELECT * FROM products where category_id=$category_id";
        $result=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result);
        if($num_of_rows==0){
                echo "<h2 class='text-center text-danger'>No Stock for this Category</h2>";
        }
            while ($row = mysqli_fetch_assoc($result)) { 
            $product_id= $row['product_id'];
            $product_title= $row['product_title'];
            $product_description= $row['product_description'];
            $category_id= $row['category_id'];
            $brand_id= $row['brand_id'];
            $product_image1= $row['product_image1'];
            $product_price= $row['product_price'];
            echo "<div class='col-md-4 mb-5'>
            <div class='card' >
            <img src='../admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: Rs.$product_price</p>
                <a href='shop.php?add_to_cart=$product_id' class='btn btn-dark'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-outline-dark'>View More</a>
            </div>
            </div>
        </div>"; 
    }}}
    function get_unique_brand(){
        global $con;
        //condition to check isset or not
        if(isset($_GET['brand'])){
            $brand_id=$_GET['brand'];
            $select_query="SELECT * FROM products where brand_id=$brand_id";
            $result=mysqli_query($con,$select_query);
            $num_of_rows=mysqli_num_rows($result);
            if($num_of_rows==0){
                echo "<h2 class='text-center text-danger'>No Stock for this Brand</h2>";
        }
                while ($row = mysqli_fetch_assoc($result)) { 
                $product_id= $row['product_id'];
                $product_title= $row['product_title'];
                $product_description= $row['product_description'];
                $category_id= $row['category_id'];
                $brand_id= $row['brand_id'];
                $product_image1= $row['product_image1'];
                $product_price= $row['product_price'];
                echo "<div class='col-md-4 mb-5'>
                <div class='card' >
                <img src='../admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: Rs.$product_price</p>
                    <a href='shop.php?add_to_cart=$product_id' class='btn btn-dark'>Add to Cart</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-outline-dark'>View More</a>
                </div>
                </div>
            </div>"; 
        }}}
    
function  displaybrands(){
    global $con;
    $select_brands = "SELECT * FROM brands";
    $result_brands = mysqli_query($con, $select_brands);
    while($row_data = mysqli_fetch_assoc($result_brands)){
        $brand_title=$row_data['brand_title'];
        $brand_id=$row_data['brand_id'];
        echo "<li class='nav-item'>
        <a href='shop.php?brand=$brand_id' class='nav-link'>$brand_title</a>
    </li>";
    }
}
//displaying categories in side nav bar
function  displaycategories(){
    global $con;
    $select_categories = "SELECT * FROM categories";
    $result_categories = mysqli_query($con, $select_categories);
    while($row_data = mysqli_fetch_assoc($result_categories)){
        $category_title=$row_data['category_title'];
        $category_id=$row_data['category_id'];
        echo "<li class='nav-item'>
        <a href='shop.php?category=$category_id' class='nav-link'>$category_title</a>
    </li>";
    }
}

//searching products
function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value= $_GET['search_data'];
        $search_query="SELECT * FROM products where product_keyword like  '%$search_data_value%' ";
        $result=mysqli_query($con,$search_query);
        $num_of_rows=mysqli_num_rows($result);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger'>No  Results Found!</h2>";
    }    
        while ($row = mysqli_fetch_assoc($result)) { 
            $product_id= $row['product_id'];
            $product_title= $row['product_title'];
            $product_description= $row['product_description'];
            $category_id= $row['category_id'];
            $brand_id= $row['brand_id'];
            $product_image1= $row['product_image1'];
            $product_price= $row['product_price'];
            echo "<div class='col-md-4 mb-5'>
            <div class='card' >
            <img src='../admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: Rs.$product_price</p>
                <a href='shop.php?add_to_cart=$product_id' class='btn btn-dark'>Add to Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-outline-dark'>View More</a>
            </div>
            </div>
        </div>"; 
    }}}

//view details function
function view_details(){
    global $con;
    //condition to check isset or not
    if (isset($_GET['product_id' ])) {
    if(!isset($_GET['category'])){
         if(!isset($_GET['brand'])){
            $product_id=$_GET['product_id'];
        $select_query="SELECT * FROM products where product_id=$product_id";
        $result=mysqli_query($con,$select_query);
            while ($row = mysqli_fetch_assoc($result)) { 
            $product_id= $row['product_id'];
            $product_title= $row['product_title'];
            $product_description= $row['product_description'];
            $category_id= $row['category_id'];
            $brand_id= $row['brand_id'];
            $product_image1= $row['product_image1'];
            $product_image2= $row['product_image2'];
            $product_image3= $row['product_image3'];     
            $product_price= $row['product_price'];
            echo "<div class='col-md-4 mb-5'>
            <div class='card' >
            <img src='../admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: Rs.$product_price</p>
                <a href='shop.php?add_to_cart=$product_id' class='btn btn-dark'>Add to Cart</a>
                <a href='./shop.php' class='btn btn-outline-dark'>Go to Shop</a>
            </div>
            </div>
        </div>
        
        <div class='col-md-8'>
                
                <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center mb-5'>
                            Related Products
                        </h4>
                    </div>
                    <div class='col-md-6'>
                    <div class='card' >
                        <img src='../admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>Related to $product_title</h5></div></div>
                    </div>
                    <div class='col-md-6'>
                    <div class='card' >
                        <img src='../admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>Related to $product_title</h5></div></div>
                    </div>
                </div>
            </div>"; 
    }}}}
}
//get IP address
function getIPAddress() {  
    // Check if the IP is from a shared internet connection  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    // Check if the IP is from a proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    // Otherwise, assume the IP is from the remote address  
    else {  
        $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
}  
//$ip = getIPAddress();  echo 'User Real IP Address - '.$ip;  

//cart function
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        $select_query="SELECT * FROM cart_details where ip_address='$ip' and product_id=$get_product_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert('This item is already present inside the cart')</script>";
            echo "<script>window.open('shop.php','_self')</script>";
        }else{
            $insert_query= "INSERT INTO `cart_details`(`product_id`, `ip_address`,`quantity`) VALUES ($get_product_id,'$ip',1)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('Item has been successfully added to cart')</script>";
            echo "<script>window.open('shop.php','_self')</script>";
        }    
    }
}

//fucntion to get cart item numbers
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress();
        $select_query="SELECT * FROM cart_details where ip_address='$ip'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        
        }else{
            global $con;
            $ip = getIPAddress();
            $select_query="SELECT * FROM cart_details where ip_address='$ip'";
            $result_query=mysqli_query($con,$select_query);
            $count_cart_items=mysqli_num_rows($result_query);
        }    
        echo  $count_cart_items;
    }

// total cart price function
function total_cart_price(){
    global $con;
    $ip = getIPAddress();
    $total=0;
    $cart_query= "SELECT * FROM cart_details where ip_address='$ip'";
    $result_query=mysqli_query($con,$cart_query);
    while($row= mysqli_fetch_array($result_query)){
        $product_id= $row["product_id"];
        $select_products= "SELECT * from products WHERE product_id= '$product_id' ";
        $result_products=mysqli_query($con, $select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total= $total+$product_values;
        }}
    echo $total;
}

function user_handle(){
    global $con;

    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $select_query = "SELECT * FROM `user_table` WHERE username = '$username'";
        $result = mysqli_query($con, $select_query);

        if($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); 
            $user_username = $row['username'];
            $user_image = $row['user_image'];
            echo "<li class='nav-item mx-3'>
            <a class='nav-link' href='..\users_area\profile.php'>
                <img style='max-width: 75px; border-radius: 100%;' src='../users_area/user_images/$user_image' alt='Profile Picture' width='25' height='25'>
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='..\users_area\profile.php'>$user_username</a>
            
        </li>";
        }
    }
}

//get user order details
function get_user_order_details(){
    global $con;
    $username = $_SESSION['username'];
    $get_details="SELECT * FROM `user_table` where username='$username'";
    $result_query = mysqli_query($con, $get_details);
    while($row_details=mysqli_fetch_array($result_query)){
        $user_id=$row_details['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="SELECT * FROM `user_orders` where user_id=$user_id and order_status='pending'";
                    $result_orders=mysqli_query($con, $get_orders);
                    $row_count=mysqli_num_rows($result_orders);
                    if($row_count>0){
                        echo "<h3 class='text-center my-5'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
                        <p class='text-center'><a href='profile.php?my_orders' style='text-decoration:none; color:green;'>Order Details </a></p>";
                    }else{
                        echo "<h3 class='text-center my-5'>You have no pending orders</h3>
                        <p class='text-center'><a href='..\E-commerce\shop.php' style='text-decoration:none; color:green;'>Explore Shop </a></p>";
                    }
                }
            }
        }
    }}

?>

