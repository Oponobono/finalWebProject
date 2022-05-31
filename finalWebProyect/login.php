<?php

    session_start();
    require 'database.php';


    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $records = $connection->prepare('SELECT id, email, password FROM users WHERE email = :email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $result = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if (count($result) > 0 && password_verify($_POST['password'], $result['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header("Location: index.php");
        } else {
        $message = 'No existe ningun usuario con ese email y contraseña';
        }
    }
    
    function function_alert($message) {
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--Hoja de Estilos-->
    <link rel="stylesheet" href="styles.css">
</head>
<body class="body_login">

    <header>

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

                        <form class="border p-4 text-dark bg-light" action="login.php" method="post">

                            <h3 class="text-center mb-5 headfont">Iniciar sesión</h3>

                            <div class="mb-3">
                                <label class="form-label" name="correo">Correo:</label>
                                <input type="email" class="form-control" name="email" placeholder="Ingrese su email">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" name="contrasena_id" >Contraseña:</label>
                                <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña">
                            </div>

                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-primary" type="submit">Enviar</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-4 d-flex justify-content-center">   
                        <a href="registro.php" class="btn btn-primary">Registrarse</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
    </footer>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>