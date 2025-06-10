<?php
include_once 'db.php';
/* if (isset($_GET['user'])) {
    $delete = $conn->real_escape_string($_GET['user']);
    $sql = $conn->query("DELETE FROM `employee` WHERE `personid` = '" . $delete . "'");
    if ($sql) {
        echo "<script>";
        echo "window.location.href = 'config.php?config=employee&Page=1'";
        echo "</script>";
    } else {
        echo "ERROR";
    }
} */

if (isset($_GET['visit'])) {
    $delete = $conn->real_escape_string($_GET['visit']);
    $del = $_GET['time'];
    $sql = $conn->query("DELETE FROM `visit` WHERE `name` = '" . $delete . "' AND `time` = '" . $del . "'");
    if ($sql) {
        echo "<script>";
        echo "window.location.href = 'config.php?config=visit&Page=1'";
        echo "</script>";   
    } else {
        echo "ERROR";
    }
}
if (isset($_GET['com'])) {
    $delete = $conn->real_escape_string($_GET['com']);
    $sql = $conn->query("DELETE FROM `company` WHERE `Companyname` = '" . $delete . "'");
    if ($sql) {
        echo "<script>";
        echo "window.location.href = 'config.php?config=com'";
        echo "</script>";   
    } else {
        echo "ERROR";
    }
}
