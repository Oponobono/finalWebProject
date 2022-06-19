<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
<body class="body body_db">
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
                            <a class="nav-link active" href="home.php">
                                <i class="fas fa-home"></i>
                                Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php">
                                <i class="fas fa-shopping-cart"></i>
                                Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clients.php">
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

    <main>
        <div class="container home">
            <div class="row">
                <div class="col-12">
                    <div class="text-white">
                        <h1 class="display-4">Bienvenido a la Base de Datos de 
                            <h1 class="rockSalt mt-3">TECH SHOP</h1>
                        </h1>
                        <h4 class="mt-5">
                            Aquí podrá administrar los productos, los clientes y las ventas.
                        </h4>
                </div>
            </div>
        </div>

        <div class="container text-white mt-5 mb-5">
            <div class="row">
                <div class="col-12">
                    <h3>
                        ¿Que deseas hacer en esta ocación?
                    </h3>
                </div>
            </div>
        </div>

        <div class="container">
                <div class="row mt-5">
                    <h1 id="events" class="d-flex justify-content-center headfont">Conciertos</h1>
                                                
                    <div class="col-12 col-md-4 concert text-dark d-flex justify-content-center">
                        <a href="products.php">
                            <div class="card" style="width: 15rem;">
                                <img src="assets/img/package.svg" class="card-img-top icon_db mt-2" alt="Icon Products">
                                <div class="card-body">
                                    <h5 class="card-title">Productos</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-md-4 text-dark d-flex justify-content-center">
                        <a href="clients.php">
                            <div class="card" style="width: 15rem;">
                                <img src="assets/img/people.svg" class="card-img-top icon_db mt-2" alt="Rolling Loud Concert">
                                <div class="card-body">
                                    <h5 class="card-title">Clientes</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-md-4 text-dark d-flex justify-content-center">
                        <a href="sales.php">
                            <div class="card" style="width: 15rem;">
                                <img src="assets/img/finances.svg" class="card-img-center icon_db mt-2" alt="One Hell of a Nite Tour">
                                <div class="card-body">
                                    <h5 class="card-title">Ventas</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                          
                </div>
            </div>
    </main>

    <footer class="footer mt-2 bg-dark text-white navbar-fixed-bottom position-absolute bottom-0 start-50 translate-middle-x container-fluid">

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