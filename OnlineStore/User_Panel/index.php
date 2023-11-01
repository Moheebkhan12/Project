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
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4> Online-Shopping</h4>
                                <span>Awesome, clean &amp; creative products are here!</span>
                                <div class="main-border-button">
                                    <a href="products.php">Visit Now!</a>
                                </div>
                            </div>
                            <img src="assets/images/left-banner-image.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                       
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4 >Perfumes</h4>
                                                <p>
Perfumes are aromatic fragrances that enhance personal scent, evoke emotions, and leave a lasting impression, .</p>
                                                <div class="main-border-button">
                                                    <a href="products.php">Visit More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/banner1.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                       
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Watche's</h4>
                                                <p>
Watches are not only practical timekeeping devices but also stylish accessories.</p>
                                                <div class="main-border-button">
                                                    <a href="products.php">Visit More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/banner222.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                     
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Teddy Bear's</h4>
                                                <p>Teddy bears are timeless and huggable stuffed animals that provide comfort and companionship to people of all ages.</p>
                                                <div class="main-border-button">
                                                <a href="products.php">Visit More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/banner3.jpeg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Handbags</h4>
                                                <p>
Collections of handbags offer a curated selection of designs, materials, and styles, catering to various tastes and needs.</p>
                                                <div class="main-border-button">
                                                    <a href="products.php">Visit More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/banner40.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

 <!-- our watches products  -->

    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class=" text-start section-heading">
                        <h2>Our Latest Watches</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container "  >
            <div class="row" >
            <?php
               $queryy = "SELECT * FROM products INNER JOIN category On products.prod_catg_id = 
               category.category_id where prod_catg_id = '5'";
               $run = mysqli_query($conn,$queryy);
               while($data = mysqli_fetch_assoc($run))
               {
               ?>
                <div class="col-lg-4"  >
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
     <!-- our watches products  -->

     <!-- our perfume products  -->

    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class=" text-start section-heading">
                        <h2>Our Special Products</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container "  >
            <div class="row" >
            <?php
               $queryy = "SELECT * FROM products INNER JOIN category On products.prod_catg_id = 
               category.category_id where prod_catg_id = '1'";
               $run = mysqli_query($conn,$queryy);
               while($data = mysqli_fetch_assoc($run))
               {
               ?>
                <div class="col-lg-4"  >
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
     <!-- our perfume products  -->

    <!-- ***** Explore Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>Explore Our Products</h2>
                        <span>Perfumes: Perfumes are fragrances created from a mixture of essential oils, aroma compounds, and solvents. They are designed to provide a pleasant and long-lasting scent when applied to the skin. Perfumes come in a variety of scents, such as floral, citrus, oriental, and woody, to suit different preferences. <br>

Watches: Watches are timekeeping devices that can be worn as accessories on the wrist. They come in various styles, including analog and digital, and can serve functional and fashion purposes. High-quality watches often feature precise movements, durable materials, and stylish designs. <br>

Teddy Bears: Teddy bears are soft, stuffed plush toys that resemble bears. They are popular as toys and comfort objects, especially among children. The name "teddy bear" originates from President Theodore "Teddy" Roosevelt's association with a hunting trip and a compassionate gesture involving a bear.  <br>

Handbags: Handbags are accessories primarily used to carry personal items, such as wallets, keys, makeup, and more. They come in various sizes, styles, and materials, offering both practicality and fashion. Handbags can range from small clutches to large totes.  <br>

Wallets: Wallets are small, portable accessories used to store money, credit cards, identification, and other small personal items. They come in various designs and materials, including leather, fabric, and more, catering to individual preferences and needs.   <br>

Beauty Products: Beauty products encompass a wide range of items used for personal grooming and cosmetic purposes. This category includes skincare products, makeup, hair care products, fragrances, and more, all aimed at enhancing or maintaining one's appearance and self-confidence.  <br></span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p>
Online shopping offers convenience and a wide variety of choices right at your fingertips.</p>
</div>
                        <div class="main-border-button">
                            <a href="products.php">Visit More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="leather">
                                    <h4>Handbags</h4>
                                    <span>Latest Collection</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="first-image">
                                    <img src="assets/images/explore-image-01.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="second-image">
                                    <img src="assets/images/explore-image-02.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="types">
                                    <h4>Different Types</h4>
                                    <span>Over 304 Products</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Explore Area Ends ***** -->

    <!-- ***** Social Area Starts ***** -->
    <section class="section" id="social">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Social Media</h2>
                        <span>Details to details is what makes Online-shopping different from the other Website.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row images">
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="https://www.instagram.com/" target="_blank">
                                <h6>Perfumes</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/socail4.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                        <a href="https://www.instagram.com/" target="_blank">
                                <h6>Watches</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/social3.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                        <a href="https://www.instagram.com/" target="_blank">
                                <h6>Teddy-Bear</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/social1.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                             <a href="https://www.instagram.com/" target="_blank">
                                <h6>Beauty-Product</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/social5.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                             <a href="https://www.instagram.com/" target="_blank">
                                <h6>Wallets</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/social2.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                             <a href="https://www.instagram.com/" target="_blank">
                                <h6>Handbags</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-06.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Social Area Ends ***** -->

     <!-- ***** Subscribe Area Starts ***** -->
     <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>By Subscribing To Our Newsletter You Can Get 30% Off</h2>
                        <span>Details  is what makes online-shopping different from the others.</span>
                    </div>
                    <form id="subscribe" action="" method="get">
                        <div class="row">
                          <div class="col-lg-5">
                            <fieldset>
                              <input name="name" type="text" id="name" placeholder="Your Name" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-5">
                            <fieldset>
                              <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-2">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
                            </fieldset>
                          </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                <li>Address:<br><span>Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 </span></li>
                                <li>Lets Talk:<br><span>+1 800 1236879</span></li>
                                <li>Sale Support:<br><span>Onlineshoppingcart@gmail.com</span></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li>Open Hours:<br><span>Sunday-Friday - 11:00 AM - 23:00 PM</span></li>
                                <li>Social Media:<br><span><a href="https://www.facebook.com/" target="_blank" >Facebook</a>, <a href="https://www.instagram.com/" target="_blank">Instagram</a>, <a href="https://www.Behance.com/" target="_blank">Behance</a>, <a href="https://www.Linkedin.com/" target="_blank">Linkedin</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Subscribe Area Ends ***** -->
    <?php
include("shared/_footer.php");
?>