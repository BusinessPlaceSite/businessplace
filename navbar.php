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
          <button class="btn btn-outline-info my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>
        <form class="form-inline ml-3">
          <button class="btn btn-outline-info " type="submit">
            <i class="bi-cart-fill me-1"></i>
            Cart
            <span class="badge bg-white ms-1 rounded-pill text-black">0</span>
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