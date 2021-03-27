<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 3</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
        <style>
    *{
        font-family: 'Prompt', sans-serif;
    }


  .table {
    margin-top: 10px;
  }

  .table tbody tr td {
    border-bottom: #dfdfdf 1px solid;
  }

  .table thead tr th {
    border-bottom: #dfdfdf 3px double;
    font-weight: bold;
  }

  .dropdown-menu {
    background: #434a54;
  }

  .dropdown-menu li a {
    color: #efefef;
  }

  .modal-body {
    background: #ecf0f5;
  }

  .datepicker-days * {
    color: #808080;
  }

  .main-header .sidebar-toggle:before {
    content: none;
  }

  .navbar {
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
  }

  #btn-close-modal {
    width: 100%;
    text-align: center;
    cursor: pointer;
    color: #fff;
  }
    </style>
</head>

<body>
<div class="wrapper">
<div ng-app="myApp" ng-controller="ShopController" ng-init="startPage()">
    <div class="container-fluid" style="background-color: #fff; width: 80%">
      <h2>ร้านค้าออนไลน์ ArtZaDa</h2>
      <h4>โทร. 045-495-447</h4>
      <h4>สั่งสินค้าออนไลน์ Delivery ส่งถึงบ้าน</h4>
      <div>&nbsp;</div>
    </div>
    <nav class="navbar navbar-inverse bg-dark" style="width: 80%; margin: auto">
      <div>
        <ul class="nav navbar-nav">
          <li>
            <a ng-click="confirm()" ><i class="fa fa-shopping-cart"></i> สินค้าในตะกร้า
              <span class="label label-danger">{{ countItem }}</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container" style="background: #fff; margin-top: 20px; margin: auto; width: 80%">
      <div>
        <div class="row">
          <div ng-repeat="item in products" class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
            <div class="">
              <div class="panel-body" style="padding: 0px">
                <p style="padding: 5px; margin-top:0px">
                  <div><img src="image/unnamed.png" width="100%" /></div>
                  <div style="padding: 5px">
                    <div>{{ item.product_name }}</div>
                    <div style="margin-top: 10px; text-align: center">
                      <strong class="h4 text-primary">{{ item.product_price | number }}</strong>
                    </div>
                  </div>
                </p>
                <div class="text-center" style="margin-top: 0px; margin-bottom: 10px">
                  <button class="btn btn-primary btn-flat" ng-click="addToCart(item)">
                    <i class="fa fa-plus"></i>
                    สั่งซื้อ
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="modalForm" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" id="closeModal">&times;</button>
            <h4 class="modal-title"><i class="fa fa-shopping-cart"></i> สินค้าในตะกร้า</h4>
          </div>
          <div class="modal-body" style="background: #fff">
            <h4><i class="fa fa-list"></i> รายการสั่งซื้อ</h4>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="50px" class="text-right">#</th>
                  <th width="120px">barcode</th>
                  <th>รายการ</th>
                  <th width="100px" class="text-right">จำนวน</th>
                  <th width="100px" class="text-right">ราคา</th>
                  <th width="150px"></th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="item in carts">
                  <td class="text-right">{{ $index + 1 }}</td>
                  <td>{{ item.barcode }}</td>
                  <td>{{ item.name }}</td>
                  <td class="text-right">{{ item.qty }}</td>
                  <td class="text-right">{{ item.price | number:0 }}</td>
                  <td class="text-center">
                    <button class="btn btn-primary" ng-click="addQtyFromCart(item)">
                      <i class="fa fa-plus"></i>
                    </button>
                    <button class="btn btn-danger" ng-click="reduceFromCart(item)">
                      <i class="fa fa-minus"></i>
                    </button>
                    <!-- <button class="btn btn-danger" ng-click="removeFromCart(item)">
                      <i class="fa fa-times"></i>
                    </button> -->
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="3"><strong>รวม</strong></td>
                  <td class="text-right">{{ sumQty | number }}</td>
                  <td class="text-right">{{ sumPrice | number }}</td>
                  <td>&nbsp;</td>
                </tr>
              </tfoot>
            </table>
            <div>&nbsp;</div>
            <h4><i class="fa fa-user"></i> ข้อมูลการจัดส่ง</h4>
            <p>
              <div class="form-group">
                <label>ชื่อ</label>
                <input class="form-control" ng-model="data.name" />
              </div>
              <div class="form-group">
                <label>เบอร์โทร</label>
                <input class="form-control" ng-model="data.tel" />
              </div>
              <div class="form-group">
                <label>ที่อยู่</label>
                <input class="form-control" ng-model="data.address" />
              </div>
            </p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary btn-flat" ng-click="confirmSave()">
              ยืนยันการสั่งซื้อ
              <i class="fa fa-arrow-right"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    </div>
</div>
<script type="text/javascript" src="controller/index.js"></script>
<script type="text/javascript" src="controller/shop.js"></script>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>
</body>
</html>
