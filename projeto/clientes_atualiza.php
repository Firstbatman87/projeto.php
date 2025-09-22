<?php
    include 'conecta.php';
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $celular = $_POST['celular'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $cidade = $_POST['cidade'];
    $cpf = $_POST['cpf'];
    $sql = "UPDATE clientes SET nome=?,celular=?,endereco=?,numero=?,complemento=?,cidade=?,cpf=? WHERE id=?";
    $stmt = $conn->prepare($sql) or die($conn->error);
    if (!$stmt) {
        echo "Erro na atualização: ".$conn->error;
    }
    $stmt->bind_param('sssisssi', $nome,$celular,$endereco,$numero,$complemento,$cidade,$cpf,$id);
    $stmt->execute();
    $conn->close();
    echo "<script language='javascript' type='text/javascript'>
    window.location.href='clientes.php';
    </script>";
?>