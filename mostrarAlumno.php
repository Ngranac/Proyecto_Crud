<?php
include_once "include/template/header.php";
require_once "include/template/navbar.php";

?>

<main class="contenedor">
    <h1>Mostrar alummno</h1>

    <div class="nosotros__contenido">
            <p>
                Información del alumno
            <?php
                require_once "DAL/alumno.php";
                require_once "include/functions/recoge.php";
                $elSql = "select id, nombre, correo, telefono from alumno where id = " . recogeGet('id');
                $myArray = getObject($elSql);
                // var_dump($myArray);
                // echo json_encode($myArray, JSON_UNESCAPED_UNICODE);
            
            ?>

        </div>

</main>

<?php
include "include/template/footer.php";
?>