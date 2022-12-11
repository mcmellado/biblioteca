<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestar libro</title>
</head>
<body>

    
    <?php

    $id = $_GET['id'];
    echo $id;

    require 'auxiliar.php';

    $pdo = conectar();
    $pdo->beginTransaction();
    $pdo->exec("LOCK TABLE prestamos IN SHARE MODE");
    $where = [];
    $execute = [];
    $sent = $pdo-> prepare("SELECT COUNT(*) FROM prestamos WHERE creado_en IS NOT NULL");

    $sent-> execute($execute);
    $total = $sent->fetchColumn();

    $sent = $pdo->prepare("SELECT nombre from lectores");

    $sent->execute($execute);
    $pdo->commit();


    ?>

    <h3> Selecciona quien va a quedarse el préstamo: </h3>

    <br>
    <div>
        <table style="margin:auto " border="1">
        <thead>
            <th> Nombre lector</th>
            <th> Acciones </th>
        </thead>
        <tbody>
            <?php foreach ($sent as $fila): ?>
                <tr>
                    <td> <?= hh($fila['nombre']) ?> </td>
                    <td> <a href="prestar_libro.php?id=<?=$id?>&nombre=<?=hh($fila['nombre'])?>"> Seleccionar </a> </td>
                </tr>
        <?php endforeach ?>
            </tbody>
        <!-- <p> Número total de libros: <?= hh($total) ?> </p>  -->   
    </div>                    
</body>
</html>