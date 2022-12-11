<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar borrado</title>
</head>
<body>
    <?php
    require 'auxiliar.php';

    $libro_id = $_GET['libro_id'];

    if (!isset($libro_id)) {
        return volver();
    }

    cabecera();
    ?>
    <p>¿Está seguro de que devolver este libro?</p>
    <form action="devolver_libro.php" method="get">
        <input type="hidden" name="libro_id" value="<?= $libro_id ?>">
        <button type="submit">Sí</button>
        <a href="index.php">No</a>
    </form>
</body>
</html>