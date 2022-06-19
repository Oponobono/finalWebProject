<?php
    require 'database.php';
    $con=mysqli_connect("localhost","root","","php_login_database");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query="SELECT * FROM customers WHERE index_customers=$id";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $nombre=$row['nombre'];
            $identification=$row['identification'];
            $direccion=$row['direccion'];
            $telefono=$row['telefono'];
            $correo=$row['correo'];

            
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $identification = $_POST['identification'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];

        $query = "UPDATE customers set nombre='$nombre', identification='$identification', direccion='$direccion', telefono='$telefono', correo='$correo' WHERE index_customers=$id";
        mysqli_query($con, $query);
        header('Location: clients.php');
    }

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Update Client</title>
        <link rel="icon" type="image/jpg" href="assets/img/favicon.ico"/>
        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
            <div class="container mt-5">
                <form action="edit_client.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            
                            <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']?>">
                            <input type="text" class="form-control mb-3" name="identification" placeholder="Identificación" value="<?php echo $row['identification']?>">
                            <input type="text" class="form-control mb-3" name="direccion" placeholder="Dirección" value="<?php echo $row['direccion']?>">
                            <input type="text" class="form-control mb-3" name="telefono" placeholder="Telefono" value="<?php echo $row['telefono']?>">
                            <input type="text" class="form-control mb-3" name="correo" placeholder="Correo" value="<?php echo $row['correo']?>">

                            
                        <input type="submit" class="btn btn-success btn-block" name="update" value="Actualizar">
                </form>                
            </div>
    </body>
</html>
