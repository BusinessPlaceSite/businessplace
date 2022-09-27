<?php


include "../ecommerce/admin/dbcon.php";


$query1 = "SELECT 
    p.id,
    p.nombre,
    p.precio,
    p.existencia,
    f.web_path
    FROM
    productos AS p
    INNER JOIN productos_files AS pf ON pf.producto_id=p.id
    INNER JOIN files AS f ON f.id=pf.file_id
    $where
    GROUP BY p.id
    $limite
    ";

$res = mysqli_query($con, $query1);

$query8 = "SELECT * FROM negocios";

$rec = mysqli_query($con, $query8);


while ($rew = mysqli_fetch_assoc($rec)) {

?>

<section class="p-2">
<div class="container">
<div class="row justify-content-center">

<div class="card">
<div class="p-2"><a class="badge badge-primary" style="text-decoration: none;" href="index.php?vista=restaurantes"><i class="fas fa-arrow-left"></i> Regresar</a></div>
<div class="container">

<div class="row">
    <div class="col-4">
        <div class="card">
            <img class="card-img-top mx-auto w-50 p-2" src="" alt="Card image cap">
            <div class="card-body">
                <h3 class="card-title"><strong><?php echo $rew['nombre']; ?></strong></h3>
                <p class="card-text"><?php echo $rew['address']; ?></p>
            </div>
        </div>
    </div>
<?php } ?>


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
                    <img class="card-img-top mx-auto w-50 p-4" src="<?php echo $row['web_path']; ?>" alt="" />
                    <div class="card-body">
                        <h5 class="card-text">$<?php echo $row['precio']; ?></h5>
                        <p><?php echo $row['nombre']; ?></p>
                        <a href="#" class="btn btn-outline-success"><i class="fas fa-cart-plus"></i></a>
                    </div>
                </div>
            </div>
        <?php } ?>

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
                        <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo ($paginaSel - 1); ?>">Previous</a>
                    </li>
                <?php
                } ?>

                <?php
                for ($i = 1; $i <= $totalPaginas; $i++) {
                ?>
                    <li class="page-item <?php echo ($paginaSe == $i) ? "active " : " "; ?>">
                    <li class="page-item"><a class="page-link" href="index.php?modulo=productos&pagina=<?php echo $i; ?>" name="pagina"><?php echo $i; ?></a></li>
                    </li>
                <?php
                }
                ?>
                <?php
                if ($paginaSel != $totalPaginas) {
                ?>


                    <li class="page-item">
                        <a class="page-link" href="index.php?modulo=productos&pagina=<?php echo ($paginaSel + 1); ?>">Next</a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    <?php
    }
    ?>