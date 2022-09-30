<?php
include "admin/dbcon.php";

$quearyrest = "SELECT * FROM negocios";

$res = mysqli_query($con, $quearyrest);

?>
<section class="p-2">
    <div class="container">
        <div class="card">
            <div class="p-2">
                <h1>Restaurantes</h1>
            </div>
            <div class="row p-2 text-center">
                <?php
                while ($lista = mysqli_fetch_assoc($res)) {
                ?>
                    <div class="col-3 p-2">
                        <div class="card p-2" style="height: 12rem;">
                            <a href="index.php?vista=productos&id=<?php echo $lista['id']; ?>&pagina=1">
                                <img src="<?php echo $lista['logo']; ?>" class="card-img-top align-self-center w-25" alt="">
                                <div class="card-body">
                                    <h3><?php echo $lista['nombre']; ?></h3>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>