<?php
include "admin/dbcon.php";

$idnegocio = $_GET['id'];

$query8 = "SELECT * FROM negocios WHERE id = '" . $idnegocio . "';";

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
                                    <img class="card-img-top mx-auto w-50 p-2" src="<?php echo $rew['logo']; ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h3 class="card-title"><strong><?php echo $rew['nombre']; ?></strong></h3>
                                        <p class="card-text"><?php echo $rew['direccion']; ?></p>
                                        <p class="card-text"><?php echo $rew['phone']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php include "v-productos.php"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
}
    ?>
    </section>