<?php
error_reporting(0);

include "admin/dbcon.php";

$idnegocio = $_GET['id'];

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
$query1 = "SELECT 
    p.id,
    p.nombre,
    p.precio,
    p.existencia,
    p.id_negocio,
    f.web_path
    FROM
    productos AS p
    INNER JOIN productos_files AS pf ON pf.producto_id=p.id
    INNER JOIN files AS f ON f.id=pf.file_id
    WHERE p.id_negocio = $idnegocio
    GROUP BY p.id
    $limite
    ";


$res = mysqli_query($con, $query1);


?>

<div class="card col-8">
    <div class="p-3">
        <h5>Productos</h5>
    </div>
    <div class="row">
        <?php
        while ($row = mysqli_fetch_assoc($res)) {
        ?>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <img class="card-img-top mx-auto w-50 p-4" id="imagen" src="<?php echo $row['web_path']; ?>" value="<?php echo $row['web_path']; ?>" alt="" />
                        <h5 class="card-text" id="precio">$<?php echo $row['precio']; ?></h5>
                        <p id="nombre" value="<?php echo $row['nombre']; ?>"><?php echo $row['nombre']; ?></p>
                        <button class="btn btn-outline-success stretched-link" data-toggle="modal" data-target="#modalProducto" id="vistaProducto"><i class="fas fa-cart-plus"></i></button>

                    </div>
                </div>
            </div>
        <?php }
        ?>

    </div>
    <div class='modal fade' id='modalProducto' tabindex='-1 ' aria-hidden='true' aria-labelledby='modalTitle'>
        <div class='modal-dialog modal-dialog-centered'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modalTitle'>Producto</h5>
                </div>
                <div class='modal-body'>
                    <img class='card-img-top mx-auto w-50 p-4' id='imagen2' src="" />
                    <div class='form-group text-left mb-2'>
                        <label class='font-weight-normal'></label>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button type='submit' name='guardar-producto' class='btn btn-primary'>Guardar</button>
                    <button type='button' class='btn btn-secondary'' data-dismiss=' modal'>Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<?php
if ($totalPaginas > 0) {
?>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php
            if ($paginaSel != 1) {
            ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?vista=productos&id=<?php echo $idnegocio; ?>&pagina=<?php echo ($paginaSel - 1); ?>">Previous</a>
                </li>
            <?php
            } ?>

            <?php
            for ($i = 1; $i <= $totalPaginas; $i++) {
            ?>
                <li class="page-item <?php echo ($paginaSe == $i) ? "active " : " "; ?>">
                <li class="page-item"><a class="page-link" href="index.php?vista=productos&id=<?php echo $idnegocio; ?>&pagina=<?php echo $i; ?>" name="pagina"><?php echo $i; ?></a></li>
                </li>
            <?php
            }
            ?>
            <?php
            if ($paginaSel != $totalPaginas) {
            ?>


                <li class="page-item">
                    <a class="page-link" href="index.php?vista=productos&id=<?php echo $idnegocio; ?>&pagina=<?php echo ($paginaSel + 1); ?>">Next</a>
                </li>
            <?php } ?>
        </ul>
    </nav>
<?php
}
?>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

<script src="productos.js"></script>