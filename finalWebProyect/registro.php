<?php
    require 'database.php';

    $message = '';
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmPassword=$_POST['confirmPassword'];

    if(!empty($_POST["email"]) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])) {

        if(strlen($_POST["password"]) < 8):
            $message = 'La contraseña debe tener al menos 8 caracteres';

        elseif ($password !== $confirmPassword):
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
    <title>Registro</title>
    <!--Hoja de Estilos-->
    <link rel="stylesheet" href="styles.css">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body class="body_registro">
    <header>
        <nav class="navbar bg-light">
            <div class="container-fluid">
            </div>    
        </nav>
    </header>

    <main>
        
        <section class="subtitle mt-5">
        <?php if(!empty($message)): ?>
            <?php function_alert($message); ?>
        <?php endif; ?>
        </section>
        


        <section>
            <div class="container mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-4">

                        <form class="border p-4 text-dark bg-light" action="registro.php" method="post">

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
                                <button class="btn btn-outline-primary" type="submit">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-4 d-flex justify-content-center">   
                        <a href="login.php" class="btn btn-primary">Iniciar sesión</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>