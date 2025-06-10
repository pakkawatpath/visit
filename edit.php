<?php
include_once "db.php";
date_default_timezone_set('Asia/Bangkok');
$windows = strpos($_SERVER['HTTP_USER_AGENT'], "Windows");
$mac = strpos($_SERVER['HTTP_USER_AGENT'], "Mac");

$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
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
    <?php
    if (isset($_GET['com'])) { ?>
        <title>แก้ไขชื่อบริษัท</title>
    <?php
    } elseif (isset($_GET['visit'])) { ?>
        <title>แก้ไขนัดพบ</title>
    <?php
    }
    ?>

    <style>
        #back {
            margin-top: 30px;
            margin-left: 70px;
        }

        #ppass {
            margin-left: 63px;
        }

        #name {
            margin-left: 10px;
        }

        #surname {
            margin-left: 50px;
        }

        #com {
            margin-right: 19px;
        }

        #tel {
            margin-right: 34px;
        }

        #email {
            margin-right: 13px;
        }

        #employee {
            margin-right: 78px;
        }

        #time {
            margin-right: 40px;
        }

        #datetimepicker1 {
            width: 300px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <?php
    /* if (isset($_GET['user'])) {
        $user = $_GET['user'];
        $query = mysqli_query($conn, "SELECT * FROM `employee` WHERE `personid` = '$user'");
        $row = mysqli_fetch_array($query);
    ?>
        <button id="back" class="btn btn-danger" onclick="window.location.href='config.php?config=employee&Page=1'"><i class="fa fa-arrow-left"></i> BACK</button>
        <div style="margin: 100px 2% -10px;text-align:center;"></div>
        <div style="margin: 100px 2% -10px;text-align:center;"> <br>
            <h4>แก้ไขพนักงาน</h4>
            <br />
            <form action="e.php" method="post">
                <input type="hidden" name="id" value="<?php echo $user ?>">
                <div id="user" style="text-align:center;">
                    <div class="col">
                        รหัสพนักงาน: <input type="text" require name="user" class="form-group mx-sm-3 mb-2" value="<?php echo $user ?>">
                    </div>
                </div>
                <div id="ppass" style="text-align:center;">
                    <div class="col">
                        ชื่อ: <input type="text" require name="firstname" class="form-group mx-sm-3 mb-2" value="<?php echo $row['firstname'] ?>">
                    </div>
                </div>
                <div id="name" style="text-align:center;">
                    <div class="col">
                        นามสกุล: <input type="text" require name="lastname" class="form-group mx-sm-3 mb-2" value="<?php echo $row['lastname'] ?>">
                    </div>
                </div>
                <div id="surname" style="text-align:center;">
                    <div class="col">
                        ชื่อเล่น: <input type="text" require name="nickname" class="form-group mx-sm-3 mb-2" value="<?php echo $row['nickname'] ?>">
                    </div>
                </div>
                <div style="margin: 30px;text-align:center;">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> บันทึก</button>
                </div>
            </form>
        <?php
    } */

    if (isset($_GET['visit'])) {
        $name = $_GET['visit'];
        $time = $_GET['time'];
        $query = mysqli_query($conn, "SELECT * FROM `visit` WHERE `name` = '$name' AND `time` = '$time'");
        $row = mysqli_fetch_array($query);
    ?>
        <button id="back" class="btn btn-danger" onclick="history.back()"><i class="fa fa-arrow-left"></i> BACK</button>
        <div style="margin: 30px 2% -10px;text-align:center;"></div>
        <div style="margin: 30px 2% -10px;text-align:center;"> <br>
            <?php
            if ($windows == true || $mac == true) {
            ?>
                <h4>แก้ไขนัดพบ</h4>
            <?php
            } elseif ($Android == true || $iPhone == true || $iPad == true) {
            ?>
                <h4 style="margin-left: 35px;">แก้ไขนัดพบ</h4>
            <?php
            }
            ?>

            <br />
            <form action="e.php" method="post">
                <input type="hidden" name="id" value="<?php echo $name ?>">
                <input type="hidden" name="old" value="<?php echo $time ?>">
                <div id="user" style="text-align:center;">
                    <div class="col">
                        <?php
                        if ($windows == true || $mac == true) {
                        ?>
                            ชื่อ: <input type="text" require name="name" class="form-group mx-sm-1 mb-2" value="<?php echo $name ?>"><br /></br>
                        <?php
                        } elseif ($Android == true || $iPhone == true || $iPad == true) {
                        ?>
                            <label style="margin-left: 100px; margin-right: 65px" for="employee">ชื่อ:</label>
                            <input type="text" require name="name" style="margin-left: 25px;" value="<?php echo $name ?>">
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div id="com" style="text-align:center;">
                    <div class="col">
                        <?php
                        if ($windows == true || $mac == true) {
                        ?>
                            บริษัท: <input type="text" require name="com" class="form-group mx-sm-1 mb-2" value="<?php echo $row['company'] ?>"><br /></br>
                        <?php
                        } elseif ($Android == true || $iPhone == true || $iPad == true) {
                        ?>
                            <label style="margin-left: 60px;" for="employee">บริษัท:</label>
                            <input type="text" require name="com" style="margin-left: 45px;" value="<?php echo $row['company'] ?>">
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div id="tel" style="text-align:center;">
                    <div class="col">
                        <?php
                        if ($windows == true || $mac == true) {
                        ?>
                            เบอร์โทร: <input type="text" require name="phone" class="form-group mx-sm-1 mb-2" value="<?php echo $row['phone'] ?>"><br /></br>
                        <?php
                        } elseif ($Android == true || $iPhone == true || $iPad == true) {
                        ?>
                            <label style="margin-left: 75px;" for="employee">เบอร์โทร:</label>
                            <input type="text" require name="phone" style="margin-left: 60px;" value="<?php echo $row['phone'] ?>">
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div id="email" style="text-align:center;">
                    <div class="col">
                        <?php
                        if ($windows == true || $mac == true) {
                        ?>
                            อีเมล์: <input type="text" require name="email" class="form-group mx-sm-1 mb-2" value="<?php echo $row['email'] ?>"><br /></br>
                        <?php
                        } elseif ($Android == true || $iPhone == true || $iPad == true) {
                        ?>
                            <label style="margin-left: 50px;" for="employee">อีเมล์:</label>
                            <input type="text" require name="email" style="margin-left: 40px;" value="<?php echo $row['email'] ?>">
                        <?php
                        }
                        ?>

                    </div>
                </div>
                <div id="employee" style="text-align:center;">
                    <div class="col">
                        <?php
                        if ($windows == true || $mac == true) {
                        ?>
                            พนักงานที่นัดพบ: <input type="text" require name="employee" class="form-group mx-sm-1 mb-2" value="<?php echo $row['employee'] ?>"><br /></br>
                        <?php
                        } elseif ($Android == true || $iPhone == true || $iPad == true) {
                        ?>
                            <label style="margin-left: 110px;" for="employee">พนักงานที่นัดพบ:</label>
                            <input type="text" style="margin-left: 80px;" require name="employee" id="employee" value="<?php echo $row['employee'] ?>">
                        <?php
                        }
                        ?>

                    </div>
                </div>
                <div id="time" style="text-align:center;">
                    <div class="col">
                        <?php
                        if ($windows == true || $mac == true) {
                        ?>
                            <div class='col align-self-center'>
                                <div class='input-group date' id='datetimepicker1'>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar">เลือกวัน-เวลานัดพบ</span>
                                        <span style="color: red">*</span>
                                    </span>
                                    <input type='text' class="input-group-addon form-control text-center" id="date" name="date" required>
                                    <!-- วัน-เวลานัดพบ: <input type="text" require name="time" class="form-group mx-sm-1 mb-2" value="<?php echo $row['time'] ?>"> -->
                                </div>
                            </div>
                        <?php
                        } elseif ($Android == true || $iPhone == true || $iPad == true) {
                        ?>
                            <label style="margin-left: 110px;" for="time">วัน-เวลานัดพบ:</label>
                            <input type="text" style="margin-left: 80px;" require name="time" id="time" value="<?php echo $row['time'] ?>">
                        <?php } ?>
                    </div>
                </div>
                <div style="margin: 30px;text-align:center;">
                    <button type="submit" style="margin-left: 25px;" class="btn btn-primary"><i class="fa fa-floppy-o"></i> บันทึก</button>
                </div>
            </form>
        <?php
    }

    if (isset($_GET['com'])) {
        $com = $_GET['com'];
        ?>
            <button id="back" class="btn btn-danger" onclick="history.back()"><i class="fa fa-arrow-left"></i> BACK</button>
            <div style="margin: 30px 2% -10px;text-align:center;"></div>
            <div style="margin: 30px 2% -10px;text-align:center;"> <br>
                <h4>แก้ไขชื่อบริษัท</h4><br>
                <form action="e.php" method="post">
                    <input type="hidden" name="old" value="<?php echo $com ?>">
                    <div class="container text-center">
                        <div class="row align-items-center">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <input type="text" size="40" require name="comem" class="form-group mx-sm-1 mb-2" value="<?php echo $com ?>" autocomplete="off"><br /></br>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> บันทึก</button>
                    </div>
                </form>
            <?php
        }
            ?>
            <script>
                $(function() {
                    $('#datetimepicker1').datetimepicker({
                        date: new Date("<?php echo $time ?>"),
                        format: 'DD/MM/YYYY HH:mm',
                        sideBySide: true
                    });
                });
            </script>
</body>

</html>