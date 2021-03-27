<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 3</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
        <style>
    *{
        font-family: 'Prompt', sans-serif;
    }
    </style>
</head>

<body class="hold-transition sidebar-mini" ng-app="myApp" ng-controller="home" ng-init="startpage()">
<div class="wrapper">

    <?php
      $mymenu=isset($_GET['mymenu'])? $_GET['mymenu']:null;
      include ('left_menu.php');
    ?>


 
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>
</div>

<script type="text/javascript" src="../controller/index.js"></script>
<script type="text/javascript" src="../controller/UserController.js"></script>
<script type="text/javascript" src="../controller/GroupProductController.js"></script>
<script type="text/javascript" src="../controller/ProductController.js"></script>
<script type="text/javascript" src="../controller/OrderController.js"></script>


<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.js"></script>
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../dist/js/pages/dashboard3.js"></script>
</body>
</html>
