<?php

/**
 * Verifica el correcto inicio de session
 *
 * Verifica que los datos proporcionados en index.php sean correctos,
 *  solicita información a la base de datos y la organiza para su posterior uso,
 * al final de esto redirecciona a la página Stores.php
 *
 * Se utilizan las siguientes funciones:
 *
 * - {@link ./classes/Data.html#method_isUserPassValid isUserPassValid()}
 * - {@link ./classes/Data.html#method_getUserbyMail getUserbyMail()}
 */
// Iniciamos la sesión para mantener la información del usuario entre páginas
session_start();
// Desactivamos los mensajes de advertencia para evitar que se muestren en la página
error_reporting(E_ALL ^ E_WARNING);
?>
    <!doctype html>
    <html lang="es">

    <head>
        <title>Me Asesoro - Inicio de Sesión</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

            body {
                line-height: 1.5;
                font-family: "Poppins", sans-serif;
            }

        </style>
    </head>

    <body>
    <script>
        // Función para mostrar un mensaje de error de inicio de sesión
        function ErrorLog() {
            let timerInterval
            Swal.fire({
                title: '¡Error!',
                icon: 'error',
                text: 'Correo o contraseña incorrectos.',
                timer: 2000,
                timerProgressBar: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = "../login.php";
                }
            })
        }

        function UserStateDis() {
            let timerInterval
            Swal.fire({
                title: '¡Error!',
                icon: 'error',
                text: 'Tu cuenta se encuentra desactivada.',
                timer: 2000,
                timerProgressBar: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = "../login.php";
                }
            })
        }

        function LevelUnauthorized() {
            let timerInterval
            Swal.fire({
                title: '¡Error!',
                icon: 'error',
                text: 'No tienes permisos para acceder a esta página.',
                timer: 2000,
                timerProgressBar: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = "../login.php";
                }
            })
        }

        // Función para mostrar un mensaje de error de inicio de sesión
        function MissingInfo() {
            let timerInterval
            Swal.fire({
                title: '¡Datos Incompletos!',
                icon: 'warning',
                text: 'Verifica que estás ingresando correctamente tu correo y contraseña.',
                timer: 2000,
                timerProgressBar: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = "../login.php";
                }
            })
        }

        // Función para mostrar un mensaje de éxito de inicio de sesión

        function SuccessLogSupA() {
            let timerInterval
            Swal.fire({
                title: 'Bienvenid@',
                icon: 'success',
                text: 'Bienvenido a Me asesoro',
                timer: 5000,
                allowOutsideClick: false,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = "../src/SuperA/Home.php";
                }
            })
        }

        function SuccessLogA() {
            let timerInterval
            Swal.fire({
                title: 'Bienvenid@',
                icon: 'success',
                text: 'Bienvenido a Me asesoro',
                timer: 5000,
                allowOutsideClick: false,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = "../src/Admin/Home.php";
                }
            })
        }

        function SuccessLogU() {
            let timerInterval
            Swal.fire({
                title: 'Bienvenid@',
                icon: 'success',
                text: 'Bienvenido a Me asesoro',
                timer: 5000,
                allowOutsideClick: false,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = "../src/User/Home.php";
                }
            })
        }

        function SuccessLogC() {
            let timerInterval
            Swal.fire({
                title: 'Bienvenid@',
                icon: 'success',
                text: 'Bienvenido a Me asesoro',
                timer: 5000,
                allowOutsideClick: false,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.href = "../src/Client/Home.php";
                }
            })
        }

        function PruebaLog() {
            Swal.fire({
                imageUrl: 'https://unsplash.it/400/200',
                imageWidth: '90%',
                imageHeight: '90%',
                imageAlt: 'Custom image',
                showCloseButton: true,
                showConfirmButton: false,
                customClass: {
                    container: 'my-sweetalert-container', // Clase personalizada para el contenedor del modal
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.close) {
                    // Esta función se ejecutará cuando el usuario cierre el modal presionando la "x"
                    console.log('SweetAlert cerrado con la "x"');
                }
            });

            console.log(Swal.getPopup());
        }
    </script>
    </body>

    </html>
<?php
// Incluimos el archivo que contiene las funciones de la base de datos
include_once '../db/Data.php';

// Obtenemos los datos del formulario de inicio de sesión
$correo = $_POST["txt_user"] ?? null;
$pass = $_POST["txt_pass"] ?? null;


/*if (!isset($_POST["txt_user"]) || !isset($_POST["txt_pass"])) {
    echo '<script>MissingInfo();</script>';
}*/

// Creamos una instancia de la clase Model_Data que maneja la base de datos
$data = new Data();

// Verificamos si se ha enviado el formulario de inicio de sesión
if ($correo && $pass) {

    // Validamos las credenciales del usuario
    $valid = $data->isUserPassValid($correo, $pass);

    if ($valid) {
        // Obtenemos los datos del usuario desde la base de datos
        $userData = $data->getUserbyMail($correo); // Obtener el primer resultado

        if ($userData && $userData['estado'] === '0') {
            echo '<script>ErrorLog();</script>';
        } else {
            $_SESSION['id'] = $userData['id'];
            $_SESSION['rut'] = $userData['rut'];
            $_SESSION['nombre'] = $userData['nombre'];
            $_SESSION['apellido_p'] = $userData['apellido_p'];
            $_SESSION['apellido_m'] = $userData['apellido_m'];
            $_SESSION['correo'] = $userData['correo'];
            $_SESSION['direccion'] = $userData['direccion'];
            $_SESSION['telefono'] = $userData['telefono'];
            $_SESSION['nivel'] = $userData['nivel'];
            $_SESSION['estado'] = $userData['estado'];
            $_SESSION['logkey'] = 1;

            // Mostrar mensajes según el nivel del usuario
            echo match ($_SESSION['nivel']) {
                '1' => '<script>SuccessLogSupA();</script>',
                '2' => '<script>SuccessLogA();</script>',
                '3' => '<script>SuccessLogU();</script>',
                '4' => '<script>SuccessLogC();</script>',
                default => '<script>ErrorLog();</script>',
            };
        }
    } else {
        // Las credenciales no son válidas, mostramos el mensaje de error
        echo '<script>ErrorLog();</script>';
    }
} else {
    echo '<script>MissingInfo();</script>';
}

?>