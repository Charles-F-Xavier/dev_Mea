<?php
session_start();

echo $_SESSION['logkey'];
echo $_SESSION['rut'];
echo $_SESSION['nombre'];
echo $_SESSION['apellido_p'];
echo $_SESSION['apellido_m'];
echo $_SESSION['correo'];
echo $_SESSION['telefono'];
echo $_SESSION['direccion'];

?>