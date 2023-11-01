<div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="assets/images/Admin/admin.png" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2 mt-3">Hello, Admin</span>
                </div>
                <i class="mdi mdi-bookmark-check nav-profile-badge" style="color: #2dc460;"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.html">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon" style="color: #8995e9;"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title" style="color: #706969;">Layout Pages</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon" style="color: #8995e9;"></i>
              </a>
              <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="Category.php" style="color: #717fe0;"> Category </a></li>
                  <li class="nav-item"> <a class="nav-link" href="Display_Catg.php" style="color: #717fe0;"> Display Cateory </a></li>
                  <li class="nav-item"> <a class="nav-link" href="Product.php" style="color: #717fe0;"> Product </a></li>
                  <li class="nav-item"> <a class="nav-link" href="Display_Prod.php" style="color: #717fe0;"> Display Product </a></li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>