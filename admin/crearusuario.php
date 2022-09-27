<?php

include "dbcon.php";


if (isset($_REQUEST['guardar'])) {



  $email = mysqli_real_escape_string($con, $_REQUEST['email'] ?? '');

  $pass = md5(mysqli_real_escape_string($con, $_REQUEST['pass'] ?? ''));

  $nombre = mysqli_real_escape_string($con, $_REQUEST['nombre'] ?? '');


  $query = "INSERT INTO usuarios(email, pass, nombre) VALUES('$email', '$pass', '$nombre')";

  $res = mysqli_query($con, $query);

  if ($res) {
?>
    <div class="alert alert-succes float-right" role="alert">
      Usuario borrado con éxito
    </div>
  <?php
  } else {
  ?>
    <div class="alert alert-danger" role="alert">
      Error al crear usuario <?php echo mysqli_error($con); ?>
    </div>

<?php
  }
}
?>



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Crear Usuario</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <form action="index.php?modulo=crearUsuario" method="post">
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" name="email" id="" class="form-control" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" name="pass" id="" class="form-control" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="">Nombre</label>
                  <input type="text" name="nombre" id="" class="form-control" placeholder="" required>
                </div>
                <div class="form-group">
                  <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>