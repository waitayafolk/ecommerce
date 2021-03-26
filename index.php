<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 3</title>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
  <style>
    *{
        font-family: 'Prompt', sans-serif;
    }
  </style>
</head>
<!-- class="bg-gradient-primary" -->
<body class="bg-gradient-dark " ng-app="myApp" ng-controller="Clt_login" ng-init="startPage()">
<div class="bg-gray active text-white" style="padding: 10px; font-size:20px">
                <i class="fa fa-clock"></i> ระบบร้านค้าออนไลน์-ส่ง 1.0.0.1
            </div>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:80vh">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="text-dark card-body"><h4 style="text-align: center;">ระบบร้านค้าออนไลน์ - Ecommerce</h4>
                        <form autocomplete="off" ng-submit = "login()">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" ng-model="user.username" placeholder="User">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" ng-model="user.password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary" >login</button>
                            </form>    
                        </form>
                        <p class="message" style="text-align: center;">version 1.0.0.1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

<script type="text/javascript" src="controller/index.js"></script>
<script type="text/javascript" src="controller/login.js"></script>
   <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>

</body>

</html>