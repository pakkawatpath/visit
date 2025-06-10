<?php
include_once 'db.php';
session_start();
error_reporting(E_ERROR | E_PARSE);

$check = mysqli_query($conn, "SELECT * FROM `card`");

while ($row = $check->fetch_array()) {
    $card = $row['card_status'];
}

$temp = mysqli_query($conn, "SELECT * FROM `visit_temp`");
while ($result = $temp->fetch_array()) {
    $x = $result['name'];
}

if ($card == 'H' && empty($x)) {
    mysqli_query($conn, "UPDATE `card` SET `card_status`='R'");
    mysqli_query($conn, "DELETE FROM `visit_temp`");
    header("refresh:5;url=card");
?>

    <!DOCTYPE html>
    <html lang="th">

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
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.min.js"></script>
        <link rel="stylesheet" href="sweetalert2.min.css">
        <style>
            #back {
                margin-top: 30px;
                margin-left: 590px;
            }
        </style>
    </head>

    <body>
        <img src="icon/load.gif" id="img" style="vertical-align:middle;margin:50px 500px 0px 500px">
        <?php
        if (empty($_SESSION['nametemp'])) { ?>
            <div id="back">
                <button class="btn btn-danger" onclick="window.location.href='visit.php?Page=1'">ย้อนกลับ</button>
            </div>
        <?php
            header("refresh:5;url=card.php");
        } else {
            header("refresh:5;url=form.php?card");
        }
        ?>
    </body>

    </html>
<?php
}

if ($card == 'H' && !empty($x)) {
    $temp = mysqli_query($conn, "SELECT * FROM `visit_temp`");
    while ($result = $temp->fetch_array()) {
        $x = $result['name'];
    }
    $_SESSION['nametemp'] = $x;
    mysqli_query($conn, "DELETE FROM `visit_temp`");
    mysqli_query($conn, "UPDATE `card` SET `card_status`='H'");
    header("refresh:5;url=form.php?card");
?>
    <!DOCTYPE html>
    <html lang="th">

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
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.min.js"></script>
        <link rel="stylesheet" href="sweetalert2.min.css">
        <style>
            #back {
                margin-top: 30px;
                margin-left: 590px;
            }
        </style>
    </head>

    <body>
        <img src="icon/load.gif" id="img" style="vertical-align:middle;margin:50px 500px 0px 500px">
    </body>

    </html>
<?php
}
if ($card == "R") {
    header("refresh:5;url=card");
?>
    <!DOCTYPE html>
    <html lang="th">

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
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="sweetalert2.min.js"></script>
        <link rel="stylesheet" href="sweetalert2.min.css">
        <style>
            #back {
                margin-top: 30px;
                margin-left: 590px;
            }
        </style>
    </head>

    <body>
        <img src="icon/load.gif" id="img" style="vertical-align:middle;margin:50px 500px 0px 500px">
        <?php
        if (empty($_SESSION['nametemp'])) { ?>
            <div id="back">
                <button class="btn btn-danger" onclick="window.location.href='visit.php?Page=1'">ย้อนกลับ</button>
            </div>
        <?php
            header("refresh:5;url=card");
        }
        ?>
    </body>

    </html>
<?php
}
?>