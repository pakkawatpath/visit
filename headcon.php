<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Latest compiled aand minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel=”stylesheet” href=”//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css”>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <style>
        /* #visit {
            margin-right: 438px;
        } */

        #back {
            margin-left: 80px;
            width: 100px;
            height: 36px
        }

        #one {
            margin-left: 380px;
        }
    </style>
</head>

<body>
    <br />

    <div class="row text-center justify-content-center">
        <div class="col-2">
            <form action="visit.php?Page=1" method="post">
                <button id="back" class="btn btn-danger">ย้อนกลับไปหน้าแรก</button>
            </form>
        </div>
        <div class="col-2" id="visit">
            <a href='config.php?config=visit&Page=1'><img src='icon/visitor.png' width="80" height="80" /><br>Visit</a>
        </div>
        <div class="col-2" id="com">
            <a href="config.php?config=com"><img src="icon/corporate.png" width="80" height="80" /><br>Company</a>
        </div>
    </div><br /></br>
    
    <script>
        $(function() {
            $('#datetimepicker1').datetimepicker({
                defaultDate: new Date(),
                format: 'DD/MM/YYYY HH:mm',
                sideBySide: true
            });
        });
    </script>
</body>

</html>