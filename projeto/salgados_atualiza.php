<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $sql = "UPDATE salgados SET nome=?,tipo=?,valor=? WHERE id=?";
    $stmt = $conn->prepare($sql) or die($conn->error);
    if (!$stmt) {
        echo "Erro na atualização: ".$conn->error;
    }
    $stmt->bind_param('ssdi', $nome,$tipo,$valor,$id);
    $stmt->execute();
    $conn->close();
    echo "<script language='javascript' type='text/javascript'>
    window.location.href='salgados.php';
    </script>";
?>