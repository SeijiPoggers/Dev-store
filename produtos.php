<?php
    header("Content-Type:application/json");
    header("charset=utf-8");
    include 'db.php';
    $method = $_SERVER['REQUEST_METHOD'];
    $input = json_decode(file_get_contents('php://input'), true, JSON_UNESCAPED_UNICODE);

    switch ($method) {
        case 'GET':
            if(isset($_GET['descProd'])){
                handleGetFiltro($pdo);
            }else if(isset($_GET['idProd'])){
                handleGetFiltroID($pdo);
            }else if(isset($_GET['categoriaProd'])){
                handleGetFiltroCategoria($pdo);
            }else{
                handleGet($pdo);
            }
    }

    function handleGet($pdo){
        $sql = "SELECT * from tblProdutos";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    
?>