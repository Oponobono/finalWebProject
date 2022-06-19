<?php
    require 'database.php';
    $con=mysqli_connect("localhost","root","","php_login_database");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query="SELECT * FROM sales WHERE index_venta=$id";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $id_cliente=$row['id_cliente'];
            $nombre_venta=$row['nombre_venta'];
            $cantidad=$row['cantidad'];
            $total_venta=$row['total_venta'];

            
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $id_cliente = $_POST['id_cliente'];
        $nombre_venta = $_POST['nombre_venta'];
        $cantidad = $_POST['cantidad'];
        $total_venta = $_POST['total_venta'];

        $query = "UPDATE sales SET id_cliente='$id_cliente', nombre_venta='$nombre_venta', cantidad='$cantidad', total_venta='$total_venta' WHERE index_venta=$id";
        mysqli_query($con, $query);
        header('Location: sales.php');
    }

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Update Sale</title>
        <link rel="icon" type="image/jpg" href="assets/img/favicon.ico"/>
        <!--Hoja de Estilos-->
        <link rel="stylesheet" href="styles.css">
        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
            <div class="container mt-5">
                <form action="edit_sale.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            
                            <input type="number" class="form-control mb-3" name="id_cliente" placeholder="ID Clinte" value="<?php echo $row['id_cliente']?>">
                            <input type="text" class="form-control mb-3" name="nombre_venta" placeholder="Nombre" value="<?php echo $row['nombre_venta']?>">
                            <input type="number" class="form-control mb-3" name="cantidad" placeholder="Cantidad" value="<?php echo $row['cantidad']?>">
                            <input type="number" step="0.01" class="form-control mb-3" name="total_venta" placeholder="Total Venta" value="<?php echo $row['total_venta']?>">
                            
                        <input type="submit" class="btn btn-success btn-block" name="update" value="Actualizar">
                </form>                
            </div>
    </body>
</html>
