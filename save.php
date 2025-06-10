<?php session_start(); ?>
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
</head>

<body>
    <?php
    include_once 'db.php';
    error_reporting(E_ERROR | E_PARSE);

    if (isset($_POST['save'])) {
        $name = $_POST['fname'];
        $com = $_POST['com'];
        $email = $_POST['email'];
        $visit = $_POST['visit'];
        $phone = $_POST["phone"];
        $comem = $_POST['comem'];
        $datez = $_POST['date'];
        $timez = $_POST['time'];
        $qr = $_POST['qr'];
        $datetime = str_replace("/", "-", $_POST['date']) . " " . $_POST['time'];
        $date1 = new Datetime($datetime);
        $datey = $date1->format('Y-m-d H:i:s');
        $date = $date1->format('y-m-d');
        $time = $date1->format('H:i');

        date_default_timezone_set('Asia/Bangkok');
        $date_now = date('y-m-d');
        $time_now = date('H:i');

        $windows = strpos($_SERVER['HTTP_USER_AGENT'], "Windows");
        $mac = strpos($_SERVER['HTTP_USER_AGENT'], "Mac");
        $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
        $iPad    = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
        $Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");


        if (!empty($_SESSION['nametemp'])) {
            $type = 'C';
        } else {
            $type = 'W';
        }

        if (empty($name)) {
            $_SESSION['name'] = $name;
            $_SESSION['com'] = $com;
            $_SESSION['email'] = $email;
            $_SESSION['visit'] = $visit;
            $_SESSION['phone'] = $phone;
            $_SESSION['date'] = $datez;
            $_SESSION['time'] = $timez;
            echo "<script>";
            echo "Swal.fire('โปรดใส่ชื่อ-นามสกุล','','error').then(function() {history.back()})";
            echo "</script>";
        } elseif (empty($com)) {
            $_SESSION['name'] = $name;
            $_SESSION['com'] = $com;
            $_SESSION['email'] = $email;
            $_SESSION['visit'] = $visit;
            $_SESSION['phone'] = $phone;
            $_SESSION['date'] = $datez;
            $_SESSION['time'] = $timez;
            echo "<script>";
            echo "Swal.fire('โปรดใส่ชื่อบริษัทของท่าน','','error').then(function() {history.back()})";
            echo "</script>";
        } elseif (empty($email)) {
            $_SESSION['name'] = $name;
            $_SESSION['com'] = $com;
            $_SESSION['email'] = $email;
            $_SESSION['visit'] = $visit;
            $_SESSION['phone'] = $phone;
            $_SESSION['date'] = $datez;
            $_SESSION['time'] = $timez;
            echo "<script>";
            echo "Swal.fire('โปรดใส่อีเมลของท่าน','','error').then(function() {history.back()})";
            echo "</script>";
        } elseif (empty($visit)) {
            $_SESSION['name'] = $name;
            $_SESSION['com'] = $com;
            $_SESSION['email'] = $email;
            $_SESSION['visit'] = $visit;
            $_SESSION['phone'] = $phone;
            $_SESSION['date'] = $datez;
            $_SESSION['time'] = $timez;
            echo "<script>";
            echo "Swal.fire('โปรดใส่ชื่อผู้ที่ท่านต้องการพบ','','error').then(function() {history.back()})";
            echo "</script>";
        } elseif (empty($phone)) {
            $_SESSION['name'] = $name;
            $_SESSION['com'] = $com;
            $_SESSION['email'] = $email;
            $_SESSION['visit'] = $visit;
            $_SESSION['phone'] = $phone;
            $_SESSION['date'] = $datez;
            $_SESSION['time'] = $timez;
            echo "<script>";
            echo "Swal.fire('โปรดใส่เบอร์โทรของท่าน','','error').then(function() {history.back()})";
            echo "</script>";
        } elseif (empty($comem)) {
            $_SESSION['name'] = $name;
            $_SESSION['com'] = $com;
            $_SESSION['email'] = $email;
            $_SESSION['visit'] = $visit;
            $_SESSION['phone'] = $phone;
            $_SESSION['date'] = $datez;
            $_SESSION['time'] = $timez;
            echo "<script>";
            echo "Swal.fire('โปรดเลือกบริษัทของผู้ที่ท่านต้องการพบ','','error').then(function() {history.back()})";
            echo "</script>";
        } elseif ($date > $date_now) {
            if ($qr == '') {
                if ($_FILES["img"]["name"] != "") {
                    $fp = fopen($_FILES["img"]["tmp_name"], "r");
                    $readbinary = fread($fp, filesize($_FILES["img"]["tmp_name"]));
                    fclose($fp);
                    $filedata = addslashes($readbinary);
                    mysqli_query($conn, "INSERT INTO `visit`(`name`, `company`, `phone`, `email`, `employee`, `com_employee`, `time`, `image`, `data_type`) VALUES ('$name','$com','$phone','$email','$visit','$comem','$datey','$filedata','$type')");
                    echo "<script>";
                    echo "Swal.fire('ลงทะเบียนสำเร็จ','','success').then(function() {window.location.href='visit.php?Page=1'})";
                    echo "</script>";
                } else {
                    mysqli_query($conn, "INSERT INTO `visit`(`name`, `company`, `phone`, `email`, `employee`, `com_employee`, `time`, `data_type`) VALUES ('$name','$com','$phone','$email','$visit', '$comem', '$datey', '$type')");
                    echo "<script>";
                    echo "Swal.fire('ลงทะเบียนสำเร็จ','','success').then(function() {window.location.href='visit.php?Page=1'})";
                    echo "</script>";
                }
            } elseif ($qr == 'qr') {
                if ($_FILES["img"]["name"] != "") {
                    $fp = fopen($_FILES["img"]["tmp_name"], "r");
                    $readbinary = fread($fp, filesize($_FILES["img"]["tmp_name"]));
                    fclose($fp);
                    $filedata = addslashes($readbinary);
                    mysqli_query($conn, "INSERT INTO `visit`(`name`, `company`, `phone`, `email`, `employee`, `com_employee`, `time`, `image`, `data_type`) VALUES ('$name','$com','$phone','$email','$visit','$comem','$datey','$filedata','$type')");
                    session_destroy();
    ?>
                    <script>
                        Swal.fire({
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            title: 'ลงทะเบียนเรียบร้อย',
                            icon: 'success'
                        })
                    </script>
                <?php
                } else {
                    mysqli_query($conn, "INSERT INTO `visit`(`name`, `company`, `phone`, `email`, `employee`, `com_employee`, `time`, `data_type`) VALUES ('$name','$com','$phone','$email','$visit','$comem','$datey','$type')");
                    session_destroy();
                ?>
                    <script>
                        Swal.fire({
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            title: 'ลงทะเบียนเรียบร้อย',
                            icon: 'success'
                        })
                    </script>
                <?php
                }
            }
        } elseif ($date == $date_now) {
            // if ($time >= $time_now) {
            $windows = strpos($_SERVER['HTTP_USER_AGENT'], "Windows");
            $mac = strpos($_SERVER['HTTP_USER_AGENT'], "Mac");
            $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
            $iPad    = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
            $Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
            if ($qr == '') {
                if ($_FILES["img"]["name"] != "") {
                    $fp = fopen($_FILES["img"]["tmp_name"], "r");
                    $readbinary = fread($fp, filesize($_FILES["img"]["tmp_name"]));
                    fclose($fp);
                    $filedata = addslashes($readbinary);
                    mysqli_query($conn, "INSERT INTO `visit`(`name`, `company`, `phone`, `email`, `employee`, `com_employee`, `time`, `image`, `data_type`) VALUES ('$name','$com','$phone','$email','$visit','$comem','$datey','$filedata','$type')");
                    echo "<script>";
                    echo "Swal.fire('ลงทะเบียนสำเร็จ','','success').then(function() {window.location.href='visit.php?Page=1'})";
                    echo "</script>";
                } else {
                    mysqli_query($conn, "INSERT INTO `visit`(`name`, `company`, `phone`, `email`, `employee`, `com_employee`, `time`, `data_type`) VALUES ('$name','$com','$phone','$email','$visit','$comem','$datey', '$type')");
                    echo "<script>";
                    echo "Swal.fire('ลงทะเบียนสำเร็จ','','success').then(function() {window.location.href='visit.php?Page=1'})";
                    echo "</script>";
                }
            } elseif ($qr == 'qr') {
                if ($_FILES["img"]["name"] != "") {
                    $fp = fopen($_FILES["img"]["tmp_name"], "r");
                    $readbinary = fread($fp, filesize($_FILES["img"]["tmp_name"]));
                    fclose($fp);
                    $filedata = addslashes($readbinary);
                    mysqli_query($conn, "INSERT INTO `visit`(`name`, `company`, `phone`, `email`, `employee`, `com_employee`, `time`, `image`, `data_type`) VALUES ('$name','$com','$phone','$email','$visit','$comem','$datey','$filedata','$type')");
                    session_destroy();
                ?>
                    <script>
                        Swal.fire({
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            title: 'ลงทะเบียนเรียบร้อย',
                            icon: 'success'
                        })
                    </script>
                <?php
                } else {
                    mysqli_query($conn, "INSERT INTO `visit`(`name`, `company`, `phone`, `email`, `employee`, `com_employee`, `time`, `data_type`) VALUES ('$name','$com','$phone','$email','$visit','$comem','$datey','$type')");
                    session_destroy();
                ?>
                    <script>
                        Swal.fire({
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            title: 'ลงทะเบียนเรียบร้อย',
                            icon: 'success'
                        })
                    </script>
    <?php
                }
            }
            // } else {
            //     if ($mac == true || $windows == true) {
            //         $_SESSION['name'] = $name;
            //         $_SESSION['com'] = $com;
            //         $_SESSION['email'] = $email;
            //         $_SESSION['visit'] = $visit;
            //         $_SESSION['phone'] = $phone;
            //         $_SESSION['date'] = $datez;
            //         $_SESSION['time'] = $timez;
            //         echo "<script>";
            //         echo "Swal.fire('ใส่วัน/เดือน/ปีไม่ถูกต้อง หรือเวลาไม่ถูกต้อง','','error').then(function() {window.location.href='form.php?admin'})";
            //         echo "</script>";
            //     } elseif ($Android == true || $iPhone == true || $iPad == true) {
            //         $_SESSION['name'] = $name;
            //         $_SESSION['com'] = $com;
            //         $_SESSION['email'] = $email;
            //         $_SESSION['visit'] = $visit;
            //         $_SESSION['phone'] = $phone;
            //         $_SESSION['date'] = $datez;
            //         $_SESSION['time'] = $timez;
            //         echo "<script>";
            //         echo "Swal.fire('ใส่วัน/เดือน/ปีไม่ถูกต้อง หรือเวลาไม่ถูกต้อง','','error').then(function() {window.location.href='form.php?qr'})";
            //         echo "</script>";
            //     }
            // }
        } else {
            if ($mac == true || $windows == true) {
                $_SESSION['name'] = $name;
                $_SESSION['com'] = $com;
                $_SESSION['email'] = $email;
                $_SESSION['visit'] = $visit;
                $_SESSION['phone'] = $phone;
                $_SESSION['date'] = $datez;
                $_SESSION['time'] = $timez;
                echo "<script>";
                echo "Swal.fire('ใส่วัน/เดือน/ปีไม่ถูกต้อง หรือเวลาไม่ถูกต้อง','','error').then(function() {window.location.href='form.php?admin'})";
                echo "</script>";
            } elseif ($Android == true || $iPhone == true || $iPad == true) {
                $_SESSION['name'] = $name;
                $_SESSION['com'] = $com;
                $_SESSION['email'] = $email;
                $_SESSION['visit'] = $visit;
                $_SESSION['phone'] = $phone;
                $_SESSION['date'] = $datez;
                $_SESSION['time'] = $timez;
                echo "<script>";
                echo "Swal.fire('ใส่วัน/เดือน/ปีไม่ถูกต้อง หรือเวลาไม่ถูกต้อง','','error').then(function() {window.location.href='form.php?qr'})";
                echo "</script>";
            }
        }
    }
    ?>
</body>

</html>