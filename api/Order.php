<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
    $sql =" SELECT * FROM sale_online WHERE status != 'delete' ORDER BY id DESC ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $order = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($order);exit();
        echo json_encode(array('order' => $order));
?>