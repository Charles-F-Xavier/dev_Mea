<?php
/**
 * Gestiona la seguridad basic del sistema
 *
 * Se encarga de mantener a los usuarios en las pestañas que corresponden.
 * Si se intenta ingresar a las páginas sin haber realizado un correcto inicio de session,
 * será redirigido a la página de inicio.
 */

$key = $_SESSION['logkey'];

if ($key != 1) {
    $_SESSION['cardinal'] = 0;
    header('Location: ../index.html');
}