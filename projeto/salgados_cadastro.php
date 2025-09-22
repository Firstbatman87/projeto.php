<?php
    include 'conecta.php';
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $query = $conn->query("SELECT * FROM salgados WHERE nome='$nome'");
    if (mysqli_num_rows($query) > 0) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Salgado já existe em nossa base de dados!');
        window.location.href='salgados.php';</script>";
        exit();
    } else {
        $sql = "INSERT INTO salgados(nome,tipo,valor) VALUES ('$nome','$tipo','$valor')";
        if (mysqli_query($conn, $sql)) {
            echo "<script language='javascript' type='text/javascript'>
            window.location.href='salgados.php'
            </script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar o salgado!');
            window.location.href='salgados.php';</script>";
        }
    }
    mysqli_close($conn);
?>