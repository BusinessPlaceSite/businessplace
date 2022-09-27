<?php
include 'dbcon.php';

$nproducto = mysqli_real_escape_string($con, $_POST['nombre-producto']);

$precio = mysqli_real_escape_string($con, $_POST['precio-producto']);

$existencia = mysqli_real_escape_string($con, $_POST['existencia-producto']);

$quearyproducto = "INSERT INTO productos(nombre, precio, existencia) VALUES ('$nproducto', '$precio', '$existencia');";

$pet = mysqli_query($con, $quearyproducto);

$productoid = mysqli_insert_id($con);

$directorio = "../upload/";

$fname = basename($_FILES["file"]["name"]);

$archivo = $directorio . basename($_FILES["file"]["name"]);

$webpath = "/ecommerce/upload/$fname";

$tipoarchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

$size = getimagesize($_FILES["file"]["tmp_name"]);

$systempath = $_FILES["file"]["tmp_name"];

$tamano = $_FILES["file"]["size"];

if ($size != false) {
    if ($tamano > 100000) {
?>
        <div class="alert alert-danger float-right" role="alert">
            El tamaño del archivo supera el 1000kb
        </div>
        <?php
    } else {

        if ($tipoarchivo == "png" || $tipoarchivo == "jpg" || $tipoarchivo == "jpeg" || $tipoarchivo == "svg") {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)) {
        ?>
                <div class="alert alert-success float-right" role="alert">
                    El archivo ha sido cargado correctamente
                </div>
                <?php
                if ($pet) {
                    header('Location: index.php?modulo=productos');
                ?>
                    <div class="alert alert-success float-right" role="alert">
                        Producto agregado con éxito
                    </div>
                <?php
                } else {
                ?>
                    <div class="alert alert-danger" role="alert">
                        Error al crear usuario <?php echo mysqli_error($con); ?>
                    </div>

                <?php
                }
            } else {
                ?>
                <div class="alert alert-warning float-right" role="alert">
                    El documento no es una imagen
                </div>

    <?php
            }
        }
    }
} else {
    ?>
    <div class="alert alert-danger float-right" role="alert">
        Solo se permiten archivo tipo png, jpg, jpeg, o svg
    </div>
<?php
}


$quearyfile = "INSERT INTO files(fname, filesize, web_path, system_path) VALUES ('$fname', '$tamano', '$webpath', '$systempath');";

$files = mysqli_query($con, $quearyfile);

$idfile = mysqli_insert_id($con);

$quearypf = "INSERT INTO productos_files VALUES ('$productoid', '$idfile')";

$pf = mysqli_query($con, $quearypf);
?>