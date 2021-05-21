<?php
    session_start();
    include 'includes/class-autoload.inc.php';

    if(empty($_SESSION['username'])){
        header("Location: login.php");
    }

    $test = new calendar();
    $test->eventsToJSON();
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link href='assets/fullcalendar/main.css' rel='stylesheet'/>
    <link href='css/style.css' rel='stylesheet'/>
    <script src='assets/fullcalendar/main.js'></script>
    <script>

        var json = <?php echo json_encode($_SESSION['array']);?>;
        console.log(json);

        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
          },
        eventColor: '#FF4363',
        editable: true,
        selectable: true,
        businessHours: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: json
        });

        calendar.render();
    });

    </script>
  </head>
  <body>
    <?php include_once 'includes/header.php'?>
    <div class="calendarDiv">
        <!-- Sends post to OO -->
        <form action="./addEvent.php" class="formEvent" method="POST">
            <p>Add an event to your calendar!</p>
            <table >
                <tbody>
                    <tr>
                        <td><input type="text" id="title" name="title" class="inputCalendar" placeholder="Title of the event..." required/></td>
                    </tr>
                    <tr>
                        <td><input type="date" id="dt" name="dt" class="inputCalendar" placeholder="Date and time..." required/></td>
                    </tr>
                    <tr>
                        <td><input type="submit" class="addEventBtn" class="inputCalendar" value="Add Event"/></td>
                    </tr>   
                </tbody>
            </table>
        </form>

        <!-- Renders the calendar -->
        <div class="calendar" id='calendar'></div>

        <div class="empty"></div>
    </div>
    <footer>
      <img class="bottomscreen" src="./images/bot.png" alt="bottom">
    </footer>
  </body>
</html>
