<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
// print_r($params->id);exit();

$sql =" UPDATE tb_product SET status = 'delete' WHERE id = :id ";
$id = array(':id' => $params->id);
$stmt = $pdo->prepare($sql);
$stmt -> execute($id);
echo json_encode(array('message' => 'success'));

?>