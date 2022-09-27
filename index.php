<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Comida a domicilio | BusinessPlace</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="upload/businessplace-logo-fondo.png" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
</head>

<body>

  <?php

  error_reporting(0);

  include "../ecommerce/admin/dbcon.php";

  $vista = $_REQUEST["vista"] ?? '';

  $where = " WHERE 1=1 ";

  $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre']);

  if (empty($nombre) == false) {
    $where = "AND nombre LIKE '%" . $nombre . "%'";
  }

  $quearyCuenta = "SELECT COUNT(*) as cuenta FROM productos";
  $resCuenta = mysqli_query($con, $quearyCuenta);
  $rowCuenta = mysqli_fetch_assoc($resCuenta);
  $totalRegistros = $rowCuenta['cuenta'];

  $elementosPagina = 6;

  $totalPaginas = ceil($totalRegistros / $elementosPagina);

  $paginaSel = $_REQUEST['pagina'] ?? false;

  if ($paginaSel == false) {
    $inicioLimite = 0;
    $paginaSel == 1;
  } else {
    $inicioLimite = ($paginaSel - 1) * $elementosPagina;
  }

  $limite = "limit $inicioLimite,$elementosPagina";

  ?>

  <nav class="navbar navbar-expand-sm sticky-top navbar-dark" style="background-color: #06283D ;">
    <div class="container-fluid w-50">
      <a href="index.php">
        <img src="upload/bp-logo.png" class="p-2" alt="" style="width: 5rem;">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <h3>
              <a class="nav-link" href="index.php">BusinessPlace</a>
            </h3>
          </li>
          <li class="nav-item dropdown">
            <h3>
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categorías
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <h3>
                  <a class="dropdown-item" href="#">Restaurantes</a>
                  <a class="dropdown-item" href="#">Super</a>
                  <a class="dropdown-item" href="#">Farmacia</a>
                  <a class="dropdown-item" href="#">Otros</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Acerca de Nosotros</a>
                </h3>
              </div>
            </h3>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="index.php">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="nombre" value="<?php echo $_REQUEST['nombre'] ?? ''; ?>">
          <input type="hidden" name="modulo" value="productos">
          <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>
        <form class="form-inline ml-3">
          <button class="btn btn-outline-secondary " type="submit">

            <i class="bi-cart-fill me-1"></i>
            Cart
            <span class="badge bg-secondary ms-1 rounded-pill">0</span>

          </button>
        </form>
      </div>
    </div>
  </nav>

  <header class="justify-content-center" style="background-color: #30526a;">
    <div>
      <img src="upload/banner-home.png" class="mx-auto d-block w-50" alt="">
    </div>
  </header>

  <section class="p-2">
    <div class="container">
      <div class="card">
        <div class="row justify-content-center text-center">
          <div class="col-2 align-self-center">
            <a href="index.php?vista=restaurantes" class="nav-link text-secondary <?php echo ($vista == "restaurantes" || $vista == "") ? " bg-gray-light " : " "; ?>">
              <img src="upload/restaurantes/logo.png" class="img-thumbnail" alt="">
              <h2>Restaurantes</h2>
            </a>
          </div>
          <div class="col-2 align-self-center">
            <a href="index.php?vista=super" class="nav-link text-secondary <?php echo ($vista == "super") ? " bg-gray-light " : " "; ?>">
              <img src="upload/restaurantes/logo-super.png" class="img-thumbnail" alt="">
              <h2>Super</h2>
            </a>
          </div>
          <div class="col-2 align-self-center">
            <a href="index.php?vista=farmacia" class="nav-link text-secondary <?php echo ($vista == "farmacia") ? " bg-gray-light " : " "; ?>">
              <img src="upload/restaurantes/logo-farmacia.png" class="img-thumbnail" alt="">
              <h2>Farmacia</h2>
            </a>
          </div>
          <div class="col-2 align-self-center">
            <a href="index.php?vista=otros" class="nav-link text-secondary <?php echo ($vista == "otros") ? " bg-gray-light " : " "; ?>">
              <img src="upload/restaurantes/logo-otros.png" class="img-thumbnail" alt="">
              <h2>Otros</h2>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer-->


  <?php
  if ($vista == "restaurantes" || $vista == "") {
    include 'restaurantes.php';
  }
  if ($vista == "super") {
    include 'super.php';
  }
  if ($vista == "cinepolis") {
    include 'negocio.php';
  }
  ?>



  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
  <!-- jQuery -->
  <script src="admin/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- daterangepicker -->
  <script src="admin/plugins/moment/moment.min.js"></script>
  <script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
</body>

</html>