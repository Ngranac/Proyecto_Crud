<?php
include_once "include/template/header.php";
require_once "include/template/navbar.php";

// $errores[] = []; //modo erroneo;
// $errores = array();
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once "include/functions/recoge.php";

    $nombre = recogePost("nombre-completo");
    $correo = recogePost("correo");
    $telefono = recogePost("telefono");

    //Investigar expresiones regulares en PHP

    $nombreOK = false;
    $correoOK = false;
    $telefonoOK = false;

    if ($nombre == ""){
        $errores[] = "No se digito el nombre del estudiante";
    }else{
        $nombreOK = true;
    }
    if ($correo == ""){
        $errores[] = "No se digito el correo del estudiante";
    }else{
        $correoOK = true;
    }
    if ($telefono == ""){
        $errores[] = "No se digito el telefono del estudiante";
    }else{
        $telefonoOK = true;
    }

    if($nombreOK && $correoOK && $telefonoOK ){
        // echo "Ingreso datos a base de datos";
        require_once "DAL/alumno.php";
        if(IngresoAlumno($nombre, $correo, $telefono)){
            header("Location: consulta-datos.php");
        }
    }
}

?>

<main class="contenedor">
    <h1>Registrar la información del estudiante</h1>

    <div class="nosotros__contenido">
            <p>
                Registre la información que se le solicita
            </p>
            <?php
                echo "<ul>";
                foreach ($errores as $error) {
                    echo "<li class='error'>$error</li>";
                }
                echo "</ul>";
            ?>
            <form method="post" class="formulario">
             <!-- novalidate -->
                <?php include "include/template/datosPersonales.php"; ?>

                <input type="submit" class="formulario__submit" value="Procesar información">
            </form>
        </div>

</main>

<?php
include "include/template/footer.php";
?>