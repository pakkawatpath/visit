<?php
session_start();
include_once 'db.php';
$fullname = $_GET['fullname'];
/* $time1 = $_GET['from'];
$time2 = $_GET['to']; */
$com = $_GET['com'];
$submit = $_GET['submit'];
$Per_Page = 25;   // Per Page
$Page = $_GET["Page"];

if (!$_SESSION["UserID"]) {
    header("Location: index.php");
} else {
    $user = $_SESSION["UserID"];
    $level = $_SESSION["Level"];
    if (!empty($fullname) || !empty($com)) {

        if (isset($_GET['submit'])) {
            if (!$_GET["Page"]) {
                $Page = 1;
            }
            $Page_Start = (($Per_Page * $Page) - $Per_Page);
            if (!empty($fullname) && empty($com)) {
                $query = "SELECT * FROM `visit` WHERE `name` LIKE '%$fullname%' ORDER BY `time` LIMIT $Page_Start , $Per_Page";
                $objQuery = mysqli_query($conn, "SELECT * FROM `visit` WHERE `name` LIKE '$fullname%'");
            } elseif (!empty($com) && empty($fullname)) {
                $query = "SELECT * FROM `visit` WHERE `company` LIKE '%$com%' ORDER BY `time` LIMIT $Page_Start , $Per_Page";
                $objQuery = mysqli_query($conn, "SELECT * FROM `visit` WHERE `name` LIKE '$fullname%'");
            } else {
                $query = "SELECT * FROM `visit` WHERE `name` LIKE '%$fullname%' AND `company` LIKE '%$com%'  ORDER BY `time` LIMIT $Page_Start , $Per_Page";
                $objQuery = mysqli_query($conn, "SELECT * FROM `visit` WHERE `name` LIKE '$fullname%' AND `company` LIKE '$com%'");
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

            #down {
                margin-left: 580px;
            }
        </style>


    </head>

    <body>
        <?php
        include_once "headcon.php";
        ?><br />
        <div class="col" id="down">
            <button class="btn btn-outline-danger" onclick="window.location.href = 'config.php?config=visit&Page=1'"><i class="fas fa-undo"></i> ล้างการค้นหา</button>
        </div>
        <div class="container">
            <?php
            if (!empty($fullname) || !empty($com)) {
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
                </div><br/>
                <table border='1'>
                    <thead>
                        <tr>
                            <th width="10%" class="text-center" >แก้ไข</th>
                            <th width="10%" class="text-center">ลบ</th>
                            <th width="10%" class="text-center">ชื่อ</th>
                            <th width="10%" class="text-center">บริษัท</th>
                            <th width="10%" class="text-center">เบอร์โทรศัพท์</th>
                            <th width="10%" class="text-center">อีเมล</th>
                            <th width="10%" class="text-center">พนักงานที่นัดพบ</th>
                            <th width="10%" class="text-center">วัน-เวลานัดพบ</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $result = mysqli_query($conn, $query);
                        while ($row = $result->fetch_array()) :
                        ?>
                            <tr>
                                <td class="text-center" width="1%"><a href='edit.php?visit=<?php echo $row['name'] ?>&time=<?php echo $row['time'] ?>'><img src='icon/edit.gif' /></button></a></td>
                                <td class="text-center" width="1%"><a href='del.php?visit=<?php echo $row['name'] ?>&time=<?php echo $row['time'] ?>' onclick="return confirm('ต้องการลบหรือไม่')"><img src='icon/delete.gif' /></a></td>
                                <td class="text-center"><?php echo $row['name']; ?></td>
                                <td class="text-center"><?php echo $row['company']; ?></td>
                                <td class="text-center"><?php echo $row['phone'] ?></td>
                                <td class="text-center"><?php echo $row['email']; ?></td>
                                <td class="text-center"><?php echo $row['employee']; ?></td>
                                <td class="text-center"><?php echo $row['time']; ?></td>
                            </tr>
                        <?php
                        endwhile;
                        ?>

                    </tbody>
                </table>
        </div><br/>
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
        }

?>
    </body>

    </html>