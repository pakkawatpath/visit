<?php
session_start();
include_once 'db.php';
$fullname = $_GET['fullname'];
$com = $_GET['com'];
$date1 = $_GET['date1'];
$date2 = $_GET['date2'];
$submit = $_GET['submit'];
$Per_Page = 25;   // Per Page
$Page = $_GET["Page"];
$_SESSION['check'] = '1';

if (!empty($fullname) || !empty($com) || !empty($date1)) {

    if (isset($_GET['submit'])) {
        if (!$_GET["Page"]) {
            $Page = 1;
        }
        if (!empty($date1)) {
            $newdate1 = new DateTime(str_replace("/", "-", $date1));
            $date1 = $newdate1->format('Y-m-d H:i:s');
            if (empty($date2)) {
                $date2 = date("Y-m-d") . ' 23:59:59';
            } else {
                $newdate2 = new DateTime(str_replace("/", "-", $date2));
                $date2 = $newdate2->format('Y-m-d H:i:s');
            }
        }
        $Page_Start = (($Per_Page * $Page) - $Per_Page);
        if (!empty($fullname) && empty($com)) {
            if (!empty($date1)) {
                $query = "SELECT * FROM `visit` WHERE `name` LIKE '%$fullname%' AND `time` BETWEEN '$date1' AND '$date2' ORDER BY `time` LIMIT $Page_Start , $Per_Page";
                $objQuery = mysqli_query($conn, "SELECT * FROM `visit` WHERE `name` LIKE '%$fullname%' AND `time` BETWEEN '$date1' AND '$date2'");
            } else {
                $query = "SELECT * FROM `visit` WHERE `name` LIKE '%$fullname%' ORDER BY `time` LIMIT $Page_Start , $Per_Page";
                $objQuery = mysqli_query($conn, "SELECT * FROM `visit` WHERE `name` LIKE '%$fullname%'");
            }
            //echo $query;
        } elseif (!empty($com) && empty($fullname)) {
            if (!empty($date1)) {
                $query = "SELECT * FROM `visit` WHERE `company` LIKE '%$com%' AND `time` BETWEEN '$date1' AND '$date2' ORDER BY `time` LIMIT $Page_Start , $Per_Page";
                $objQuery = mysqli_query($conn, "SELECT * FROM `visit` WHERE `name` LIKE '%$fullname%' AND `time` BETWEEN '$date1' AND '$date2'");
            } else {
                $query = "SELECT * FROM `visit` WHERE `company` LIKE '%$com%' ORDER BY `time` LIMIT $Page_Start , $Per_Page";
                $objQuery = mysqli_query($conn, "SELECT * FROM `visit` WHERE `name` LIKE '%$fullname%'");
            }
        } elseif (empty($fullname) && empty($com)) {
            $query = "SELECT * FROM `visit` WHERE `time` BETWEEN '$date1' AND '$date2' ORDER BY `time` LIMIT $Page_Start , $Per_Page";
            $objQuery = mysqli_query($conn, "SELECT * FROM `visit` WHERE `time` BETWEEN '$date1' AND '$date2'");
        } else {
            $query = "SELECT * FROM `visit` WHERE `name` LIKE '%$fullname%' AND `company` LIKE '%$com%' AND `time` BETWEEN '$date1' AND '$date2' ORDER BY `time` LIMIT $Page_Start , $Per_Page";
            $objQuery = mysqli_query($conn, "SELECT * FROM `visit` WHERE `name` LIKE '%$fullname%' AND `company` LIKE '%$com%' AND `time` BETWEEN '$date1' AND '$date2'");
        }
    }

    $Num_Rows = mysqli_num_rows($objQuery);

    if ($Num_Rows <= $Per_Page) {
        $Num_Pages = 1;
    } else if (($Num_Rows % $Per_Page) == 0) {
        $Num_Pages = ($Num_Rows / $Per_Page);
    } else {
        $Num_Pages = ($Num_Rows / $Per_Page) + 1;
        $Num_Pages = (int)$Num_Pages;
    }

    $First_Page = min(1, $Page);
    $Prev_Page = $Page - 1;
    $Next_Page = $Page + 1;
    $Last_Page = max($Num_Pages, $Page);

    function get_pagination_links($current_page, $total_pages, $url, $fullname, $com, $submit)
    {
        $links = "";
        if ($total_pages >= 1 && $current_page <= $total_pages) {
            $links .= "<a href=\"$url?Page=1&fullname=$fullname&com=$com&submit=$submit\">1</a>";
            $i = max(2, $current_page - 3);
            if ($i > 2)
                $links .= " ... ";
            for ($i; $i <= min($current_page + 3, $total_pages); $i++) {
                if ($current_page == $i) {
                    $links .=  "<a href=\"$url?Page=$i&fullname=$fullname&com=$com&submit=$submit\"> <b>$i</b> </a>";
                } else {
                    $links .=  "<a href=\"$url?Page=$i&fullname=$fullname&com=$com&submit=$submit\"> $i </a>";
                }
            }
        }
        return $links;
    }
}
?>

<!doctype html>
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

    <title>ค้นหา</title>

    <style>
        table,
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
    <?php
    include_once "headsearch.php";
    ?>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-2">

                <form action="download.php" method="post">
                    <input type="hidden" name="fullname" value="<?php echo $fullname ?>">
                    <input type="hidden" name="com" value="<?php echo $com ?>">
                    <input type="hidden" name="date1" value="<?php echo $date1 ?>">
                    <input type="hidden" name="date2" value="<?php echo $date2 ?>">
                    <input type="hidden" name="check" value="some">
                    <button name="down" class="btn btn-outline-success"><i class="fas fa-download"></i> Download</button>
                </form>

            </div>
            <div class="col-2">
                <button class="btn btn-outline-danger" onclick="window.location.href='visit.php?Page=1'"><i class="fas fa-undo"></i> ล้างการค้นหา</button>
            </div>
        </div>
    </div>
    <div class="container">
        <?php
        if (!empty($fullname) || !empty($com) || !empty($date1)) {
        ?>

            <br />
            <div style="text-align:center;">
                <div class="col">
                    <?php
                    if ($Prev_Page) {
                        echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$First_Page&fullname=$fullname&com=$com&submit=$submit'><< First</a> ";
                    }

                    if ($Prev_Page) {
                        echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&fullname=$fullname&com=$com&submit=$submit'><< Back</a> ";
                    }

                    echo get_pagination_links($Page, $Num_Pages, $_SERVER['SCRIPT_NAME'], $fullname, $com, $submit);

                    if ($Page != $Num_Pages) {
                        echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&fullname=$fullname&com=$com&submit=$submit'>Next>></a> ";
                    }

                    if ($Page != $Num_Pages) {
                        echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Last_Page&fullname=$fullname&com=$com&submit=$submit'>Last>></a> ";
                    }
                    ?>
                </div>
            </div><br />
            <table border='1'>
                <thead>
                    <tr>
                        <th width="10%" class="text-center">ชื่อ</th>
                        <th width="10%" class="text-center">บริษัท</th>
                        <th width="10%" class="text-center">เบอร์โทรศัพท์</th>
                        <th width="10%" class="text-center">อีเมล</th>
                        <th width="10%" class="text-center">พนักงานที่นัดพบ</th>
                        <th width="10%" class="text-center">บริษัทที่นัดพบ</th>
                        <th width="10%" class="text-center">วัน-เวลานัดพบ</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $result = mysqli_query($conn, $query);
                    while ($row = $result->fetch_array()) :
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $row['name']; ?></td>
                            <td class="text-center"><?php echo $row['company']; ?></td>
                            <td class="text-center"><?php echo $row['phone'] ?></td>
                            <td class="text-center"><?php echo $row['email']; ?></td>
                            <td class="text-center"><?php echo $row['employee']; ?></td>
                            <td class="text-center"><?php echo $row['com_employee'] ?></td>
                            <td class="text-center"><?php echo $row['time']; ?></td>
                        </tr>
                    <?php
                    endwhile;
                    ?>

                </tbody>
            </table>
    </div><br />
    <div style="text-align:center;">
        <div class="col">
            <?php
            if ($Prev_Page) {
                echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$First_Page&fullname=$fullname&com=$com&submit=$submit'><< First</a> ";
            }

            if ($Prev_Page) {
                echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&fullname=$fullname&com=$com&submit=$submit'><< Back</a> ";
            }

            echo get_pagination_links($Page, $Num_Pages, $_SERVER['SCRIPT_NAME'], $fullname, $com, $submit);

            if ($Page != $Num_Pages) {
                echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&fullname=$fullname&com=$com&submit=$submit'>Next>></a> ";
            }

            if ($Page != $Num_Pages) {
                echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Last_Page&fullname=$fullname&com=$com&submit=$submit'>Last>></a> ";
            }
            ?>
        </div>
    </div><br />

<?php
        }


?>
</body>

</html>