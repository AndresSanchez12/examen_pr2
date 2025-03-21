<?php
$host = "localhost";
$userDB = "root";
$pwdDB = "";
$nameDB = "examen_pr2";

$conexDB = new mysqli($host, $userDB, $pwdDB, $nameDB);
if ($conexDB->connect_error) {
    die("Error de conexión: " . $conexDB->connect_error);
}


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$nombre = "";
$email = "";
$edad = "";

if ($id > 0) {
    $sql = "SELECT nombre, email, edad FROM personas WHERE id=?";
    $stmt = $conexDB->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($usuario = $resultado->fetch_assoc()) {
        $nombre = $usuario['nombre'];
        $email = $usuario['email'];
        $edad = $usuario['edad'];
    }
    $stmt->close();
}
$conexDB->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Datos</title>
</head>
<body>
    <h1>Modificar Datos</h1>
    <section>
        <form action="gestion.php" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

            <label>Nombre:</label>
            <input type="text" name="nombre" required value="<?= htmlspecialchars($nombre) ?>">
            <br><br>

            <label>Email:</label>
            <input type="email" name="email" required value="<?= htmlspecialchars($email) ?>">
            <br><br>

            <label>Edad:</label>
            <input type="number" name="edad" required value="<?= htmlspecialchars($edad) ?>">
            <br><br>

            <button type="submit">Guardar</button><br><br>
            <a href="index.php">Volver</a>
        </form>
    </section>
</body>
</html>
