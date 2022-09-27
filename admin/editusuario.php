<?php

    include "dbcon.php";


    if( isset($_REQUEST['guardar'])){ 



        $email= mysqli_real_escape_string($con, $_REQUEST['email']??'');

        $pass= md5 (mysqli_real_escape_string($con, $_REQUEST['pass']??''));

        $nombre= mysqli_real_escape_string($con, $_REQUEST['nombre']??'');

        $id= mysqli_real_escape_string($con, $_REQUEST['id']??'');

        
        $query = "UPDATE usuarios SET id = '$id', email = '$email', pass = '$pass', nombre = '$nombre' WHERE id = $id ";
        
        $res = mysqli_query($con,$query);

       if($res){
          echo '<script type="text/javascript"> window.location.assign("index.php?modulo=usuarios") & window.alert("El usuario ha sido editado correctamente."); </script>';
        }
        else{
?>
            <div class="alert alert-danger" role="alert">
                Error al crear usuario <?php echo mysqli_error($con);?>
            </div>

<?php
        }
    }

    $id= mysqli_real_escape_string($con, $_REQUEST['id']??'');

    $query1 = "SELECT * FROM usuarios WHERE id = '".$id."'";

    $res = mysqli_query($con, $query1);

    $row = mysqli_fetch_assoc($res);
?>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Usuario</h1>
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
                    <form action="index.php?modulo=editusuario" method="post"> 
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="form-control" placeholder="" value="<?php echo $row['email'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="pass" id="" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" id="" class="form-control" placeholder="" value="<?php echo $row['nombre'];?>" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
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

