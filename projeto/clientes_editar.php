<?php
    session_start();
    include 'conecta.php';
    if (!isset($_SESSION["user"])) {
        echo "<script language='javascript' type='text/javascript'>
        window.location.href='index.php';
        </script>";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="content-language" content="pt-br">
        <title>SALGADOS DA MAMÃE</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <style>
            body {
                padding: 5px;
                margin: 5px;
            }
            h2 {
                color: gray;
            }
            .main-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px 10px;
            }
            .user-info {
                display: flex;
                align-items: center;
                gap: 8px;
                color: gray;
            }
            .username {
                font-weight: bold;
            }
            .logout-link {
                color: red;
                font-weight: bold;
                text-decoration: none;
            }
            .logout-link:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <header class="main-header">
            <h2>SALGADINHOS DA MAMÃE</h2>
            <div class="user-info">
                <?php
                    if (!empty($_SESSION["user"])) {
                        $usuario = $_SESSION["user"];
                        echo "<span class='username'>".htmlspecialchars($usuario)." | </span><a class='logout-link' href='sair.php'>SAIR</a>";
                    }
                ?>
            </div>
        </header>
        <hr>
        <nav>
            <?php
                include 'menu.php';
            ?>
        </nav>
        <br>
        <center><h2><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#00008B" class="bi bi-people-fill" viewBox="0 0 16 16">
        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
        </svg>&nbsp;CLIENTES</h2></center>
        <br>
        <br>
        <div class="row justify-content-center row-cols-1 row-cols-md-2 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sw">
                    <div class="card-header py-3">
                        <h2>EDIÇÃO DE CLIENTES</h2>
                    </div>
                    <div class="card-body text-start">
                        <?php
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM clientes WHERE id=$id";
                            $query = $conn->query($sql);
                            while ($dados = $query->fetch_assoc()) {
                                $nome = $dados['nome'];
                                $celular = $dados['celular'];
                                $endereco = $dados['endereco'];
                                $numero = $dados['numero'];
                                $complemento = $dados['complemento'];
                                $cidade = $dados['cidade'];
                                $cpf = $dados['cpf'];
                            }
                        ?>
                        <form action="clientes_atualiza.php?id=<?php echo $id; ?>" method="POST">
                            <div class="form-group">
                                <label>NOME DO CLIENTE</label>
                                <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>" required>
                                <br>
                                <label>CELULAR</label>
                                <input type="number" class="form-control" name="celular" value="<?php echo $celular; ?>" required>
                                <br>
                                <label>ENDEREÇO</label>
                                <input type="text" class="form-control" name="endereco" value="<?php echo $endereco; ?>" required>
                                <br>
                                <label>NÚMERO</label>
                                <input type="number" class="form-control" name="numero" value="<?php echo $numero; ?>" required>
                                <br>
                                <label>COMPLEMENTO</label>
                                <input type="text" class="form-control" name="complemento" value="<?php echo $complemento; ?>" required>
                                <br>
                                <label>CIDADE</label>
                                <input type="text" class="form-control" name="cidade" value="<?php echo $cidade; ?>" required>
                                <br>
                                <label>CPF</label>
                                <input type="number" class="form-control" name="cpf" value="<?php echo $cpf; ?>" required>
                                <br>
                                <button type="submit" class="btn btn-success">ATUALIZAR</button>
                            </div>
                        </form>
                    </div>
                </div>       
            </div>
        </div>
    </body>
</html>