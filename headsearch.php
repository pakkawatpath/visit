<?php
include_once "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>

    <style>
        #out {
            width: 100px;
            height: 42px;
        }

        #first {
            margin-left: 70px;
        }

        #two {
            margin-left: 32px;
        }

        #submit {
            margin-left: 60px;
        }

        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>

    </br>
    <div class="container text-center">
        <h1>Visit</h1><br /></br>
        <div class="row justify-content-end" id="x">

            <div class="col-6">
                <a href="form.php?admin" class="btn btn-primary" id="visit"><img src="icon/sh.png" width="28" height="28" /> ลงทะเบียนนัดพบ</a>
                <a href="card.php" class="btn btn-primary" id="card"><img src="icon/card.png" width="28" height="28" /> สแกนบัตร</a>
            </div>


            <div class="col-sm-1">
                <a href="config.php?config=visit&Page=1" id="admin" class="btn btn-primary"><img src="icon/setting.png" width="28" height="28" />ผู้ดูแลระบบ</a>
                <?php
                $_SESSION['con'] = 'visit';
                ?>

            </div>
            <div class="col-sm-2">
                <form action="login-out.php" method="post">
                    <button name="Logout" class="btn btn-danger" id="out">ออกจากระบบ</button>
                </form>
            </div>
        </div>
        <br /></br>
        <div class="container text-center">
            <form action="search.php" method="get">
                <div class="row">
                    <input type="hidden" name="Page" value="1">
                    <div class="col-md-3" id="first"></div>
                    <div class="col-md-2">
                        <p>ชื่อ: <input type="text" autocomplete="off" placeholder="ชื่อ" name="fullname"></p>&nbsp;&nbsp;
                    </div>
                    <div class="col-md-2">
                        <p>บริษัท: <input type="text" autocomplete="off" placeholder="บริษัท" name="com"></p>&nbsp;&nbsp;
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-1" id="two"></div>
                    <div class="col-md-4">
                        <div id="datetime">
                            <div class='input-group date' id='datetimepicker1'>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar">วัน-เวลาที่</span>
                                </span>
                                <input type='text' class="input-group-addon form-control text-center" placeholder="วัน-เวลาที่" size="1" id="date1" name="date1">
                            </div>
                        </div>
                        <br />
                    </div>
                    <div class="col-md-1">
                        <p>ถึง</p>
                    </div>
                    <div class="col-md-4">
                        <div id="datetime">
                            <div class='input-group date' id='datetimepicker2'>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar">วัน-เวลาที่</span>
                                </span>
                                <input type='text' class="input-group-addon form-control text-center" placeholder="วัน-เวลาที่่" size="1" id="date2" name="date2">
                            </div>
                        </div>
                        <br />
                    </div>
                </div>
                <div class="col-md-11">
                    <input class="btn btn-outline-primary" type="submit" name="submit" id="submit" value="ค้นหา">
            </form>
            <?php
            if ($_SESSION['check'] == '1') {
            } else {
            ?>
                <form action="download.php" method="post">
                    <input class="btn btn-outline-success" type="submit" name="submit" id="submit" value="Download">
                </form>
            <?php
            }
            ?>
        </div>

    </div>
    </form>
    </div>
    <!-- <div class="container">
        <div id="one">
            <form action="search.php" method="get">
                <div class="input-group input-group-sm mb-3">
                    <input type="hidden" name="Page" value="1">
                    <p>ชื่อ: <input type="text" autocomplete="off" name="fullname"></p>&nbsp;&nbsp;
                    <p>บริษัท: <input type="text" autocomplete="off" name="com"></p>&nbsp;&nbsp;
                    <p>Date: <input type="text" onfocus="this.value=''" id="from" autocomplete="off" name="from"> to Date: <input type="text" onfocus="this.value=''" id="to" autocomplete="off" name="to"></p>
                </div>
                <input class="btn btn-outline-primary" type="submit" name="submit" id="three" value="ค้นหา">
            </form>
        </div><br />
    </div> -->
    <script>
        /* $(function() {
            $('#datetimepicker1').datetimepicker({
                defaultDate: new Date(),
                format: 'DD/MM/YYYY HH:mm',
                sideBySide: true
            });
        }); */
        $(function() {
            $('#datetimepicker1').datetimepicker({
                defaultDate: new Date(),
                format: 'DD/MM/YYYY HH:mm',
                sideBySide: true
            });
            $('#datetimepicker2').datetimepicker({
                useCurrent: false, //Important! See issue #1075
                format: 'DD/MM/YYYY HH:mm',
                sideBySide: true
            });
            $("#datetimepicker1").on("dp.change", function(e) {
                $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker2").on("dp.change", function(e) {
                $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
            });
        });
    </script>
</body>

</html>