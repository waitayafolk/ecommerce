<?php
include('condb.php');
    $sql =" SELECT * FROM tb_admin WHERE status = 'use' ORDER BY id DESC ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($user);exit();
    echo json_encode(array('user' => $user));
?>