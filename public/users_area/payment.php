<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Montserrat font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('../assets/lbg.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed; 
            background-blur: 10px; 
            font-family: 'Montserrat', sans-serif;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
        }
        .payment-options {
            padding: 50px;
            background-color: rgba(255, 255, 255, 0.8); 
            border-radius: 10px;
        }
        .payment-option {
            text-align: center; 
            margin-bottom: 30px;
            
        }
        .payment-option img {
            width: 200px; 
            height: 200px; 
            border-radius: 50%; 
            border: 4px solid #fff; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .payment-option img:hover {
            transform: scale(1.1); 
        }
        .payment-option h3 {
            margin-top: 20px; 
            font-size: 1.2rem; 
            color: #2e3d36; 
        }
    </style>
</head>
<body>
    <!-- php code to fetch user id -->
    <?php
    $user_ip= getIPAddress();
    $get_user= "SELECT * FROM `user_table` WHERE user_ip = '$user_ip'";
    $result= mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id= $run_query['user_id'];
    ?>
    <div class="container payment-options ">
        <h2 class="text-center" style="font-weight:bold; color:#6b775d">Payment Options</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="payment-option">
                    <a href="https://www.paypal.com" target="_blank" style="text-decoration:none;color:#6b775d">
                        <img src="../assets/upi.jpg" alt="UPI payment">
                        <h3>UPI Payment</h3>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="payment-option">
                    <a href="order.php?user_id=<?php echo $user_id ?>" style="text-decoration:none;color:#6b775d">
                        <img src="../assets/offline.jpg" alt="Offline Payment" >
                        <h3>Offline Payment</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
