<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));


$sql =" SELECT sale_online_temp.* ,
                tb_product.product_code AS barcode ,
                tb_product.product_name AS name ,
                tb_product.product_price AS price 
FROM sale_online_temp 
LEFT JOIN tb_product ON sale_online_temp.product_id = tb_product.id
WHERE sale_online_temp.customer_id = :customer_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':customer_id', $params->customerCode);
$stmt->execute();
$sale_temp = $stmt->fetchAll();
echo json_encode(array('sale_temp' => $sale_temp));


// print_r($sale_temp);exit(); 
// <tr ng-repeat="item in carts">
// <td class="text-right">{{ $index + 1 }}</td>
// <td>{{ item.barcode }}</td>
// <td>{{ item.name }}</td>
// <td class="text-right">{{ item.qty }}</td>
// <td class="text-right">{{ item.price | number:0 }}</td>
// <td class="text-center">       
?>