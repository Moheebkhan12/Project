<?php
require("shared/connection.php");
include("shared/_navbar.php");
include("shared/_sidebar.php");

$updatehonywaaliId = $_GET['updateId'];
$selectt = "SELECT * FROM `products` WHERE `prod_id` = '$updatehonywaaliId'";
$result = mysqli_query($conn, $selectt);
$record = mysqli_fetch_assoc($result);

if(isset($_POST['submitbtn']))
{
  $p_name = $_POST['pname'];
  $p_desc = $_POST['dname'];
  $imgname = $_FILES['image']['name'];
  $imgpath = $_FILES['image']['tmp_name'];
  $folder = "assets/images/".$imgname;
  move_uploaded_file($imgpath,$folder);
  $price = $_POST['price'];
  $pcatg = $_POST['prod_select'];

if(is_uploaded_file($_FILES['image']['tmp_name']))
{
if($filetype=="image/jpeg" || $filetype=="image/jpg" || $filetype=="image/png")
{
  if($filesize<=1000000)  
  {
   $path=$folder.$file;
   $queryy ="UPDATE `products` SET `prod_name`='$p_name',`prod_desc`='$p_desc', `prod_price`='$price',
    `prod_image`='$folder' WHERE `prod_id` = '$updatehonywaaliId'";
   move_uploaded_file($filetemp,$path);
   $run=mysqli_query($conn,$queryy);
   if($run)
   {
       echo "<script>alert('Updated');</script>";
   }
   else
   {
       echo mysqli_error($conn);
   }
  }
  else 
  {
      echo "Size Error";
  }
}
else 
{
    echo "Filetype Not Correct";
}
}
else
{
   $queryy = "UPDATE `products` SET `prod_name`='$p_name',`prod_desc`='$p_desc', `prod_price`='$price',
   `prod_image`='$folder' WHERE `prod_id` = '$updatehonywaaliId'";
   $run=mysqli_query($conn,$queryy);
   if($run)
   {
       echo "<script>alert('Your Product Has Been Updated');</script>";
   }
   else
   {
       echo mysqli_error($conn);
   }
}
}
?>
      <!-- partial -->
      <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Product form </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Product form</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        
                        <input type="text" class="form-control" id="exampleInputUsername1" name="pname" placeholder="Enter Product Name..." Required>
                      </div>
                      <div class="form-group">
                        
                        <input type="text" class="form-control" id="exampleInputUsername1" name="dname" placeholder="Enter Product Desc..." Required>
                      </div>
                      <div class="form-group">
                        
                        <input type="file" name="image" class="form-control" id="exampleInputUsername1" Required>
                      </div>
                      <div class="form-group">
                     
                        <input type="text" name="price" class="form-control" id="exampleInputUsername1" placeholder="Enter Product Price..." Required>
                      </div>
                      <div class="form-group">
                      <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="prod_select" Required>
                        <?php
                        $queryy = "SELECT * FROM `category`";
                        $run = mysqli_query($conn,$queryy);
                        while($data = mysqli_fetch_assoc($run))
                        {
                        ?>
                        <option value="<?php echo $data['category_id']?>"><?php echo $data['category_name']?></option>
                        <?php } ?>
                      </select>
                    </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" Required> Remember me </label>
                      </div>
                      <button name="submitbtn" type="submit" class="btn btn-gradient-primary me-2" style="background-image: linear-gradient(-90deg, #717fe0, #9da5e3);">Submit</button>
                      
                    </form>
                  </div>
                </div>
              </div>
              
          <?php
include("shared/_footer.php");
?>