<?php
    require 'database.php';
    $con=mysqli_connect("localhost","root","","php_login_database");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query="SELECT * FROM products WHERE index_products=$id";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $referencia=$row['referencia'];
            $nombre_producto=$row['nombre_producto'];
            $stock=$row['stock'];
            $valor_compra_producto=$row['valor_compra_producto'];
            $valor_venta_producto=$row['valor_venta_producto'];

            
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $referencia = $_POST['referencia'];
        $nombre_producto = $_POST['nombre_producto'];
        $stock = $_POST['stock'];
        $valor_compra_producto = $_POST['valor_compra_producto'];
        $valor_venta_producto = $_POST['valor_venta_producto'];

        $query = "UPDATE products set referencia='$referencia', nombre_producto='$nombre_producto', stock='$stock', valor_compra_producto='$valor_compra_producto', valor_venta_producto='$valor_venta_producto' WHERE index_products='$id'";
        mysqli_query($con, $query);
        header('Location: products.php');
    }

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Update Product</title>
        <link rel="icon" type="image/jpg" href="assets/img/favicon.ico"/>
        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
            <div class="container mt-5">
                <form action="edit_product.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            
                            <input type="text" class="form-control mb-3" name="referencia" placeholder="Referencia" value="<?php echo $row['referencia']?>">
                            <input type="text" class="form-control mb-3" name="nombre_producto" placeholder="Nombre producto" value="<?php echo $row['nombre_producto']?>">
                            <input type="text" class="form-control mb-3" name="stock" placeholder="Stock" value="<?php echo $row['stock']?>">
                            <input type="text" class="form-control mb-3" name="valor_compra_producto" placeholder="Valor Compra" value="<?php echo $row['valor_compra_producto']?>">
                            <input type="text" class="form-control mb-3" name="valor_venta_producto" placeholder="Valor Venta" value="<?php echo $row['valor_venta_producto']?>">

                            
                        <input type="submit" class="btn btn-success btn-block" name="update" value="Actualizar">
                </form>                
            </div>
    </body>
</html>
