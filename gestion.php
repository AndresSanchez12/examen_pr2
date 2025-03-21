<?php
$host = "localhost";
$userDB = "root";
$pwdDB = "";
$nameDB = "examen_pr2";

$conexDB = new mysqli($host, $userDB, $pwdDB, $nameDB);

if ($conexDB->connect_error) {
    die("Error de conexión: " . $conexDB->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $edad = intval($_POST['edad']);

    if ($id > 0) {
        // Si hay un id, actualizamos los datos
        $sql = "UPDATE personas SET nombre=?, email=?, edad=? WHERE id=?";
        $stmt = $conexDB->prepare($sql);
        $stmt->bind_param("ssii", $nombre, $email, $edad, $id);
    } else {
        // Si no hay id, ingresamos nuevos datos
        $sql = "INSERT INTO personas (nombre, email, edad) VALUES (?, ?, ?)";
        $stmt = $conexDB->prepare($sql);
        $stmt->bind_param("ssi", $nombre, $email, $edad);
    }

    if ($stmt->execute()) {
        echo "Datos guardados correctamente.";
    } else {
        echo "Error al guardar los datos: " . $conexDB->error;
    }

    $stmt->close();
    $conexDB->close();
}
?>
<br><br>
<a href="index.php">Volver</a>
