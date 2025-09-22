<?php
    include 'conecta.php';
    $nome = $_POST['nome'];
    $celular = $_POST['celular'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $cidade = $_POST['cidade'];
    $cpf = $_POST['cpf'];
    $query = $conn->query("SELECT * FROM clientes WHERE nome='$nome' AND cpf='$cpf'");
    if (mysqli_num_rows($query) > 0) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Cliente já existe em nossa base de dados!');
        window.location.href='clientes.php';</script>";
        exit();
    } else {
        $sql = "INSERT INTO clientes(nome,celular,endereco,numero,complemento,cidade,cpf) VALUES ('$nome','$celular','$endereco','$numero','$complemento','$cidade','$cpf')";
        if (mysqli_query($conn, $sql)) {
            echo "<script language='javascript' type='text/javascript'>
            window.location.href='clientes.php'
            </script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar o cliente!');
            window.location.href='clientes.php';</script>";
        }
    }
    mysqli_close($conn);
?>