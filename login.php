<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
$_SESSION['logkey'] = 5;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="x-icon" href="Resources/Img/isotipos2-04.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
            integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Login - Me Asesoro</title>
    <style>
        .my-element {
            /* Regla para navegadores compatibles con WebP */
            background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url('Resources/Img/login.webp');
            background-size: cover;
            background-attachment: fixed;
        }

    </style>
</head>

<body class="my-element">
<div class="container">
    <div class="row my-5">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <button type="button" class="btn btn-outline-light btn-lg" onclick="location.href='index.html'"><i
                        class="bi bi-house-door-fill"></i> Inicio
            </button>
        </div>
    </div>
    <div class="row justify-content-around" style="height: 60vh">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-5 m-auto">
            <div class=" row my-5 align-item-center">
                <div class="col-sm-12 col-md-12 col-lg 12">
                    <div class="row mb-5">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <img src="Resources/Img/isotipos-02.png" alt="Logo Vortex" style="width: 100%"/>
                        </div>
                    </div>
                    <div class="row mx-2 d-none d-md-block d-lg-block">
                        <div class="col-sm-12 col-md-12 col-lg-12 text-white">
                            <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi leo.</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-5 m-auto">
            <div class="card" style="background-color: #F0F2F5;">
                <div class="card-body">
                    <form method="post" action="controllers/Controller_LogIn.php">
                        <div class="input-group mb-3 mt-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-person-fill"></i></span>
                            <input type="email" class="input form-control form-control-lg" autocomplete="off"
                                   name="txt_user" id="exampleFormControlInput1" placeholder="Correo electrónico"
                                   aria-describedby="basic-addon1">
                        </div>
                        <span style="margin-left: 5px;" id="emailValidationMessage"></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon2"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" class="input form-control form-control-lg" name="txt_pass"
                                   id="exampleFormControlInput2" placeholder="Contraseña"
                                   aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" type="button" name="btnIcon" id="button-addon2"
                                    onclick="password_show_hide();">
                                <i class="bi bi-eye-fill" id="show_eye"></i>
                                <i class="bi bi-eye-slash-fill d-none" id="hide_eye"></i>
                            </button>
                        </div>
                        <div class="d-grid gap-2 mb-3">
                            <button class="btn btn-success btn-lg" type="submit"
                                    style="background-color: #228BF9;border-color: #228BF9; color: white;font-size: 25px; font-weight: bold"
                                    type="button">Iniciar Sesión
                            </button>
                        </div>
                    </form>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                                <span>
                                    <a href="Clientes/ResetPassword.php">
                                        ¿Olvidaste tu contraseña?
                                    </a>
                                </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                            <button class="btn btn-primary" style="background-color: #228BF9;border-color: #228BF9;"
                                    id="btnRegistrar" name="btnRegistrar" type="button">Crear cuenta
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<!-- <script src="Boostrap/js/bootstrap.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var emailInput = document.querySelector('input[name="txt_user"]');
        var emailValidationMessage = document.querySelector('#emailValidationMessage');

        // Creamos una función para verificar si el email es válido
        function isEmailValid(email) {
            // Utilizamos una expresión regular para validar el formato del email
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }

        // Agregamos un evento de escucha al campo de correo electrónico
        emailInput.addEventListener('input', function () {
            var email = this.value;
            if (isEmailValid(email)) {
                // Si el email es válido, mostramos un mensaje positivo
                emailValidationMessage.textContent = '¡Email válido!';
                emailValidationMessage.style.color = 'green';
                // Restauramos el color del borde a su valor predeterminado (si es necesario)
                emailInput.style.borderColor = '';
            } else {
                // Si el email no es válido, mostramos un mensaje de error
                emailValidationMessage.textContent = 'El email no es válido';
                emailValidationMessage.style.color = 'red';
                // Cambiamos el color del borde a rojo
                emailInput.style.borderColor = 'red';
            }
        });

        var btnInput = document.querySelector('button[name="btnRegistrar"]');

        btnInput.addEventListener('click', function () {
            window.location.href = "Clientes/registro.html";
        });
    });

    function password_show_hide() {
        var x = document.getElementById("exampleFormControlInput2");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
</script>
<?php

echo "<script>function forgotLogIn(val) { if (val == 0) { Swal.fire('¡Sesión Expirada!', 'Hemos cerrado tu sesión, inicia nuevamente.', 'warning')}}</script>";
echo "<script>forgotLogIn(" . $_SESSION['cardinal'] . ");</script>";
echo $_SESSION['cardinal'] = null;

?>

</html>