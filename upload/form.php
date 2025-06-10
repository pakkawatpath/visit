<?php
include_once 'db.php';
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
        <form action="" method="post" enctype="multipart/form-data">
            <div class="container">

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="basic-addon1">ชื่อ-นามสกุล<p style="color:red">*</p></span>
                        <input type="text" maxlength="50" name="fname" class="form-control" placeholder="ชื่อ-นามสกุล" aria-label="ชื่อ-นามสกุล" aria-describedby="basic-addon1" required autocomplete="off">
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="com">บริษัท<p style="color:red">*</p></span>
                        <input type="text" size="50" maxlength="50" name="com" class="form-control" placeholder="บริษัท" aria-label="บริษัท" aria-describedby="com" required autocomplete="off">
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="phone">เบอร์โทร<p style="color:red">*</p></span>
                        <input type="tel" size="10" maxlength="10" name="phone" class="form-control" placeholder="เบอร์โทร" aria-label="เบอร์โทร" aria-describedby="phone" required autocomplete="off">
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="email">อีเมล<p style="color:red">*</p></span>
                        <input type="email" size="50" maxlength="50" name="email" class="form-control" placeholder="อีเมล" aria-label="อีเมล" aria-describedby="email" required autocomplete="off">
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="visit">นัดพบกับคุณ<p style="color:red">*</p></span>
                        <input type="text" size="50" maxlength="50" name="visit" class="form-control" placeholder="นัดพบกับคุณ" aria-label="นัดพบกับคุณ" aria-describedby="visit" required autocomplete="off">
                    </div>
                </div><br />
                <?php
                if ($windows == true || $mac == true) {
                ?>
                    <input type="hidden" name="win" value="win">
                <?php
                }
                if ($iPhone == true || $iPad == true || $Android == true) {
                ?>
                    <input type="hidden" name="mo" value="mo">
                <?php
                }
                ?>


            </div>
            <div id="select" style="text-align:center;">
                <div id="datetime" class="container text-center">
                    <div class="row">
                        <div class='col align-self-center'>
                            <div class='input-group date' id='datetimepicker1'>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar">เลือกวัน-เวลานัดพบ</span>
                                    <span style="color: red">*</span>
                                </span>
                                <input type='text' class="input-group-addon form-control text-center" id="date" name="date" required>
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
        <form action="" method="post" enctype="multipart/form-data">
            <div class="container">

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="basic-addon1">ชื่อ-นามสกุล<p style="color:red">*</p></span>
                        <input type="text" maxlength="50" name="fname" class="form-control" placeholder="ชื่อ-นามสกุล" aria-label="ชื่อ-นามสกุล" aria-describedby="basic-addon1" required autocomplete="off">
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="com">บริษัท<p style="color:red">*</p></span>
                        <input type="text" size="50" maxlength="50" name="com" class="form-control" placeholder="บริษัท" aria-label="บริษัท" aria-describedby="com" required autocomplete="off">
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="phone">เบอร์โทร<p style="color:red">*</p></span>
                        <input type="tel" size="10" maxlength="10" name="phone" class="form-control" placeholder="เบอร์โทร" aria-label="เบอร์โทร" aria-describedby="phone" required autocomplete="off">
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="email">อีเมล<p style="color:red">*</p></span>
                        <input type="email" size="50" maxlength="50" name="email" class="form-control" placeholder="อีเมล" aria-label="อีเมล" aria-describedby="email" required autocomplete="off">
                    </div>
                </div><br />

                <div class="row">
                    <div class="col align-self-center">
                        <span class="input-group-text" id="visit">นัดพบกับคุณ<p style="color:red">*</p></span>
                        <input type="text" size="50" maxlength="50" name="visit" class="form-control" placeholder="นัดพบกับคุณ" aria-label="นัดพบกับคุณ" aria-describedby="visit" required autocomplete="off">
                    </div>
                </div><br />


            </div>
            <div id="select" style="text-align:center;">
                <div id="datetime" class="container text-center">
                    <div class="row">
                        <div class='col align-self-center'>
                            <div class='input-group date' id='datetimepicker1'>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar">เลือกวัน-เวลานัดพบ</span>
                                    <span style="color: red">*</span>
                                </span>
                                <input type='text' class="input-group-addon form-control text-center" id="date" name="date" required>
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
                format: 'DD/MM/YYYY HH:mm',
                sideBySide: true
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

<?php
if (isset($_POST['save'])) {
    $name = $_POST['fname'];
    $com = $_POST['com'];
    $email = $_POST['email'];
    $visit = $_POST['visit'];
    $phone = $_POST["phone"];
    $win = $_POST["win"];
    $mo = $_POST["mo"];
    $datex = new Datetime(str_replace("/", "-", $_POST['date']));
    $date = $datex->format('Y-m-d H:i:s');
    $y = $datex->format('Y');
    $m = $datex->format('m');
    $d = $datex->format('d');

    date_default_timezone_set('Asia/Bangkok');
    $y_now = date('y');
    $m_now = date('m');
    $d_now = date('d');

    if ($y > $y_now) {
        if ($m > $m_now || $d > $d_now) {
            $windows = strpos($_SERVER['HTTP_USER_AGENT'], "Windows");
            $mac = strpos($_SERVER['HTTP_USER_AGENT'], "Mac");
            $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
            $iPad    = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
            $Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
            if ($mac == true || $windows == true) {
                if ($_FILES["img"]["name"] != "") {
                    $fp = fopen($_FILES["img"]["tmp_name"], "r");
                    $readbinary = fread($fp, filesize($_FILES["img"]["tmp_name"]));
                    fclose($fp);
                    $filedata = addslashes($readbinary);
                    mysqli_query($conn, "INSERT INTO `visit`(`name`, `company`, `phone`, `email`, `employee`, `time`, `image`) VALUES ('$name','$com','$phone','$email','$visit','$date','$filedata')");
                    if ($win == true) {
                        echo "<script>";
                        echo "window.location.href='visit.php?Page=1'";
                        echo "</script>";
                    }
                    if ($mo == true) {
                        echo "<script>";
                        echo "window.location.href='form.php?qr'";
                        echo "</script>";
                    }
                } else {
                    mysqli_query($conn, "INSERT INTO `visit`(`name`, `company`, `phone`, `email`, `employee`, `time`) VALUES ('$name','$com','$phone','$email','$visit','$date')");
                    if ($win == true) {
                        echo "<script>";
                        echo "window.location.href='visit.php?Page=1'";
                        echo "</script>";
                    }
                    if ($mo == true) {
                        echo "<script>";
                        echo "window.location.href='form.php?qr'";
                        echo "</script>";
                    }
                }
            } elseif ($Android == true || $iPhone == true || $iPad == true) {
                if ($_FILES["img"]["name"] != "") {

                    /* if (is_array($_FILES)) {

                        $file = $_FILES['img']['tmp_name'];
                        $sourceProperties = getimagesize($file);
                        $fileNewName = time();
                        $folderPath = "upload/";
                        $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
                        $imageType = $sourceProperties[2];

                        switch ($imageType) {
                            case IMAGETYPE_PNG:
                                $imageResourceId = imagecreatefrompng($file);
                                $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                                $new_images = imagepng($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);
                                break;

                            case IMAGETYPE_GIF:
                                $imageResourceId = imagecreatefromgif($file);
                                $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                                $new_images = imagegif($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);
                                break;

                            case IMAGETYPE_JPEG:
                                $imageResourceId = imagecreatefromjpeg($file);
                                $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                                $new_images = imagejpeg($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);
                                break;

                            default:
                                echo "Invalid Image type.";
                                exit;
                                break;
                        }

                        move_uploaded_file($file, $folderPath . $fileNewName . "." . $ext);
                        echo "Image Resize Successfully.";
                    } */
                    $fp = fopen($_FILES["img"]["tmp_name"], "r");
                    $readbinary = fread($fp, filesize($_FILES["img"]["tmp_name"]));
                    fclose($fp);
                    $filedata = addslashes($readbinary);
                    mysqli_query($conn, "INSERT INTO `visit`(`name`, `company`, `phone`, `email`, `employee`, `time`, `image`) VALUES ('$name','$com','$phone','$email','$visit','$date','$filedata')");
                    if ($win == true) {
                        echo "<script>";
                        echo "window.location.href='visit.php?Page=1'";
                        echo "</script>";
                    }
                    if ($mo == true) {
                        echo "<script>";
                        echo "window.location.href='form.php?qr'";
                        echo "</script>";
                    }
                } else {
                    mysqli_query($conn, "INSERT INTO `visit`(`name`, `company`, `phone`, `email`, `employee`, `time`) VALUES ('$name','$com','$phone','$email','$visit','$date')");
                    if ($win == true) {
                        echo "<script>";
                        echo "window.location.href='visit.php?Page=1'";
                        echo "</script>";
                    }
                    if ($mo == true) {
                        echo "<script>";
                        echo "window.location.href='form.php?qr'";
                        echo "</script>";
                    }
                }
            }
        } else {
            echo "<script>";
            echo "alert('ใส่วัน/เดือน/ปีไม่ถูกต้อง หรือเวลาไม่ถูกต้อง');";
            echo "history.back()";
            echo "</script>";
        }
    } else {
        echo "<script>";
        echo "alert('ใส่วัน/เดือน/ปีไม่ถูกต้อง หรือเวลาไม่ถูกต้อง');";
        echo "history.back()";
        echo "</script>";
    }
}

/* function imageResize($imageResourceId, $width, $height)
{

    $targetWidth = 200;
    $targetHeight = 200;

    $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
    imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);

    return $targetLayer;
} */
?>