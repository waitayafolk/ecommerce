<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));

// print_r($params->id);exit();
$params = json_decode(file_get_contents('php://input'));
$sql = "
  UPDATE sale_online_temp SET qty = (qty + 1) 
  WHERE id = :id 
";

$stmt = $pdo->prepare($sql);
$stmt->execute(array(
  ':id' => $params->id
//   ':customer_code'=> $params->customer_code
));

echo json_encode(array('message' => 'success'));
?>