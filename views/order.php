<div ng-controller="OrderController" ng-init="startPage()">
    <div class="card shadow mb-4">
        <div div class="card-header py-3">
            <h6 class="m-0 font-weight-bold "></h6>
        </div>
            
        <div class="card-body">
                <div class='table-responsive'>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>รหัส Customer</th>
                                <th>ชื่อผู้สั่ง</th>
                                <th>ที่อยู่</th>
                                <th>เบอร์โทร</th>
                                <th>สถานะ</th>
                                <th style="text-align: center" width="300px">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="order in orders">
                            <td>{{ order.customer_id}}</td>
                            <td>{{ order.name }}</td>
                            <td>{{ order.address }}</td>
                            <td>{{ order.tel }}</td>
                            <td ng-show = " order.status == 'use'" >Producr Order</td>
                            <td style="background-color:#00FF00;" ng-show = " order.status == 'send'" ><stromg> Producr Send </stromg></td>
                            <td align="center">
                                <button class="btn btn-dark" ng-click="send(order)">
                                    <i class="fa fa-car"> 
                                    </i>
                                </button>
                                <button class="btn btn-warning" ng-click="print(order)">
                                    <i class="fa fa-print"> 
                                    </i>
                                </button>
                                <button class="btn btn-primary" ng-click="detail_order(order)">
                                    <i class="fa fa-list"> 
                                    </i>
                                </button>
                                <button class="btn btn-danger" ng-click="delete(order)">
                                    <i class="fa fa-times"> 
                                    </i>
                                </button>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
        <div class="modal fade" id="modalorder_detail" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="card-body">
                    <div class='table-responsive'>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Barcode</th>
                                    <th>สินค้า</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>รวม</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="detail in orders_detail">
                                <td>{{ detail.product_code}}</td>
                                <td>{{ detail.product_name }}</td>
                                <td>{{ detail.product_price }}</td>
                                <td>{{ detail.qty }}</td>
                                <td>{{ detail.product_price * detail.qty }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>      
</div>