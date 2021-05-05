<?php
    session_start();

    if(empty($_SESSION['username'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link href='assets/fullcalendar/main.css' rel='stylesheet'/>
    <link href='css/style.css' rel='stylesheet'/>
    <script src='assets/fullcalendar/main.js'></script>
    <script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
        initialDate: '2020-09-12',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
          },
        editable: true,
        selectable: true,
        businessHours: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: [
            {
            title: 'Mountainbike met Ronny',
            start: '2020-09-01'
            },
            {
            title: 'Rust',
            start: '2020-09-07',
            end: '2020-09-10'
            },
            {
            groupId: 999,
            title: 'Tennis in Mechelen',
            start: '2020-09-09T16:00:00'
            },
            {
            groupId: 999,
            title: 'Tennis in Mechelen',
            start: '2020-09-16T16:00:00'
            },
            {
            title: 'Vergadering sportgroep',
            start: '2020-09-11',
            end: '2020-09-13'
            },
            {
            title: 'Meeting',
            start: '2020-09-12T10:30:00',
            end: '2020-09-12T12:30:00'
            },
            {
            title: 'Lunch',
            start: '2020-09-12T12:00:00'
            },
            {
            title: 'Meeting',
            start: '2020-09-12T14:30:00'
            },
            {
            title: 'Happy Hour',
            start: '2020-09-12T17:30:00'
            },
            {
            title: 'Dinner',
            start: '2020-09-12T20:00:00'
            },
            {
            title: 'Verjaardag',
            start: '2020-09-13T07:00:00'
            },
            {
            title: 'Onze site',
            url: 'https://sportbud.thlau.be/WebApp/calendar.php',
            start: '2020-09-28'
            }
        ]
        });

        calendar.render();
    });

    </script>
  </head>
  <body>
    <?php include_once 'includes/header.php'?>

    <div class="calendar" id='calendar'></div>
    <footer>
      <img class="bottomscreen" src="./images/bot.png" alt="bottom">
    </footer>
  </body>
</html>