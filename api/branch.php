<?php
include('condb.php');
$params = json_decode(file_get_contents('php://input'));
    $sql =" SELECT * FROM tb_branch ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $branch = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($branch)exit();
        echo json_encode(array('branch' => $branch));
?>