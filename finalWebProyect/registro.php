<?php
    require 'database.php';

    $message = '';

    if(isset($_POST['registrar'])){
        if(!empty($_POST["email"]) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])) {

            if(strlen($_POST["password"]) < 8):
                $message = 'La contraseña debe tener al menos 8 caracteres';

            elseif ($_POST["password"] !== $_POST["confirmPassword"]):
                $message = "Las contraseñas no coinciden, intente de nuevo";

            else:
                $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
                $stmt = $connection->prepare($sql);
                $stmt->bindParam(":email", $_POST["email"]);
                $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
                $stmt->bindParam(":password", $password);

                if($stmt->execute()) {
                    $message = "Usuario registrado correctamente";
                } else {
                    $message = "Error al registrar usuario";
                }
            endif;
            
        }else {
            $message = 'Ingrese todos los datos';
        }
    }

    function function_alert($message) {
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" type="image/jpg" href="assets/img/favicon.ico"/>
    <!--Hoja de Estilos-->
    <link rel="stylesheet" href="styles.css">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Rock+Salt&display=swap" rel="stylesheet">
    <!--Fontawesome-->
    <script src="https://kit.fontawesome.com/b28ebccb46.js" crossorigin="anonymous"></script>
</head>

<body class="body body_registro">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid text-white">
                <a class="navbar-brand rockSalt ms-3" href="index.php">TECH SHOP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"      aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">
                                <i class="fas fa-sign-in-alt"></i>
                                Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="registro.php">
                                <i class="fas fa-user-plus"></i>
                                Registro</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        
        <?php if(!empty($message)): ?>
            <?php function_alert($message); ?>
        <?php endif; ?>


        <section>
            <div class="container mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-4">

                        <form class="border p-4 text-dark bg-light rounded" action="registro.php" method="post">

                            <h3 class="text-center mb-5 headfont">REGISTRO DE USUARIOS NUEVOS</h3>

                            <div class="mb-3">
                                <label class="form-label" name="correo">Correo:</label>
                                <input type="email" class="form-control" name="email" placeholder="Ingrese su email">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" name="contrasena">Contraseña:</label>
                                <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" name="confirmeContrasena" >Confima tu contraseña:</label>
                                <input type="password" class="form-control" name="confirmPassword" placeholder="Ingresa nuevamente la contraseña">
                            </div>

                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-primary" type="submit" name="registrar">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-4 d-flex justify-content-center">   
                        <a href="login.php" class="btn btn-primary fw-bold">Iniciar sesión</a>
                    </div>
                </div>
            </div>
        </section>
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