<?php
require("Shared/connection.php");
include("shared/_nav.php");
// session_start();

if(isset($_POST['submit']))
{	
$prodId = $_POST['prod_id'];
$queryy = "SELECT * FROM `products` WHERE prod_id= '$prodId'";
$run = mysqli_query($conn,$queryy);
$data = mysqli_fetch_assoc($run);
$id = $data['prod_id'];
$name = $data['prod_name'];
$price = $data['prod_price'];
$image = $data['prod_image'];

$cartArray = array(
	 $name=>array(
	'name'=>$name,
	'id'=>$id,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(!isset($_SESSION["shopping_cart"])) 
{
	$_SESSION["shopping_cart"] = $cartArray;
	echo "<script>alert('Product is Added to your Cart!')</script>";
}
// array_keys()
else
{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($name,$array_keys)) 
    {
		foreach($_SESSION["shopping_cart"] as &$value)
        {
            if($value['id'] === $_POST["prod_id"])
            {
                $value['quantity']=$value['quantity']+1;
                echo "<script>alert('Quanity of this Product in your Cart is ".$value['quantity']."')</script>";
                break; // Stop the loop after we've found the product
            }
        }
	}
	else
    {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	echo "<script>alert('Another Product is Added to your Cart!')</script>";
	}
	}
}

?>
      <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Check Our Products</h2>
                        <span>Awesome &amp; Creative Products In Online-Shopping</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->
    
<!-- ***** Products Area Starts ***** -->
<section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our All Products</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <?php
               $getrecord =$_GET['getid'];
               $queryy = "SELECT * FROM products INNER JOIN category On products.prod_catg_id = 
               category.category_id where prod_catg_id = '$getrecord'";
               $run = mysqli_query($conn,$queryy);
               while($data = mysqli_fetch_assoc($run))
               {
               ?>
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                            <form action="" method="POST">
                           <input type="hidden" name="prod_id" value="<?php echo $data['prod_id'] ?>">
                           <?php if (isset($_SESSION['user_id'])) { ?>
                              <button type="submit" name="submit" class="btn btn-dark d-flex m-auto">Add to Cart</button>

                           <?php } else { ?>
                              <button type="button" name="button" class="btn d-flex m-auto"><a
                                    class="btn btn-secondary  d-flex m-auto" href="login.php">Add to Cart</a></button>

                           <?php } ?>
                        </form>
                              
                            </div>
                            <img src="../Admin_Panel/<?php echo $data['prod_image']?>" alt="">
                        </div>
                        <div class="down-content">
                            <h5><?php echo $data['prod_name']?></h5>
                            <span><?php echo $data['prod_desc']?></span>
                            <span class="text-danger ">Rs. <?php echo $data['prod_price']?>/-</span>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                
                <?php } ?>
            </div>
        </div>
    </section> <hr>
    <!-- ***** Products Area Ends ***** -->

      <?php
      include("shared/_footer.php");
      ?>