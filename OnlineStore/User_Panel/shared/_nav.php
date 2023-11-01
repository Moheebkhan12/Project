<?php
require("shared/connection.php");
session_start();


if(isset($_SESSION["shopping_cart"])) 
{
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
}
else
{
    $cart_count= "";
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container m-auto text-center">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <img src="assets/images/logo.png" height="70px" width="100px">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php" >Home</a></li>

                         

                            <li class="submenu">
								<a href="#" data-toggle="dropdown" role="button"
									aria-haspopup="true" aria-expanded="true"> Category
										</a>
								<ul class="dropdown-menu">
                                <?php
                           $queryy = "SELECT * FROM `category`";
                           $run = mysqli_query($conn,$queryy);
                           while($data = mysqli_fetch_assoc($run))
                           {
                              ?>
                              <li><a href="getprod.php?getid=<?php echo $data['category_id']?>"><?php echo $data['category_name']?></a></li>
                              <?php } ?>
								</ul>
							</li>
                           
                            <li><a href="products.php">Products</a></li>
                           
                            <li><a href="contact.php">Contact Us</a></li>

                             <li><a href="about.php">About Us</a></li>
                                
                             
                            <?php
                        if(!isset($_SESSION['user_name']))
                        {
                        ?>
                        <li class="nav-item">
                        <a class="" href="login.php">login</a>
                        </li>
                        <li class="nav-item">
                        <a class="" href="register.php">Register</a>
                        </li>
                       <?php } else {  ?>
                        <li class="nav-item">
                        <a class="" href="#"><?php echo $_SESSION['user_name']?></a>
                     </li>
                     <li class="nav-item">
                     <a class="" href="logout.php">logout</a>
                     </li>
                       <?php } ?>
                       <li class="nav-item">
                <a class="nav-link" href="single-product.php"><img src="assets/images/cart-icon.png" class="w-75 mb-4"><span><?php echo $cart_count;?></span></a>
                </li>

                               <li class="scroll-to-section"></li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a><a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    