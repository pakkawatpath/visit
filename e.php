<!doctype html>
<html>

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
    include_once "db.php";

    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['nickname'])) {
        $user = $_POST['id'];
        $name = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $nname = $_POST['nickname'];
        $id = $_POST['id'];

        $sql = "UPDATE `employee` SET `personid` = '$user', `firstname` = '$name', `lastname` = '$lname', `nickname` = '$nname' WHERE `personid` = '$id'";
        mysqli_query($conn, $sql);
        //echo "UPDATE `employee` SET `personid` = '$user', `firstname` = '$name', `lastname` = '$lname', `nickname` = '$nname' WHERE `personid` = '$id'";
        header('location:config.php?config=employee&Page=1');
    }

    if (isset($_POST['name']) && isset($_POST['com']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['employee']) && isset($_POST['date'])) {
        $id = $_POST['id'];
        $old = $_POST['old'];
        $name = $_POST['name'];
        $com = $_POST['com'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $employee = $_POST['employee'];

        $date = $_POST['date'];
        $date = str_replace("/", "-", $date);
        $date = date_create($date);
        $date = date_format($date, 'Y-m-d H:i:s');

        $sql = "UPDATE `visit` SET `name`='$name',`company`='$com',`phone`='$phone',`email`='$email',`employee`='$employee',`time`='$date' WHERE `name`='$id' AND `time`='$old'";
        mysqli_query($conn, $sql);
        echo "<script>";
        echo "Swal.fire('เพิ่มสำเร็จ','','success').then(function() {window.location.href='config=visit&Page=1'})";
        echo "</script>";
    }

    if (isset($_POST['comem'])) {
        $com = $_POST['comem'];
        $old = $_POST['old'];

        mysqli_query($conn, "UPDATE `company` SET `Companyname`='$com' WHERE `Companyname`='$old'");
        echo "<script>";
        echo "Swal.fire('เพิ่มสำเร็จ','','success').then(function() {window.location.href='config.php?config=com'})";
        echo "</script>";
    }
    ?>
</body>

</html>