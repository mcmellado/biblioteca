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

    require '../comunes/auxiliar.php';

    
    $pdo = conectar();
    $pdo->beginTransaction();
    $pdo->exec("LOCK TABLE libros IN SHARE MODE");
    $where = [];
    $execute = [];
    $sent = $pdo-> prepare("SELECT COUNT(*) FROM libros");

    $sent-> execute($execute);
    $total = $sent->fetchColumn();

    $sent = $pdo->prepare("SELECT * from libros WHERE id NOT IN(SELECT libro_id FROM prestamos) LIMIT 9");
    $sent->execute($execute);
    $pdo->commit();

    ?>

    <br>
    <div>
        <table style="margin:auto " border="1">
        <thead>
            <th> Código libro </th>
            <th> Título libro </th>
        </thead>
        <tbody>
            <?php foreach ($sent as $fila): ?>
                <tr>
                    <td> <?= hh($fila['isbn']) ?> </td>
                    <td>  <a href="../prestamos/prestar.php?id=<?=hh($fila['id'])?>"> <?= hh($fila['titulo']) ?> </a> </td>
                </tr>
        <?php endforeach ?>
        </tbody>
        <a href="../prestamos/index.php"> PRÉSTAMOS </a>
        <!-- <p> Número total de libros: <?= hh($total) ?> </p>  -->   
    </div>                    
</body>
</html>