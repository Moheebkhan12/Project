<?php
require("shared/connection.php");
$deletehonywaalarecord = $_GET['deleteId'];

$queryy = "DELETE FROM `category` WHERE `category_id` = '$deletehonywaalarecord'";
$run = mysqli_query($conn,$queryy);
if($run)
{
    echo "<script>alert('Your Selected Record Has Been Deleted!')
    window.location.href='Display_Catg.php'</script>";
}
?>