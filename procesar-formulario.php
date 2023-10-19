<?php
include_once "include/template/header.php";
// include_once "include/template/header.php";
// include "include/template/header.php";
// require_once "include/template/navbar.php";
require_once "include/template/navbar.php";
// require "include/template/navbar.php";
?>

<main class="contenedor">
    <h1>Datos de la cita para la tutoría</h1>

    <p>El nombre del estudiante es: <?=$_POST['nombre-completo'] ?></p>
    <p>La correo electrónico es:  <?=$_POST['correo'] ?></p>
    <p>La teléfono es:  <?=$_POST['telefono'] ?></p>
    
    <p>Los intereses son:  <?= var_dump($_POST['intereses']); ?></p>

    <h2>Recorrido de los intereses</h2>
    <ul>
        <?php
            foreach ($_POST['intereses'] as $interes) {
                echo "<li>$interes</li>";
            }
        ?>
    </ul>
    <p>La modalidad seleccionada es: <?=$_POST['modalidad'] ?></p>
    <p>El rango de edad seleccionada es: <?=$_POST['rangos'] ?></p>
    <p>El fecha seleccionada es: <?=$_POST['fecha'] ?></p>

    <?php
        $date = new DateTime($_POST['fecha']);
        echo "<p>Fecha en formato diferente:  " . $date->format('d-m-Y H:i:s') . " .</p>";
    ?>

    <?php
        function IngresaDatosArchivo($nombre, $correo, $telefono) {
            try {
                $archivo = fopen('archivos/datos.txt', 'w');
                $datos = "$nombre,$correo,$telefono\n";
                fwrite($archivo, $datos);
            } catch (\Throwable $th) {
                echo $th;
                //Almacenaiento de bitacora
                //Cerrar archivos o conexiones
                //Inicializar variables
            }finally{
                //Cerrar archivos o conexiones
                fclose($archivo);
            }
        }

        function AgregarDatosArchivo($nombre, $correo, $telefono, $intereses) {
            try {
                $archivo = fopen('archivos/datosAgregados.txt', 'a');

                $formatoNuevo = '[';
                foreach ($intereses as $interes) {
                    $formatoNuevo .= "$interes;";
                }
                $formatoNuevo .= ']';

                $datos = "$nombre,$correo,$telefono,$formatoNuevo\n";
                fwrite($archivo, $datos);
            } catch (\Throwable $th) {
                echo $th;
                //Almacenaiento de bitacora
                //Cerrar archivos o conexiones
                //Inicializar variables
            }finally{
                //Cerrar archivos o conexiones
                fclose($archivo);
            }
        }

        function LeerArchivo($nombreArchivo) {
            try {
                $archivo = fopen($nombreArchivo, 'r');

                while (($linea = fgets($archivo)) !=null) {
                    $arregloValores = explode(',', $linea);
                    echo "<ul>";
                    
                    foreach ($arregloValores as $valor) {
                        echo "<li>$valor</li>";
                    }

                    echo "</ul>";

                    echo "<h3>$linea</h3>";
                }
            } catch (\Throwable $th) {
                echo $th;
                //Almacenaiento de bitacora
                //Cerrar archivos o conexiones
                //Inicializar variables
            }finally{
                //Cerrar archivos o conexiones
                fclose($archivo);
            }
        }

        IngresaDatosArchivo($_POST['nombre-completo'], $_POST['correo'],$_POST['telefono']);
        AgregarDatosArchivo($_POST['nombre-completo'], $_POST['correo'],$_POST['telefono'],$_POST['intereses']);
        LeerArchivo('archivos/datosAgregados.txt');
    ?>
                <!-- Tarea
            1. Aplicando los conceptos visto de archivo van a realizar un proceso de lectura de forma análoga al de escritur
            2. Utiliando la función explode van a leer el nombre, correo, telefono e intereses separando los intereses e identificando cuando es un nombre, un correo o un teléfono
            3. Investigar y aplicar la función file_get_contents, para lectura de los archivos anteriormente trabajados
            4. Investigar y aplicar la función fread para leer una cantidad especifica bytes (lectura de archivos binarios), en este caso deben generar un archivo binario 
            5. Investigar el uso de la bitacora de apache para el manejo de logs -->
</main>

<?php
include "include/template/footer.php";
?>