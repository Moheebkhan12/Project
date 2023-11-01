<?php
require("shared/connection.php");
include("shared/_navbar.php");
include("shared/_sidebar.php");

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

  $queeryy = "INSERT INTO `products`(`prod_name`, `prod_desc`, `prod_image`, `prod_price`, `prod_catg_id`) 
  VALUES ('$p_name ','$p_desc','$folder','$price','$pcatg')";
  $result = mysqli_query($conn,$queeryy);
  echo"<script>alert('Your Product Has Been Inserted!');</script>";
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