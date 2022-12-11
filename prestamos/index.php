<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
</head>
<body>
    <?php
    session_start();

    require 'auxiliar.php';

    
    $pdo = conectar();
    $pdo->beginTransaction();
    $pdo->exec("LOCK TABLE prestamos IN SHARE MODE");
    $where = [];
    $execute = [];
    $sent = $pdo-> prepare("SELECT COUNT(*) FROM prestamos WHERE creado_en IS NOT NULL");

    $sent-> execute($execute);
    $total = $sent->fetchColumn();

    $sent = $pdo->prepare("SELECT * from prestamos INNER JOIN lectores ON prestamos.lector_id = lectores.id
                            INNER JOIN libros ON prestamos.libro_id = libros.id;");

    $sent->execute($execute);
    $pdo->commit();


    ?>

    <br>
    <div>
        <table style="margin:auto " border="1">
        <thead>
            <th> Código libro </th>
            <th> Lector nombre </th>
            <th> Título libro </th>
            <th> Año prestado </th>
            <th> Acciones </th>
        </thead>
        <tbody>
            <?php foreach ($sent as $fila): ?>
                <tr>
                    <td> <?= hh($fila['libro_id']) ?> </td>
                    <td> <?= hh($fila['nombre']) ?> </td>
                    <td> <?= hh($fila['titulo']) ?> </a> </td>
                    <td> <?= hh($fila['creado_en']) ?> </td>
                    <td> <a href="confirmar_devolver.php?libro_id=<?=hh($fila['libro_id'])?>"> Devolver libro </a> </td>
                </tr>
        <?php endforeach ?>
            </tbody>
        <!-- <p> Número total de libros: <?= hh($total) ?> </p>  -->   
    </div>                    
</body>
</html>