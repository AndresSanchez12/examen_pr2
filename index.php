<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA DE DATOS</title>
</head>
<body>
    <h1>GESTIÓN DE DATOS</h1>
    <section>
        <a href="FormCrear.php">REGISTRAR</a><br><br>
    </section>
    <section>
        <?php
        // Datos de conexión
        $host = "localhost";
        $userDB = "root";
        $pwdDB = "";
        $nameDB = "examen_pr2";

        // Conexión a la base de datos
        $conexDB = new mysqli($host, $userDB, $pwdDB, $nameDB);
        if ($conexDB->connect_error) {
            die("Error de conexión: " . $conexDB->connect_error);
        }

        // Consulta SQL
        $sql = "select * from personas";
        $resultadoSQL = $conexDB->query($sql);
        ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Edad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultadoSQL->num_rows > 0) {
                    while ($row = $resultadoSQL->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['edad'] . "</td>";
                        echo "<td> <a href='FormModificar.php?id=" . $row['id'] . "'>Modificar</a> </td>";
                        echo "<td> <a href='Eliminar.php?id=" . $row['id'] . "' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\")'>Eliminar</a> </td>";
                        echo "</tr>";
                        
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay registros</td></tr>";
                }
                ?>
            </tbody>
        </table>

    </section>
</body>
</html>
