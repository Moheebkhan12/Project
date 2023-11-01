<?php
require("shared/connection.php");
include("shared/_navbar.php");
include("shared/_sidebar.php");

$updatehonywaaliId = $_GET['updateID'];
$selectt = "SELECT * FROM `category` WHERE `category_id` = '$updatehonywaaliId'";
$result = mysqli_query($conn, $selectt);
$record = mysqli_fetch_assoc($result);

if(isset($_POST['subbtn']))
{
  $catg_name = $_POST['cname'];

  $queryy = "INSERT INTO `category`(`category_name`) VALUES ('$catg_name')";
  $run = mysqli_query($conn,$queryy);
}



if($filesize<=1000000)  
  {
   $queryy ="UPDATE `category` SET `category_name`='$catg_name' WHERE `category_id` = '$updatehonywaaliId'";
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
   $queryy = "UPDATE `category` SET `category_name`='$catg_name' WHERE `category_id` = '$updatehonywaaliId'";
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

?>
     <!-- partial -->
     <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Category form </h3>
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
                    <h4 class="card-title">Category form</h4>
                    <form class="forms-sample " method="POST">
                      <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputUsername1" name="cname" placeholder="Enter Category Name..." Required>
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" Required> Remember me </label>
                      </div>
                      <button type="submit" name="subbtn" class="btn btn-gradient-primary me-2" style="background-image: linear-gradient(-90deg, #717fe0, #9da5e3);">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
              <?php
include("shared/_footer.php");
?>