<?php
include_once "include/template/header.php";
require_once "include/template/navbar.php";

?>

<main class="contenedor">
    <h1>Muestra la información de los estudiantes</h1>

    <div class="nosotros__contenido">
            <p>
                Listado de alumnos
            </p>
            <?php
                require_once "DAL/alumno.php";
                $elSql = "select id, nombre, correo, telefono from alumno";
                $myArray = getArray($elSql);
                // var_dump($myArray);
                // echo json_encode($myArray, JSON_UNESCAPED_UNICODE);
                echo "<div>";
                echo "<h3>Datos de los alumnos</h3>";
                echo "<table width=50%>";
                echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Correo</th>";
                echo "<th>Teléfono</th>";
                echo "</tr>";

                if(!empty($myArray)){
                    foreach ($myArray as $value) {
                        echo "<tr>";
                        echo "<td>". $value['nombre'] ."</td>";
                        echo "<td>{$value['correo']}</td>";
                        echo "<td>{$value['telefono']}</td>";

                        echo "<td><a href=mostrarAlumno.php?id={$value['id']}>Ver alumno</a></td>";

                        echo "</tr>";
                    }
                }else{
                    echo "<tr>No hay registros de alumnos</tr>";
                }


                echo "</table>";
                echo "</div>";
            ?>

        </div>

</main>

<?php
include "include/template/footer.php";
?>