<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));

// print_r($params->qty);exit();
if($params->qty == 1){

    $sql = "DELETE FROM sale_online_temp WHERE id = :id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
    ':id' => $params->id
));
}else{
    
$params = json_decode(file_get_contents('php://input'));
    $sql = "
      UPDATE sale_online_temp SET qty = (qty - 1) 
      WHERE id = :id 
    ";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
      ':id' => $params->id
    ));
}

echo json_encode(array('message' => 'success'));
?>