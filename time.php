<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Datepicker - Default functionality</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                changeMonth: true,
                numberOfMonths: 1,
                dateFormat: 'dd-mm-yy',
                //showOn: "both",
                //buttonImage: "icon/calendar.png",
                //buttonImageOnly: true
            });
        });
    </script>
</head>

<body>

    <p>Date: <input id="datepicker"></p>
    
</body>

</html>

<?php
date_default_timezone_set('Asia/Bangkok');
$date_now = date('y-m-d');
$time_now = date('H:i');
echo $date_now;
echo $time_now;
?>