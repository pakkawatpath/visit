<?php
include_once "db.php";
$fullname = $_POST['fullname'];
$com = $_POST['com'];
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];
$check = $_POST['check'];

if ($check == "some") {
    if (!empty($fullname) && empty($com)) {
        if (!empty($date1)) {
            $query = "SELECT * FROM `visit` WHERE `name` LIKE '%$fullname%' AND `time` BETWEEN '$date1' AND '$date2' ORDER BY `time`";
            $filename = $fullname . '_' . $date1 . '_' . $date2 . '.xls';
        } else {
            $query = "SELECT * FROM `visit` WHERE `name` LIKE '%$fullname%' ORDER BY `time`";
            $filename = $fullname . '.xls';
        }
    } elseif (!empty($com) && empty($fullname)) {
        if (!empty($date1)) {
            $query = "SELECT * FROM `visit` WHERE `company` LIKE '%$com%' AND `time` BETWEEN '$date1' AND '$date2' ORDER BY `time` DESC";
            $filename = $com . '_' . $date1 . '_' . $date2 . '.xls';
        } else {
            $query = "SELECT * FROM `visit` WHERE `company` LIKE '%$com%' ORDER BY `time` DESC";
            $filename = $com . '.xls';
        }
    } elseif (empty($fullname) && empty($com)) {
        $query = "SELECT * FROM `visit` WHERE `time` BETWEEN '$date1' AND '$date2' ORDER BY `time` DESC";
        $filename = $date1 . '_' . $date2 . '.xls';
    } else {
        $query = "SELECT * FROM `visit` WHERE `name` LIKE '%$fullname%' AND `company` LIKE '%$com%' AND `time` BETWEEN '$date1' AND '$date2' ORDER BY `time` DESC";
        $filename = $fullname . '_' . $com . '_' . $date1 . '_' . $date2 . '.xls';
    }
} else {
    $query = "SELECT * FROM `visit` ORDER BY `time` DESC";
    $filename = 'รายชื่อทั้งหมด.xls';
}
header('Content-Type: application/vnd.ms-excel;');
header("Content-Disposition: attachment; filename=\"$filename\";");
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th><b>Name</b></th>
            <th><b>Company</b></th>
            <th><b>Phone</b></th>
            <th><b>Email</b></th>
            <th><b>Employee</b></th>
            <th><b>Company</b></th>
            <th><b>Time</b></th>
        </tr>
        <?php
        $result = mysqli_query($conn, $query);
        while ($row = $result->fetch_array()) : ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['company'] ?></td>
                <td><?php echo "'" . $row['phone'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['employee'] ?></td>
                <td><?php echo $row['com_employee'] ?></td>
                <td><?php echo $row['time'] ?></td>
            </tr>
        <?php
        endwhile;
        ?>
    </table>
</body>

</html>