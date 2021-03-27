<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
    // print_r($params);exit();
    
    $sql = "
    UPDATE sale_online set status = 'delete' WHERE id = :id";
    $order = array(
        ':id' => $params->id
    );
    $stmt = $pdo->prepare($sql);
    $stmt->execute($order);
            echo json_encode(array('message' => 'success'));
?>