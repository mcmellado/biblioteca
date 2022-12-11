<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestando_libro</title>
</head>
<body>

    <?php
    require 'auxiliar.php';

    $nombre_lector = $_GET['nombre'];
    $id_libro = $_GET['id'];
    $pdo = conectar();

    prestar_libro($nombre_lector, $id_libro, $pdo);
    volver_principal();


    ?>

    
</body>
</html>