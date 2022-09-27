<?php

include 'dbcon.php';

?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Productos</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="p-2 text-right">

                <div class="modal fade" id="Modal1" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modalTitle">Nuevo</h5>
                      </div>
                      <div class="modal-body">
                        <form action="nuevoproducto.php" method="post" enctype="multipart/form-data">
                          <div class="form-group text-left mb-2">
                            <label for="" class="font-weight-normal">Nombre</label>
                            <input type="text" class="form-control" name="nombre-producto" required>
                          </div>
                          <div class="form-group text-left mb-2">
                            <label for="" class="font-weight-normal">Precio</label>
                            <input type="text" class="form-control" name="precio-producto">
                          </div>
                          <div class="form-group text-left mb-2">
                            <label for="" class="font-weight-normal">Existencia</label>
                            <input type="text" class="form-control" name="existencia-producto">
                          </div>
                          <div class="form-group text-left mb-2">
                            <label for="" class="font-weight-normal">Imagen</label>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="file" onchange="vista_preliminar(event)">
                              <label for="" class="custom-file-label">Seleccionar Archivo</label>
                            </div>
                            <div>
                              <img src="" alt="" class="mx-auto d-block pt-4 w-25" id="img">
                            </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="guardar-producto" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

              </div>
              <table id="tablaProductos" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Existencia</th>
                    <th>Actions
                      <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#Modal1"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </th>
                  </tr>
                </thead>

                <?php

                $quearylist = "SELECT * FROM productos";

                $lista = mysqli_query($con, $quearylist);

                while ($tabla = mysqli_fetch_assoc($lista)) {
                ?>
                  <tbody>
                    <tr>
                      <form action="eliminarproducto.php" method="get">
                        <td>
                          <?php echo $tabla["nombre"]; ?>
                        </td>
                        <td><?php echo $tabla["precio"]; ?></td>
                        <td><?php echo $tabla["existencia"]; ?></td>
                        <td>
                          <a class="btn btn-outline-danger" href="eliminarproducto.php?id=<?php echo $tabla["id"]; ?>"><i class="fas fa-trash"></i></a>
                      </form>

                      <button class="btn btn-outline-primary" data-toggle="modal" data-target="#Modal2"><i class="fas fa-edit"></i></button>
                      <div class="modal fade" id="Modal2" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modalTitle">Editar</h5>
                            </div>
                            <div class="modal-body">
                              <form action="">
                                <div class="form-group text-left mb-2">
                                  <label for="" class="font-weight-normal">Nombre</label>
                                  <input type="text" class="form-control" value="<?php echo $tabla["nombre"]; ?>" required>
                                </div>
                                <div class="form-group text-left mb-2">
                                  <label for="" class="font-weight-normal">Precio</label>
                                  <input type="text" class="form-control" value="<?php echo $tabla["precio"]; ?>">
                                </div>
                                <div class="form-group text-left mb-2">
                                  <label for="" class="font-weight-normal">Existencia</label>
                                  <input type="text" class="form-control" value="<?php echo $tabla["existencia"]; ?>">
                                </div>
                                <div class="form-group text-left mb-2">
                                  <label for="" class="font-weight-normal">Imagenes</label>
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input">
                                    <label for="" class="custom-file-label">Seleccionar Archivo</label>
                                    <img src="" alt="" id="img">
                                  </div>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      </td>
                    </tr>
                  </tbody>
                <?php
                }
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
  let vista_preliminar = (event) => {
    let leer_img = new FileReader();
    let id_img = document.getElementById('img');

    leer_img.onload = () => {
      if (leer_img.readyState == 2) {
        id_img.src = leer_img.result;
      }
    }
    leer_img.readAsDataURL(event.target.files[0])
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>