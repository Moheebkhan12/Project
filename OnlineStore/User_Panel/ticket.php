<?php
require("shared/connection.php");
session_start();
//Removing
if (isset($_POST['remove']))
{
foreach($_SESSION["shopping_cart"] as &$value)
{
          if($value['id'] === $_POST["id"]){
            $key=$value['name'];
            unset($_SESSION["shopping_cart"][$key]);
            echo "<script>alert('Item Removed')</script>";
            if(!isset($_SESSION["shopping_cart"]))
                unset($_SESSION["shopping_cart"]);
            break; // Stop the loop after we've found the product
                    }		
                }
        
}    
//Plus
if (isset($_POST['add_quantity']))
{
    foreach($_SESSION["shopping_cart"] as &$value)
    {
      if($value['id'] === $_POST["id"])
      {
          $value['quantity'] +=1;
          break; // Stop the loop after we've found the product
      }
  }
}
//Minus
if (isset($_POST['sub_quantity'])){
 
    foreach($_SESSION["shopping_cart"] as &$value)
    {
        if($value['quantity']>1){
            if($value['id'] === $_POST["id"])
            {
                $value['quantity'] -=1;
                break; // Stop the loop after we've found the product
            }
        }
        if($value['quantity']==1)
        {
          if($value['id'] === $_POST["id"])
          {
            $key=$value['name'];
            unset($_SESSION["shopping_cart"][$key]);
            echo "<script>alert('Item Removed')</script>";
            if(empty($_SESSION["shopping_cart"]))
            {
                unset($_SESSION["shopping_cart"]);
            break;
        } // Stop the loop after we've found the product
        }
         }		
        }
}   

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    
  </head>
  <style>
:root {
    --size: 1;
    --background: #000;
    --color1: #d25778;
    --color2: #ec585c;
    --color3: #e7d155;
    --color4: #56a8c6;
  }
  
  html {
    color-scheme: dark; /* for the scrollbar */
  }
  
  body {
    background-color: black;
  
    font-family: Arial, Helvetica, sans-serif;
  }
  
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Outfit', sans-serif;
    
  }
  
  .ticket-visual_visual {
    width: 650px;
    height: 1250px;
    margin: 100px auto;
    position: relative;
    transition: all 300ms cubic-bezier(0.03, 0.93, 0.53, 0.99) 0s;
    /* border: 5px solid #fff; */
    /* gradient code below */
    padding: 5px;
    background: linear-gradient(
      to right,
      var(--color1),
      var(--color2),
      var(--color3),
      var(--color4)
    );
    border-radius: 20px;
    
  }
  
  /* The half circles on the sides of the card */
  .ticket-visual_visual::before{
      content: "";
      display: block;
      position: absolute;
      top: 130px;
      left: -30px;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: var(--color1);
      z-index: 2;
  }
  
  .ticket-visual_visual::after{
      content: "";
      display: block;
      position: absolute;
      top: 130px;
      right: -30px;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: var(--color4);
      z-index: 2;
  }
  
  .ticket-visual-wrapper {
    width: 100%;
    height: 100%;
    background: var(--background);
    border-radius: 15px;
    position: relative;
  }
  
  .ticket-visual-wrapper::before{
      content: "";
      display: block;
      position: absolute;
      top: 130px;
      left: -30px;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background: var(--background);
      z-index: 3;
  }
  .ticket-visual-wrapper::after{
      content: "";
      display: block;
      position: absolute;
      top: 130px;
      right: -30px;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background: var(--background);
      z-index: 3;
  }
  
  .ticket-visual_profile {
    padding: calc(39px * var(--size)) calc(155px * var(--size))
      calc(39px * var(--size)) calc(58px * var(--size));
  }
  
  .ticket-profile_profile {
    display: flex;
    flex-direction: row;
  }
  
  .ticket-event {
    margin-top: 25px;
    margin-left: -10px;
  }
  
  .ticket-profile_image {
    width: 82px;
    height: 82px;
    border-radius: 50%;
  }
  
  .ticket-profile_name {
    font-size: calc(32px * var(--size));
    margin: 10px 0 5px 20px;
    font-weight: 700;
  }
  
  .ticket-profile_username {
    margin: 0 0 5px 20px;
    color: #8a8f98;
    display: flex;
    align-items: center;
    gap: 5px;
  }
  
  .ticket-profile_githubIcon img {
    width: 18px;
    height: 18px;
  }
  
  .ticket-visual_ticket-number-wrapper {
    position: absolute;
    right: 35px;
    bottom: 0;
  }
  
  .ticket-visual_ticket-number {
    transform: rotate(90deg) translateY(calc(100px * var(--size)));
    transform-origin: bottom right;
    font-size: calc(40px * var(--size));
    font-weight: 700;
    text-align: center;
    padding-bottom: 35px;
    width: 310px;
    border-bottom: 2px dashed #333;
  }
  
  /* Now let's add the gradient border */
  
  /* Cutting the circles in halves */
  .left, .right{
      position: absolute;
      top: 110px;
      width: 50px;
      height: 100px;
      background: var(--background);
      z-index: 4;
  }
  
  .left {
      left: -50px;
  }
  
  .right {
      right: -50px;
  }
.a{
 text-decoration: none;
 color: white;

}

  

  <?php
if(isset($_SESSION["shopping_cart"]))
{
    $total_price = 0;
?>
  <table class="table  mt-4 fs-5">
  <thead>
    <tr>
    <th>Product Image</th>
    <th>Product Name</th>
    <th>Add Quantity</th>
    <th>Product Quantity</th>
    <th>Product Unit Price</th>
    <th>Total Items Amount</th>
    <th>Remove Item</th>
    </tr>
  </thead>
  <tbody>
                <?php		
foreach($_SESSION["shopping_cart"] as $product)
{ 
?>
                <tr>
                    <td><img src='../Admin_Panel/<?php echo $product["image"];?>' width="150" height="150"/></td>
                    <td class="fs-4" >
                        <?php echo $product["name"];?>
                    </td>
                    <td class="fs-4">
                        <form method="POST">
                            <input type='hidden' name='id' value="<?php echo $product["id"];?>" />
                            <button class="btn btn-dark" type='submit' name="add_quantity">+</button>
                            <button class="btn btn-dark" type='submit' name="sub_quantity">-</button>
                        </form>
                    </td>
                    <td class="fs-4">
                        <?php echo $product["quantity"]; ?>
                    </td>
                    <td class="fs-4">
                        <?php echo "Rs.".$product["price"]."/-"; ?>
                    </td>
                    <td class="fs-4">
                        <?php echo "Rs.".$product["price"]*$product["quantity"]."/-"; ?>
                    </td>
                     <!-- Removing -->
        <td>
         <form method="POST">
            <input type='hidden' name='id' value="<?php echo $product["id"]; ?>"/>
            <button class="btn btn-dark fw-bold fs-5" type='submit' name="remove">Remove Item</button>
        </form>
        </td>
        <!-- Removing -->
                </tr>
                <div class="container m-auto text-center">
                <tr class="mt-5 d-flex m-5">
                    <td class="fs-4">
                       <?php
                       $total_price =$total_price+ ($product["price"]*$product["quantity"]);
                       } //Loop Ended
                       ?>
                        <h5 class = "mt-3 fs-4">Total Amount:<?php echo "Rs.".$total_price."/-"; ?></h5><br>
                        <a href="ticket.php?t=<?php echo $total_price?>" class="btn btn-dark fs-4">Checkout Receipt</a>
                    </td>
                </tr>
                </div>
            </tbody>
        </table>
        <?php
} //If Ended
   else
    {
	echo 
    "<h3 class=' text-center mt-3'>

    Your Cart is Empty!
    
    </h3>"; 
	}
  ?>

</style>
  <body>
    <div class="ticket-visual_visual" id="ticket">
      <div class="left"></div>
      <div class="right"></div>
       <div class="ticket-visual-wrapper">
        <div class="ticket-visual_profile">
          <div class="ticket-profile_profile">
            <img
              src="https://github.com/madflows.png"
              alt="madflows"
              class="ticket-profile_image"/>
            <div class="ticket-profile_text">
              <p class="ticket-profile_name"><?php echo $_SESSION['user_name']?></p><br><br>
          
              <div class="ticket ">
        <h1>Checkout Receipt</h1><br><br>
          <table class="table  mt-4 fs-5">
  <thead>
    <tr>
    <th>Product Image</th>
    <th>Product Name</th>
   
    
    <th>Product Unit Price</th>
  
    </tr>
  </thead>
  <tbody>
                <?php		
foreach($_SESSION["shopping_cart"] as $product)
{ 
?>
                <tr>
                    <td><img src='../Admin_Panel/<?php echo $product["image"];?>' width="150" height="150"/></td>
                    <td class="fs-4" >
                        <?php echo $product["name"];?>
                    </td>
                  
                 
                    <td class="fs-4">
                        <?php echo "Rs.".$product["price"]."/-"; ?>
                    </td>

                <div class="container m-auto text-center">
                <tr class="mt-5 d-flex m-5">
                    <td class="fs-4">
                       <?php
                       $total_price =$total_price+ ($product["price"]*$product["quantity"]);
                       } //Loop Ended
                       ?><br><hr><br>
                        <p class = "mt-3 fs-4">Total Amount:<?php echo "Rs.".$total_price."/-"; ?></p><br>
                       <a class="a" href="checkout.php?t=<?php echo $total_price?>" class="btn btn-dark fs-4">Checkout Receipt</a>
                
                        
                      
                    </td>
                </tr>
                </div>
            </tbody>
        </table>
        
       
        
        <!-- <p>Thank you for your purchase!</p> -->
    </div>


              <!-- Refactored html -->
            </div>
          </div>
          
        
      </div>
    </div>
  

    <script>

const ticketElm = document.getElementById("ticket");
const { x, y, width, height } = ticketElm.getBoundingClientRect();
const centerPoint = {
  x: x + width / 2,
  y: y + height / 2,
};



window.addEventListener("mousemove", (e) => {
    const degreeX = (e.clientY - centerPoint.y) * 0.008;
    const degreeY = (e.clientX - centerPoint.x) * -0.008;

    ticketElm.style.transform = `
        perspective(1000px)
        rotateX(${degreeX}deg)
        rotateY(${degreeY}deg)
    `;
});
    </script>
  </body>
</html>