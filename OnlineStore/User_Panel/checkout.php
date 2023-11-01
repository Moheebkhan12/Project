<?php
session_start();
require("shared/connection.php");
$id = $_SESSION['user_id'];

$price=$_GET['t'];
$currentDate = date('Y-m-d');
$q1 = "INSERT INTO `orders`(`Order_User_Id`,`Order_Price`,`Order_Date`) VALUES ('$id','$price','$currentDate')";
$res1 = mysqli_query($conn,$q1);
$or=mysqli_insert_id($conn);
    foreach($_SESSION["shopping_cart"] as $value)
    {
  $quan=$value['quantity'];
  $idd=$value['id'];
  $q="INSERT INTO `items`(`Item_Order_Id`, `Item_Prod_Id`, `Quantity`)
  VALUES ('$or','$idd','$quan')";
  $res=mysqli_query($conn,$q);
    }
  session_destroy();
   echo "<script>alert('Your order has been Placed');
    window.location.href='single-product.php'</script>";
?>
