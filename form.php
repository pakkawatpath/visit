<?php
include_once 'db.php';
session_start();

$windows = strpos($_SERVER['HTTP_USER_AGENT'], "Windows");
$mac = strpos($_SERVER['HTTP_USER_AGENT'], "Mac");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
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
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>ลงทะเบียนนัดพบ</title>
    <style>
        #back {
            margin-top: 30px;
            margin-left: 70px;
        }

        #imgInp {
            margin-left: auto;
            margin-right: auto;
        }

        #imgInp,
        #blah {
            display: none;
        }

        #blah {
            margin-left: auto;
            margin-right: auto;
        }

        <?php
        $windows = strpos($_SERVER['HTTP_USER_AGENT'], "Windows");
        $mac = strpos($_SERVER['HTTP_USER_AGENT'], "Mac");
        $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
        $iPad    = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
        $Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
        if ($windows == true || $mac == true) {
        ?>#comem {
            width: 1125px;
        }

        <?php
        } elseif ($Android == true || $iPhone == true || $iPad == true) {
        ?>select {
            width: auto;
            margin-left: 30px;
        }

        select:focus {
            min-width: 150px;
            width: auto;
        }

        <?php
        }
        ?>
    </style>
</head>

<body>
    <?php
    if (isset($_GET['admin'])) {
    ?>
        <?php
        if ($windows == true || $mac == true) {
        ?>
            <div id="back" class="col-2">
                <button class="btn btn-danger" onclick="window.location.href='visit.php?Page=1'"><i class="fa fa-arrow-left"></i> ย้อนกลับหน้าแรก</button>
            </div>
        <?php
        }
        ?>
        <h1 style="text-align:center;">ลงทะเบียนนัดพบ</h1>
        <br />
        <form action="save.php" method="post" enctype="multipart/form-data">
            <div class="container">

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text">ชื่อ-นามสกุล<p style="color:red">*</p></span>
                        <?php
                        if (empty($_SESSION['name'])) {
                        ?>
                            <input type="text" name="fname" class="form-control" placeholder="ชื่อ-นามสกุล" autocomplete="off">
                        <?php
                        } else {
                        ?>
                            <input type="text" name="fname" value="<?php echo $_SESSION['name'] ?>" class="form-control" placeholder="ชื่อ-นามสกุล" autocomplete="off">
                        <?php
                        }
                        ?>
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text">บริษัท<p style="color:red">*</p></span>
                        <?php
                        if (empty($_SESSION['com'])) {
                        ?>
                            <input type="text" name="com" class="form-control" placeholder="บริษัท" autocomplete="off">
                        <?php
                        } else {
                        ?>
                            <input type="text" name="com" value="<?php echo $_SESSION['com'] ?>" class="form-control" placeholder="บริษัท" autocomplete="off">
                        <?php
                        }
                        ?>
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="phone">เบอร์โทร<p style="color:red">*</p></span>
                        <?php
                        if (empty($_SESSION['phone'])) {
                        ?>
                            <input type="tel" size="10" maxlength="10" name="phone" class="form-control" placeholder="เบอร์โทร" autocomplete="off">
                        <?php
                        } else {
                        ?>
                            <input type="tel" size="10" maxlength="10" name="phone" value="<?php echo $_SESSION['phone'] ?>" class="form-control" placeholder="เบอร์โทร" autocomplete="off">
                        <?php
                        }
                        ?>
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="email">อีเมล<p style="color:red">*</p></span>
                        <?php
                        if (empty($_SESSION['email'])) {
                        ?>
                            <input type="email" size="50" maxlength="50" name="email" class="form-control" placeholder="อีเมล" autocomplete="off">
                        <?php
                        } else {
                        ?>
                            <input type="email" size="50" maxlength="50" name="email" value="<?php echo $_SESSION['email'] ?>" class="form-control" placeholder="อีเมล" autocomplete="off">
                        <?php
                        }
                        ?>
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="visit">นัดพบกับคุณ<p style="color:red">*</p></span>
                        <?php
                        if (empty($_SESSION['visit'])) {
                        ?>
                            <input type="text" size="50" maxlength="50" name="visit" class="form-control" placeholder="นัดพบกับคุณ" autocomplete="off">
                        <?php
                        } else {
                        ?>
                            <input type="text" size="50" maxlength="50" name="visit" value="<?php echo $_SESSION['visit'] ?>" class="form-control" placeholder="นัดพบกับคุณ" autocomplete="off">
                        <?php
                        }
                        ?>
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="visit">บริษัท<p style="color:red">*</p></span>
                        <div class="col" id="bt">

                            <!-- <label for="com">บริษัท</label> -->
                            <select id="comem" name="comem">
                                <option value="" disabled selected>--SELECT--</option>
                                <?php
                                $query = mysqli_query($conn, "SELECT `Companyname` FROM `company` ORDER BY `Companycode`");

                                while ($rowdoor = $query->fetch_array()) :
                                ?>
                                    <option value="<?php echo $rowdoor['Companyname'] ?>"><?php echo $rowdoor['Companyname'] ?></option>
                                <?php endwhile ?>
                            </select>
                        </div>
                    </div>
                </div> <br />
            </div>

            <div id="select" style="text-align:center;">
                <div id="datetime" class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class='input-group date' id='datetimepicker1'>
                                <span class="input-group-addon">
                                    <span>เลือกวันนัดพบ</span>
                                    <span style="color: red">*</span>
                                </span>
                                <?php
                                if (empty($_SESSION['date'])) {
                                ?>
                                    <input class="input-group-addon form-control text-center" id="date" name="date">
                                <?php
                                } else {
                                ?>
                                    <input class="input-group-addon form-control text-center" value="<?php echo $_SESSION['date'] ?>" id="date" name="date">
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class='col'>
                            <div class='input-group date' id='datetimepicker2'>
                                <span class="input-group-addon">
                                    <span>เลือกเวลานัดพบ</span>
                                    <span style="color: red">*</span>
                                </span>
                                <?php
                                if (empty($_SESSION['date'])) {
                                ?>
                                    <input class="input-group-addon form-control text-center" id="time" name="time">
                                <?php
                                } else {
                                ?>
                                    <input class="input-group-addon form-control text-center" value="<?php echo $_SESSION['time'] ?>" id="time" name="time">
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
                <br />
            </div>

            <div class="container text-center">
                <div class="row">
                    <div class="col align-self-center">
                        <input type="checkbox" onclick="myFunctionx()"><label for="atk">ตรวจATKแล้ว</label>
                    </div>
                </div>
            </div>

            <div class="container text-center">
                <div class="row">
                    <div class="col align-self-center">
                        <input type='file' id="imgInp" name="img" accept="image/*" /><br />
                        <img id="blah" width="630px" height="900px" />
                    </div>
                </div>
            </div>
            <br />


            <div id="select" style="text-align:center;">
                <button type="submit" id="save" name="save" class="btn btn-primary">save</button>
            </div>
            <br /></br>
        </form>

    <?php
    }

    if (isset($_GET['qr'])) {
    ?>
        <!-- <div id="back" class="col-2">
        <button class="btn btn-danger" onclick="window.location.href='visit.php?Page=1'"><i class="fa fa-arrow-left"></i> ย้อนกลับหน้าแรก</button>
    </div> -->
        <h1 style="text-align:center;">ลงทะเบียนนัดพบ</h1>
        <br />
        <form action="save.php" method="post" enctype="multipart/form-data">
            <div class="container">

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="basic-addon1">ชื่อ-นามสกุล<p style="color:red">*</p></span>
                        <?php
                        if (empty($_SESSION['name'])) {
                        ?>
                            <input type="text" name="fname" class="form-control" placeholder="ชื่อ-นามสกุล" autocomplete="off">
                        <?php
                        } else {
                        ?>
                            <input type="text" name="fname" value="<?php echo $_SESSION['name'] ?>" class="form-control" placeholder="ชื่อ-นามสกุล" autocomplete="off">
                        <?php
                        }
                        ?>
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="com">บริษัท<p style="color:red">*</p></span>
                        <?php
                        if (empty($_SESSION['com'])) {
                        ?>
                            <input type="text" name="com" class="form-control" placeholder="บริษัท" autocomplete="off">
                        <?php
                        } else {
                        ?>
                            <input type="text" name="com" value="<?php echo $_SESSION['com'] ?>" class="form-control" placeholder="บริษัท" autocomplete="off">
                        <?php
                        }
                        ?>
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="phone">เบอร์โทร<p style="color:red">*</p></span>
                        <?php
                        if (empty($_SESSION['phone'])) {
                        ?>
                            <input type="tel" size="10" maxlength="10" name="phone" class="form-control" placeholder="เบอร์โทร" autocomplete="off">
                        <?php
                        } else {
                        ?>
                            <input type="tel" size="10" maxlength="10" name="phone" value="<?php echo $_SESSION['phone'] ?>" class="form-control" placeholder="เบอร์โทร" autocomplete="off">
                        <?php
                        }
                        ?>
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="email">อีเมล<p style="color:red">*</p></span>
                        <?php
                        if (empty($_SESSION['email'])) {
                        ?>
                            <input type="email" size="50" maxlength="50" name="email" class="form-control" placeholder="อีเมล" autocomplete="off">
                        <?php
                        } else {
                        ?>
                            <input type="email" size="50" maxlength="50" name="email" value="<?php echo $_SESSION['email'] ?>" class="form-control" placeholder="อีเมล" autocomplete="off">
                        <?php
                        }
                        ?>
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="visit">นัดพบกับคุณ<p style="color:red">*</p></span>
                        <?php
                        if (empty($_SESSION['visit'])) {
                        ?>
                            <input type="text" size="50" maxlength="50" name="visit" class="form-control" placeholder="นัดพบกับคุณ" autocomplete="off">
                        <?php
                        } else {
                        ?>
                            <input type="text" size="50" maxlength="50" name="visit" value="<?php echo $_SESSION['visit'] ?>" class="form-control" placeholder="นัดพบกับคุณ" autocomplete="off">
                        <?php
                        }
                        ?>
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="visit">บริษัท<p style="color:red">*</p></span>
                        <div class="col" id="bt">
                            <!-- <label for="com">บริษัท</label> -->
                            <select id="comem" name="comem">
                                <option value="" disabled selected>--SELECT--</option>
                                <?php
                                $query = mysqli_query($conn, "SELECT `Companyname` FROM `company` ORDER BY `Companycode`");

                                while ($rowdoor = $query->fetch_array()) :
                                ?>
                                    <option value="<?php echo $rowdoor['Companyname'] ?>"><?php echo $rowdoor['Companyname'] ?></option>
                                <?php endwhile ?>
                            </select>
                        </div>
                    </div>
                </div> <br />

            </div>


            <div id="datetime" class="container text-center">

                <div class="col">
                    <span class="input-group-addon">
                        <span>เลือกวันนัดพบ</span>
                        <span style="color: red">*</span>
                    </span>
                    <?php
                    date_default_timezone_set('Asia/Bangkok');
                    $date_now = date('Y-m-d');
                    $time_now = date('H:i');
                    ?>
                    <input type="date" class="input-group-addon form-control text-center" id="date" name="date" value="<?php echo $date_now; ?>">
                </div>
                <br />
                <div class="col">
                    <span class="input-group-addon">
                        <span>เลือกเวลานัดพบ</span>
                        <span style="color: red">*</span>
                    </span>
                    <input type="time" class="input-group-addon form-control text-center" id="time" name="time" value="<?php echo $time_now; ?>">
                </div>


            </div><br />

            <div class="container text-center">
                <div class="row">
                    <div class="col align-self-center">
                        <input type="checkbox" onclick="myFunctionx()"><label for="atk">ตรวจATKแล้ว</label>
                    </div>
                </div>
            </div>

            <div class="container text-center">
                <div class="row">
                    <div class="col align-self-center">
                        <input type='file' id="imgInp" name="img" accept="image/*" /><br />
                        <img id="blah" width="630px" height="900px" />
                    </div>
                </div>
            </div>
            <br />
            <input type="hidden" name="qr" value="qr">
            <input type="hidden" name="type" value="m">

            <div id="select" style="text-align:center;">
                <button type="submit" id="save" name="save" class="btn btn-primary">save</button>
            </div>
            <br /></br>
        </form>
    <?php
    }

    if (isset($_GET['card'])) {
    ?>
        <?php
        mysqli_query($conn, "DELETE FROM `visit_temp`");
        if ($windows == true || $mac == true) {
        ?>
            <div id="back" class="col-2">
                <button class="btn btn-danger" onclick="window.location.href='visit.php?Page=1'"><i class="fa fa-arrow-left"></i> ย้อนกลับหน้าแรก</button>
            </div>
        <?php
        }
        ?>
        <h1 style="text-align:center;">ลงทะเบียนนัดพบ</h1>
        <br />
        <form action="save.php" method="post" enctype="multipart/form-data">
            <div class="container">

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="basic-addon1">ชื่อ-นามสกุล<p style="color:red">*</p></span>
                        <?php
                        if (!empty($_SESSION['nametemp'])) {
                        ?>
                            <input type="text" maxlength="50" name="fname" class="form-control" placeholder="ชื่อ-นามสกุล" value="<?php echo $_SESSION['nametemp'] ?>" aria-label="ชื่อ-นามสกุล" aria-describedby="basic-addon1" autocomplete="off">
                        <?php
                        } elseif (empty($_SESSION['name'])) {
                        ?>
                            <input type="text" name="fname" class="form-control" placeholder="ชื่อ-นามสกุล" autocomplete="off">
                        <?php
                        } else {
                        ?>
                            <input type="text" name="fname" value="<?php echo $_SESSION['name'] ?>" class="form-control" placeholder="ชื่อ-นามสกุล" autocomplete="off">
                        <?php
                        }
                        ?>

                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="com">บริษัท<p style="color:red">*</p></span>
                        <?php
                        if (empty($_SESSION['com'])) {
                        ?>
                            <input type="text" name="com" class="form-control" placeholder="บริษัท" autocomplete="off">
                        <?php
                        } else {
                        ?>
                            <input type="text" name="com" value="<?php echo $_SESSION['com'] ?>" class="form-control" placeholder="บริษัท" autocomplete="off">
                        <?php
                        }
                        ?>
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="phone">เบอร์โทร<p style="color:red">*</p></span>
                        <?php
                        if (empty($_SESSION['phone'])) {
                        ?>
                            <input type="tel" size="10" maxlength="10" name="phone" class="form-control" placeholder="เบอร์โทร" autocomplete="off">
                        <?php
                        } else {
                        ?>
                            <input type="tel" size="10" maxlength="10" name="phone" value="<?php echo $_SESSION['phone'] ?>" class="form-control" placeholder="เบอร์โทร" autocomplete="off">
                        <?php
                        }
                        ?>
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="email">อีเมล<p style="color:red">*</p></span>
                        <?php
                        if (empty($_SESSION['email'])) {
                        ?>
                            <input type="email" size="50" maxlength="50" name="email" class="form-control" placeholder="อีเมล" autocomplete="off">
                        <?php
                        } else {
                        ?>
                            <input type="email" size="50" maxlength="50" name="email" value="<?php echo $_SESSION['email'] ?>" class="form-control" placeholder="อีเมล" autocomplete="off">
                        <?php
                        }
                        ?>
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="visit">นัดพบกับคุณ<p style="color:red">*</p></span>
                        <?php
                        if (empty($_SESSION['visit'])) {
                        ?>
                            <input type="text" size="50" maxlength="50" name="visit" class="form-control" placeholder="นัดพบกับคุณ" autocomplete="off">
                        <?php
                        } else {
                        ?>
                            <input type="text" size="50" maxlength="50" name="visit" value="<?php echo $_SESSION['visit'] ?>" class="form-control" placeholder="นัดพบกับคุณ" autocomplete="off">
                        <?php
                        }
                        ?>
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="visit">บริษัท<p style="color:red">*</p></span>
                        <div class="col" id="bt">

                            <!-- <label for="com">บริษัท</label> -->
                            <select id="comem" name="comem">
                                <option value="" disabled selected>--SELECT--</option>
                                <?php
                                $query = mysqli_query($conn, "SELECT `Companyname` FROM `company` ORDER BY `Companycode`");

                                while ($rowdoor = $query->fetch_array()) :
                                ?>
                                    <option value="<?php echo $rowdoor['Companyname'] ?>"><?php echo $rowdoor['Companyname'] ?></option>
                                <?php endwhile ?>
                            </select>
                        </div>
                    </div>
                </div> <br />


            </div>
            <div id="select" style="text-align:center;">
                <div id="datetime" class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class='input-group date' id='datetimepicker1'>
                                <span class="input-group-addon">
                                    <span>เลือกวันนัดพบ</span>
                                    <span style="color: red">*</span>
                                </span>
                                <?php
                                if (empty($_SESSION['date'])) {
                                ?>
                                    <input class="input-group-addon form-control text-center" id="date" name="date">
                                <?php
                                } else {
                                ?>
                                    <input class="input-group-addon form-control text-center" value="<?php echo $_SESSION['date'] ?>" id="date" name="date">
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class='col'>
                            <div class='input-group date' id='datetimepicker2'>
                                <span class="input-group-addon">
                                    <span>เลือกเวลานัดพบ</span>
                                    <span style="color: red">*</span>
                                </span>
                                <?php
                                if (empty($_SESSION['date'])) {
                                ?>
                                    <input class="input-group-addon form-control text-center" id="time" name="time">
                                <?php
                                } else {
                                ?>
                                    <input class="input-group-addon form-control text-center" value="<?php echo $_SESSION['time'] ?>" id="time" name="time">
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
                <br />
            </div>

            <div class="container text-center">
                <div class="row">
                    <div class="col align-self-center">
                        <input type="checkbox" onclick="myFunctionx()"><label for="atk">ตรวจATKแล้ว</label>
                    </div>
                </div>
            </div>

            <div class="container text-center">
                <div class="row">
                    <div class="col align-self-center">
                        <input type='file' id="imgInp" name="img" accept="image/*" /><br />
                        <img id="blah" width="630px" height="900px" />
                    </div>
                </div>
            </div>
            <br />

            <div id="select" style="text-align:center;">
                <button type="submit" id="save" name="save" class="btn btn-primary">save</button>
            </div>
            <br /></br>
        </form>
    <?php
    }
    ?>

    <script>
        $(function() {
            $('#datetimepicker1').datetimepicker({
                defaultDate: new Date(),
                format: 'DD/MM/YYYY',
                //sideBySide: true
            });
            $('#datetimepicker2').datetimepicker({
                defaultDate: new Date(),
                format: 'HH:mm',
                //sideBySide: true
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });

        function myFunctionx() {
            var x = document.getElementById("imgInp")
            var y = document.getElementById("blah")

            if (x.style.display === "block") {
                x.style.display = "none";
                y.style.display = "none";
            } else {
                x.style.display = "block";
                y.style.display = "block"
            }
        }
    </script>
</body>

</html>