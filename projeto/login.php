<?php
    session_start();
    include 'conecta.php';
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $logar = mysqli_query($conn, "SELECT * FROM usuario WHERE login='$login' AND senha='$senha'");
    if (mysqli_num_rows($logar) > 0) {
        $dados = mysqli_fetch_assoc($logar);
        $_SESSION["user"] = $dados['login'];
        echo ("<script>window.location.replace('inicio.php');</script>");
    }
    else {
        echo ("<script>alert('Login ou senha inválido! Tente novamente!');</script>");
        echo ("<script>window.location.replace('index.php');</script>");
    }
    mysqli_close($conn);
?>