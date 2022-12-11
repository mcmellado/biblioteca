<?php

session_start();

require 'auxiliar.php';

setcookie('acepta_cookies', '1', 1, '/');
volver_principal();
