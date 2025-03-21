<?php
$host = "localhost";
$userDB = "root";
$pwdDB = "";
$nameDB = "examen_pr2";

$conexDB = new mysqli($host, $userDB, $pwdDB, $nameDB);
if ($conexDB->connect_error) {
    die("Error de conexión: " . $conexDB->connect_error);
}


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);


    $sql = "DELETE FROM personas WHERE id=?";
    $stmt = $conexDB->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Registro eliminado correctamente.'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el registro.'); window.location.href='index.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('ID no válido.'); window.location.href='index.php';</script>";
}

$conexDB->close();
?>
