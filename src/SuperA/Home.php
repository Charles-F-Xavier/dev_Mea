<?php
session_start();

require("../../controllers/Controller_Security.php");
include_once '../../db/Data.php';
$data = new Data();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mea - Home</title>
    <link rel="icon" type="x-icon" href="../../Resources/Img/isotipos2-04.png">
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
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="../../Resources/css/Style_Aside.css"/>
    <link rel="stylesheet" href="../../Resources/css/Style_Footer.css"/>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Esto asegura que el contenedor abarque al menos el 100% de la altura de la ventana del navegador */
        }

        #main_content {
            flex: 1 0 auto; /* Esto hace que el contenido principal crezca o se encoja según sea necesario */
        }

        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<?php
include '../../layouts/Layout_Aside.php';
?>
<div id="main_content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div id="calendar">
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../../layouts/Layout_Footer.php';
?>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="../../vendor/fullcalendar-6.1.10/packages/core/index.global.min.js"></script>
<script src="../../vendor/fullcalendar-6.1.10/packages/daygrid/index.global.min.js"></script>
<script src="../../vendor/fullcalendar-6.1.10/packages/timegrid/index.global.min.js"></script>
<script src="../../vendor/fullcalendar-6.1.10/packages/interaction/index.global.min.js"></script>
<script src="../../vendor/fullcalendar-6.1.10/packages/core/locales/es.global.min.js"></script>
<script src="../../Resources/js/Js_SideMove.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {center: 'dayGridMonth,timeGridWeek,timeGridDay'},
            initialView: 'dayGridMonth',
            locale: 'es',
            businessHours: [ // specify an array instead
                {
                    daysOfWeek: [1, 2, 3, 4], // Monday, Tuesday, Wednesday
                    startTime: '08:00', // 8am
                    endTime: '18:00' // 6pm
                },
                {
                    daysOfWeek: [5], // Thursday, Friday
                    startTime: '08:00', // 08am
                    endTime: '14:00' // 2pm
                }
            ],
            navLinks: true, // can click day/week names to navigate views
            nowIndicator: true,
            weekNumbers: true,
            selectable: true,
            selectConstraint: {
                businessHours: true
            },
            dateClick: function (info) {
                Swal.fire({
                    title: '¿Desea agendar una cita?',
                    text: "Se agendará una cita para el día " + info.dateStr,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#228BF9',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, agendar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Agendado!',
                            'Tu cita ha sido agendada.',
                            'success'
                        );
                        info.dayEl.style.backgroundColor = 'red';
                    }
                })
            },

        });
        calendar.render();
    });

</script>
</body>
</html>
