<?php
require("shared/connection.php");
session_start();

if(isset($_SESSION['user_name']))
{
    header("location:index.php");
}

if(isset($_POST['login']))
{
    $email = $_POST['mail'];
    $password = $_POST['pass'];

    $queryy = "SELECT * FROM `users` WHERE  `user_email`= '$email' AND `user_password` = '$password'";
    $run = mysqli_query($conn,$queryy);
    $row = mysqli_fetch_assoc($run);
    if(mysqli_num_rows($run)>0)
    {
         if($row['user_role_id'] == 1)
         {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_email'] = $row['user_email'];
            $_SESSION['user_password'] = $row['user_password'];
            header("location:../Admin_Panel/index.php");
         }
         else
         {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_email'] = $row['user_email'];
            $_SESSION['user_password'] = $row['user_password'];
            header("location:index.php");
         }
    }
    else
    {
       echo "<h2 class='text-center text-danger'>Login Denied</h2>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title>Online-shopping</title>
	  <link rel="ICON" href="assets/images/logo.png">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
  
 <!-- ***** Main Banner Area Start ***** -->
 <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Login</h2>
                        <span>Awesome &amp; The best website for gift shopping</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** --> 

<!-- form start   -->

<div class="subscribe mb-5">
  <div class="container  w-50 m-auto text-center " style="box-shadow: 2px 1px 3px 1px; border: 2px solid; border-radius: 25px;" >
    <div class="section-heading">
      <h2 class=" fw-bold">Login Form</h2>
      <span>Details is what makes online-shopping different from the others.</span>
    </div>

    <form action="" method="POST">

      <div class=" w-50 m-auto">
        <input name="mail" type="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
      </div> <br>
    
      <div class="w-50 m-auto">
        <input name="pass" type="password" id="name" placeholder="Your Password" required="">
      </div><br>
    
      <div class="main-border-button">
        
           <button type="submit" style="box-shadow: 0px 0px 3px 0px black"  class="main-dark-button m-auto" name="login"><i class="fa fa-paper-plane"></i></button>
      </div> <br>
  
    </form>
  </div>
  <!-- form end    -->
