<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));

    $sql =" SELECT sale_online_detail.*, 
                    tb_product.product_code,
                    tb_product.product_name,
                    tb_product.product_price
    FROM sale_online_detail 
    LEFT JOIN tb_product ON sale_online_detail.product_id =  tb_product.id
    WHERE sale_online_detail.sale_online_id = :sale_online_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':sale_online_id', $params->id);
    $stmt->execute();

    $order_detail = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($order_detail);exit();
        echo json_encode(array('order_detail' => $order_detail));
?>