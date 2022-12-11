<?php

require '../comunes/auxiliar.php';

function validar_existe_prestamo($id) : bool
{
    $pdo = conectar();
    $sent = $pdo->prepare("SELECT COUNT(*) from prestamos INNER JOIN 
                            lectores ON prestamos.lector_id = lectores.id 
                            INNER JOIN libros ON prestamos.libro_id = libros.id 
                            WHERE libros.id = :$id");
    $cuantos = $sent->fetchColumn();
    if ($cuantos !== 0) {
        insertar_error($campo, 'Está prestado ya este libro', $error);
        return false;
    }
    return true;
}


function prestar_libro($nombre_lector, $id_libro, $pdo)
{
    $sent = $pdo->prepare("INSERT INTO prestamos(libro_id, lector_id, creado_en, devuelto_en) 
                            VALUES(:id_libro, (SELECT id from lectores WHERE nombre = :nombre_lector), 2022, NULL)");
    
    $sent->execute([
        ':nombre_lector' => $nombre_lector,
        ':id_libro' => $id_libro
    ]);

}


function devolver_libro($libro_id, $pdo)
{
    $sent = $pdo->prepare("DELETE FROM prestamos WHERE libro_id = :libro_id");

    $sent->execute([
        ':libro_id' => $libro_id
    ]);

}




?>