<?php
    require 'database.php';
    $con=mysqli_connect("localhost","root","","php_login_database");

    $message = '';

    if(isset($_POST['enviar_cliente'])){
        if(!empty($_POST["nombre"]) && !empty($_POST['identification']) && !empty($_POST['correo']) && !empty($_POST['direccion']) && !empty($_POST['telefono'])){

            $sql = "INSERT INTO customers (nombre, identification, correo, direccion, telefono) VALUES (:nombre, :identification, :correo, :direccion, :telefono)";
                $stmt = $connection->prepare($sql);
                $stmt->bindParam(":nombre", $_POST["nombre"]);
                $stmt->bindParam(":identification", $_POST["identification"]);
                $stmt->bindParam(":correo", $_POST["correo"]);
                $stmt->bindParam(":direccion", $_POST["direccion"]);
                $stmt->bindParam(":telefono", $_POST["telefono"]);
                if($stmt->execute()) {
                    $message = 'Cliente registrado correctamente';
                } else {
                    $message = 'Error al registrar cliente';
                }
        }else {
            $message = 'Ingrese todos los datos';
        }
    }

    function function_alert($message) {
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    
    $sql="SELECT *  FROM customers";
    $query=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="icon" type="image/jpg" href="assets/img/favicon.ico"/>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--Hoja de Estilos-->
    <link rel="stylesheet" href="styles.css">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Rock+Salt&display=swap" rel="stylesheet">
    <!--Fontawesome-->
    <script src="https://kit.fontawesome.com/b28ebccb46.js" crossorigin="anonymous"></script>

</head>
<body class="body_db">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid text-white">
                <a class="navbar-brand rockSalt ms-3" href="index.php">TECH SHOP - DataBase</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"      aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">
                                <i class="fas fa-home"></i>
                                Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php">
                                <i class="fas fa-shopping-cart"></i>
                                Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="clients.php">
                                <i class="fas fa-users"></i>
                                Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sales.php">
                                <i class="fas fa-money-bill-wave"></i>
                                Ventas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>   

    <main class="db_table">
        <?php if(!empty($message)): ?>
            <?php function_alert($message); ?>
        <?php endif; ?>
        <div class="container-fluid mt-2 mb-2">
                <div class="row"> 
                    
                    <div class="col-md-3">
                        <h1 class="oswald d-flex justify-content-center mb-3">Ingrese datos de Cliente</h1>
                            <form action="clients.php" method="POST">

                                <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                                <input type="text" class="form-control mb-3" name="identification" placeholder="Identificación">
                                <input type="text" class="form-control mb-3" name="correo" placeholder="Correo">
                                <input type="text" class="form-control mb-3" name="direccion" placeholder="Dirección">
                                <input type="text" class="form-control mb-3" name="telefono" placeholder="Telefono">
                                
                                
                                <input type="submit" class="btn btn-primary" name="enviar_cliente">
                            </form>
                    </div>

                    <div class="col-md-9">
                        <table class="table" >
                            <thead class="table-success table-striped oswald">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Identificación</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Telefono</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php while($row=mysqli_fetch_array($query)): ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['index_customers']; ?></th>
                                        <td><?php echo $row['nombre']; ?></td>
                                        <td><?php echo $row['identification']; ?></td>
                                        <td><?php echo $row['correo']; ?></td>
                                        <td><?php echo $row['direccion']; ?></td>
                                        <td><?php echo $row['telefono']; ?></td>
                                        <td>
                                            <a href="edit_client.php?id=<?php echo $row['index_customers']; ?>" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="delete_client.php?id=<?php echo $row['index_customers']; ?>" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>  
            </div>
    </main>

    <footer class="footer bg-dark text-white navbar-fixed-bottom position-absolute bottom-0 start-50 translate-middle-x container-fluid">

        <section>
            <div class="container-fluid">

                <div class="row">

                    <!--Info de marca-->
                    <div class="col-12 col-md-6 d-block footer mx-auto">
                        <a href="https://github.com/Oponobono" class="afooter" target="_blank">
                            <h4 class="headfont d-flex justify-content-center mt-3 fs-4">
                                <i class="fas fa-user-astronaut me-2"></i>OPONOBONO&trade;
                            </h4>
                            <p class="d-flex justify-content-center">¡Imagínalo y nosotros lo programamos!</p>
                        </a>
                    </div>

                    <!--Registro de marca-->
                    <div class="col-12 col-md-6 d-block footer mx-auto">
                        <h4 class="headfont d-flex justify-content-center mt-3 fs-4">TECH SHOP</h4>
                        <p class="d-flex justify-content-center">© 2021 / NIT: 890905211-1 / Código DANE: 05001 / Código Postal: 050015</p>
                    </div>

                    
                </div>

            </div>
        </section>

    </footer>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>