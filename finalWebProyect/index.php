<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Web Proyect</title>
    <link rel="icon" type="image/jpg" href="assets/img/favicon.ico"/>
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Bangla&display=swap" rel="stylesheet">
    <!--Hoja de Estilos-->
    <link rel="stylesheet" href="styles.css">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body class="body_index">

    <header>
        
    </header>

    <main class="position-absolute bottom-0 start-50 translate-middle-x ">
        <section class="welcome">
            <div class="row">
                <div class="col-12">
                    <h1 class="title mt-3">¡Bienvenido!</h1>
            </div>

            <div class="row subtitle mt-2">
                <div class="col-md-6 mt-2 mb-3">
                    <h2 class="subtitle">¿No tienes una cuenta?</h2>
                    <a href="registro.php" class="btn btn-primary">Registrarse</a>
                </div>

                <div class="col-md-6 mt-2">
                    <h2 class="subtitle">¿Ya tienes una cuenta?</h2>
                    <a href="login.php" class="btn btn-primary">Iniciar Sesión</a>
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