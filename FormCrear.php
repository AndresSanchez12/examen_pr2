<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Datos</title>
</head>
<body>
    <h1>INGRESAR DATOS</h1>
    <section>
        <form action="gestion.php" method="post">
            <fieldset>
                <label>Nombre:</label>
                <input type="text" name="nombre" required placeholder="Ingrese nombre">
                <br><br>
                
                <label>Email:</label>
                <input type="email" name="email" required placeholder="Ingrese email">
                <br><br>
                
                <label>Edad:</label>
                <input type="number" name="edad" required placeholder="Ingrese edad">
                <br><br>

                <button type="submit">Guardar</button>
            </fieldset>
        </form>
        <br>
        <a href="index.php">Volver</a>
    </section>
</body>
</html>
