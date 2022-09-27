<?php

  include 'dbcon.php';

  if(isset($_REQUEST['idborrar'])){
    $id = mysqli_real_escape_string($con, $_REQUEST['idborrar']??'');

    $queary = "DELETE FROM usuarios WHERE id= $id";

    $res = mysqli_query($con, $queary);

    if($res){
      ?>
      <div class="alert alert-danger float-right" role="alert">
        Usuario borrado con éxito      
      </div>
      <?php
    }
    else{
      ?>

      <div class="alert alert-warning float-right" role="alert">
        Error al borrar el usuario
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
            <h1>Usuarios</h1>
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
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Actions
                        <a href="index.php?modulo=crearUsuario"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </th>
                  </tr>
                  </thead>
                  <tbody>


                    <?php 
                    
                    include "dbcon.php";

                    $queary = "SELECT * FROM usuarios";

                    $res = mysqli_query($con,$queary);

                    while($row = mysqli_fetch_assoc($res)){
                    ?>

                    <tr>
                    <td><?php echo $row["nombre"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td>
                        <a href="index.php?modulo=editusuario&id=<?php echo $row["id"]; ?>"><i class="fas fa-edit mr-4"></i></a>
                        <a href="index.php?modulo=usuarios&idborrar=<?php echo $row["id"]; ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                    </td>
                    </tr>
                    
                    <?php
                    
                    }
                    
                    ?>


                  
                  
                  </tbody>
                  
                </table>
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

