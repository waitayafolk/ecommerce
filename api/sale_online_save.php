<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
// print_r($params);exit(); 

$sql =" SELECT * FROM sale_online_temp WHERE customer_id = :customer_id AND product_id = :product_id ";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':customer_id', $params->customerCode);
$stmt->bindParam(':product_id', $params->id);
$stmt->execute();
$sale_temp = $stmt->fetchAll();
// print_r($sale_temp);exit(); 

if(empty($sale_temp)){
$sql = "
    INSERT INTO sale_online_temp(product_id, customer_id, qty , product_price) 
    VALUES(:product_id, :customer_id, :qty , :product_price)
    ";
    $product_online = array(
        ':product_id' => $params->id,
        ':customer_id' => $params->customerCode,
        ':qty' => 1,
        ':product_price' => $params->product_price
    );
    $stmt = $pdo->prepare($sql);
    $stmt->execute($product_online);  
    echo json_encode(array('message' => 'success'));  
}else{
    $sql = "
    UPDATE sale_online_temp set qty = :qty WHERE id = :id";
    $product = array(
        ':id' => $sale_temp[0]['id'],
        ':qty' => $sale_temp[0]['qty'] + 1 ,
    );
    $stmt = $pdo->prepare($sql);
    $stmt->execute($product);
    echo json_encode(array('message' => 'success'));  
}

            
?>