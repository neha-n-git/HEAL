<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="m-2">
    <?php
    $username=$_SESSION['username'];
    $get_user="SELECT * FROM `user_table` where username='$username'";
    $result= mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_array($result);
    $user_id=$row_fetch['user_id'];
    ?>

    <h3 class="text-center"> All My Orders </h3>
    <table class="table table-bordered mt-5 text-center">
    <tr>
        <th>Sl.No.</th>
        <th>Amount Due</th>
        <th>Total Products</th>
        <th>Invoice number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
    </tr>
        <?php
        if(isset($_SESSION['username'])){
         $get_order_details="SELECT * FROM  `user_orders` where user_id= $user_id";
         $result_order= mysqli_query($con,$get_order_details);
         $number=1;
         while($row_orders=mysqli_fetch_assoc($result_order)){
            $order_id=$row_orders['order_id'];
            $amount_due=$row_orders['amount_due'];
            $invoice_number= $row_orders['invoice_number'];
            $total_products= $row_orders['total_products'];
            $order_date= $row_orders['order_date'];
            $order_status= $row_orders['order_status'];
            if ($order_status=='pending'){
                $order_status= "Incomplete";
            }else{
                $order_status= "Complete";
            }

            echo "<tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td>$order_status</td>
            </tr>";
            $number++;
         }}
        ?>
    </table>

</body>
</html>
