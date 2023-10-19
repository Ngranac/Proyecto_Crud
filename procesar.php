<?php
include_once "include/template/header.php";
// include_once "include/template/header.php";
// include "include/template/header.php";
// require_once "include/template/navbar.php";
require_once "include/template/navbar.php";
// require "include/template/navbar.php";
?>

<main class="contenedor">
    <h1>Procesar</h1>
    <?php echo "El nivel de aprovechamiento del tema seleccionado es: ".  $_POST['aprovechamiento'] . "<br>"?>
    <?php echo "La cantidad de minutos fue: ".  $_POST['minutos'] ?>

    <p>El nivel de aprovechamiento del tema seleccionado es: <?=$_POST['aprovechamiento'] ?></p>
    <p>La cantidad de minutos fue:  <?=$_POST['minutos'] ?></p>

</main>

<?php
include "include/template/footer.php";
?>