<?php
require("shared/connection.php");
$deletehonywaalarecord = $_GET['deleteid'];

$queryy = "DELETE FROM `products` WHERE `prod_id` = '$deletehonywaalarecord'";
$run = mysqli_query($conn,$queryy);

if($run)
{
    echo "<script>alert('Your Selected Record Has Been Deleted!')
    window.location.href='Display_Prod.php'</script>";
}
?>