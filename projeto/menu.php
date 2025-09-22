<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    echo "<a href='inicio.php' style='color:red;text-decoration:none;font-weight:bold;'>HOME</a>";
    echo "<b><font color='gray'> | </font></b>";
    echo "<a href='clientes.php' style='color:gray;text-decoration:none;font-weight:bold;'>CLIENTES</a>";
    echo "<b><font color='gray'> | </font></b>";
    echo "<a href='salgados.php' style='color:gray;text-decoration:none;font-weight:bold;'>SALGADOS</a>";
    echo "<b><font color='gray'> | </font></b>";
    echo "<a href='pedidos.php' style='color:gray;text-decoration:none;font-weight:bold;'>PEDIDOS</a>";
?>