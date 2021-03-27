<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));

// print_r($params->customer->name);exit(); 

$sql = "
  INSERT INTO sale_online( customer_id, name ,address , tel , status) 
  VALUES( :customer_id, :name , :address , :tel , 'use')
";

$stmt = $pdo->prepare($sql);
$stmt->execute(array(
  ':customer_id' => $params->customer_code,
  ':name' => $params->customer->name,
  ':address' => $params->customer->address,
  ':tel' => $params->customer->tel,
));

$id = $pdo->lastInsertId();

$temp = $params->carts;

// print_r($temp);exit();

foreach ($temp as $r) {

  $sql = "
    INSERT INTO sale_online_detail(product_id ,qty ,product_price, sale_online_id ,customer_id) 
    VALUES(:product_id, :qty, :product_price, :sale_online_id, :customer_id)
  ";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':product_id' => $r->product_id,
    ':qty' => $r->qty,
    ':product_price' => $r->product_price,
    ':sale_online_id' => $id ,
    ':customer_id' => $params->customer_code,
  ));

  $sql = "DELETE FROM sale_online_temp WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(
    ':id' => $r->id,
  ));
}

echo json_encode(array('message' => 'success' , 'id' => $id ));

            
?>