<?php
require "conexion_bd.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITULO DE LA PESTAÑA  -->
    <title>COMPRAS</title>

    <!-- CREACION LOGO PESTAÑA NAVEGADOR -->
    <link rel="shortcut icon" href="../CSS/Logo_Software.jpg">

    <!-- LINK COMPRAS CSS -->
    <link rel="stylesheet" href="../CSS/menu_compras.css">
</head>

<body>

    <!-- FLECHA ATRAS -->
    <div><a href="../PHP/inicio.php" class="flecha">Atras</a></div>

    <br>
    <!-- TEXTO COMPRAS -->
    <h2>COMPRAS</h2>
    <br>

    <!-- BUSCADOR -->
    <div class="buscador">
        <form action="buscar_compra.php" method="post" autocomplete="off">
            <label for="" class="texto">Numero de Factura</label>
            <input type="search" placeholder="Buscar" class="input" name="buscar_pro" required>
        </form>
    </div>
    <br><br><br>

    <!-- BOTON REGISTRAR COMPRAS -->
    <a href="../PHP/registrar_compras.php" class="boton_registrar">Registrar compra</a>
    <br>

    <!-- CREACION TABLA COMPRAS -->
    <table>
        <tr>
            <th>Id</th>
            <th>Numero de Factura</th>
            <th>Cantidad</th>
            <th>Precio unidad</th>
            <th>Referencia producto</th>
            <th>Proveedor</th>
            <th>Editar</th>
        </tr>

        <!-- MOSTRAR DATOS COMPRAS BD EN LA TABLA -->
        <?php
        $consulta = "SELECT * FROM compras INNER JOIN proveedores ON proveedores.id_proveedor=compras.proveedor INNER JOIN productos ON productos.id_producto=compras.referencia_producto ORDER BY id_compras ASC";

        $validar = mysqli_query($conexion, $consulta);
        while ($mostrar = mysqli_fetch_array($validar)) {
            echo "<tr>";
            echo "<td>" . $mostrar['id_compras'] . "</td>";
            echo "<td>" . $mostrar['numero_factura'] . "</td>";
            echo "<td>" . $mostrar['cantidad'] . "</td>";
            echo "<td>" . $mostrar['precio_unidad'] . "</td>";
            echo "<td>" . $mostrar['referencia_producto'] . "</td>";
            echo "<td>" . $mostrar['nombre_proveedor'] . "</td>";
            echo "<td>";
            echo "<a class='editar' href='editar_compras.php?id_compras=" . $mostrar['id_compras'] . "'>Editar</a>&#160  &#160  &#160 ";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    </div>

    <!-- LOGO SOFTWARE -->
    <img src="../CSS/Logo_Software.jpg" alt="Logo TAURUS_V1" class="logo">
</body>

</html>