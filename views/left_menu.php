<?php
session_start(); 
$level = $_SESSION["level"];
$name = $_SESSION["name"];
echo '
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="../index3.html" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="?mymenu=user" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?mymenu=product" class="nav-link">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Product
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?mymenu=product_gruop" class="nav-link">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Product Group
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?mymenu=Order" class="nav-link">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Order Online
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" ng-click="logout()">
              <i class="nav-icon fas fa-sign-out"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
';
?>
  <div class="content-wrapper">
  <?php 
                        if ($mymenu == "user") {
                        include("user.php");
                        }
                        else if ($mymenu == "product") {
                        include("product.php");
                        }
                        else if ($mymenu == "product_gruop") {
                        include("product_gruop.php");
                        }
                        else if ($mymenu == "Order") {
                          include("order.php");
                          }
                        ?>
  </div>