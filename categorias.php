<section class="p-2">
    <div class="container">
      <div class="card">
        <div class="row justify-content-center text-center">
          <div class="col-2 align-self-center">
            <a href="index.php?vista=restaurantes" class="nav-link text-secondary <?php echo ($vista == "restaurantes" || $vista == "") ? " bg-gray-light " : " "; ?>">
              <img src="upload/Images-web/logo.png" class="img-thumbnail" alt="">
              <h2>Restaurantes</h2>
            </a>
          </div>
          <div class="col-2 align-self-center">
            <a href="index.php?vista=super" class="nav-link text-secondary <?php echo ($vista == "super") ? " bg-gray-light " : " "; ?>">
              <img src="upload/Images-web/logo-super.png" class="img-thumbnail" alt="">
              <h2>Super</h2>
            </a>
          </div>
          <div class="col-2 align-self-center">
            <a href="index.php?vista=farmacia" class="nav-link text-secondary <?php echo ($vista == "farmacia") ? " bg-gray-light " : " "; ?>">
              <img src="upload/Images-web/logo-farmacia.png" class="img-thumbnail" alt="">
              <h2>Farmacia</h2>
            </a>
          </div>
          <div class="col-2 align-self-center">
            <a href="index.php?vista=otros" class="nav-link text-secondary <?php echo ($vista == "otros") ? " bg-gray-light " : " "; ?>">
              <img src="upload/Images-web/logo-otros.png" class="img-thumbnail" alt="">
              <h2>Otros</h2>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>