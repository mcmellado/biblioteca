<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devolver libro</title>
</head>
<body>
    <?php

    require 'auxiliar.php';

    $pdo = conectar();

    $libro_id = $_GET['libro_id'];

    if (!isset($libro_id)) {
        return volver_principal();
    }

    devolver_libro($libro_id, $pdo);
    volver_principal();

    ?>
    
</body>
</html>