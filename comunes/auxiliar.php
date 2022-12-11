<?php

function cabecera()
{
    ?>
    <nav style="margin: 4px; padding: 4px; text-align: left; border: 1px solid;">
        <a href="/libros/"> Libros </a>
    </nav><?php

}

function pie()
{
    if (isset($_COOKIE['acepta_cookies'])) {
        return;
    } ?>
    <form action="comunes/cookies.php" method="get" style="border: 1px solid; margin-top: 1em; padding: 0.5ex 1.5ex">
        <p align="right">
            Este sitio usa cookies.
            <button type="submit">Aceptar</button>
        </p>
    </form><?php
}

function volver_principal() 
{
    header("Location: /index.php");
}

function conectar()
{
    return new PDO('pgsql:host=localhost;dbname=biblioteca', 'biblioteca', 'biblioteca');

}

function hh($x)
{
    return htmlspecialchars($x ?? '', ENT_QUOTES | ENT_SUBSTITUTE);
}

function obtener_parametro($par, $array) 
{
    return isset($array[$par]) ? trim($array[$par]) : null;

}

function obtener_post($par)
{
    return obtener_parametro($par, $_POST);
}

function obtener_get($par)
{
    return obtener_parametro($par, $_GET);
}

function obtener_parametros(array $par, array $array): array
{
    $res = [];

    foreach ($par as $p) {
        $res[$p] = obtener_parametro($p, $array);
    }

    return $res;
}






















?>