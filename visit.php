<?php
include_once 'db.php';
session_start();
session_destroy();

date_default_timezone_set('Asia/Bangkok');
$date = date("Y-m-d H:i");

mysqli_query($conn, "UPDATE `card` SET `card_status`='H'");

$Per_Page = 25;   // Per Page
$Page = $_GET["Page"];
if (!$_GET["Page"]) {
    $Page = 1;
}
$Page_Start = (($Per_Page * $Page) - $Per_Page);

$sql = "SELECT * FROM `visit` ORDER BY `time` DESC LIMIT $Page_Start , $Per_Page";
$objQuery = mysqli_query($conn, "SELECT * FROM `visit`");

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

function get_pagination_links($current_page, $total_pages, $url)
{
    $links = "";
    if ($total_pages >= 1 && $current_page <= $total_pages) {
        $links .= "<a href=\"$url?Page=1\">1</a>";
        $i = max(2, $current_page - 3);
        if ($i > 2)
            $links .= " ... ";
        for ($i; $i <= min($current_page + 3, $total_pages); $i++) {
            if ($current_page == $i) {
                $links .=  "<a href=\"$url?Page=$i\"> <b>$i</b> </a>";
            } elseif ($i == $total_pages) {
                continue;
            } else {
                $links .=  "<a href=\"$url?Page=$i\"> $i </a>";
            }
        }
    }

    return $links;
}
$windows = strpos($_SERVER['HTTP_USER_AGENT'], "Windows");
$mac = strpos($_SERVER['HTTP_USER_AGENT'], "Mac");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'], "iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'], "iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'], "Android");
?>
<!DOCTYPE html>
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
    <title>Visit</title>
    <?php
    $windows = strpos($_SERVER['HTTP_USER_AGENT'], "Windows");
    $mac = strpos($_SERVER['HTTP_USER_AGENT'], "Mac");
    ?>

    <style>
        <?php
        if ($windows == true || $mac == true) {
        ?><?php
        }
            ?>table,
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

    <br />
    <?php
    $_SESSION['check'] = '0';
    include_once "headsearch.php";
    ?>
    <div style="text-align:center;">
        <div class="col">
            <?php

            if ($Prev_Page) {
                echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$First_Page'><< First</a> ";
            }

            if ($Prev_Page) {
                echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";
            }

            echo get_pagination_links($Page, $Num_Pages, $_SERVER['SCRIPT_NAME']);

            if ($Page != $Num_Pages) {
                echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";
            }

            if ($Page != $Num_Pages) {
                echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Last_Page'>Last>></a> ";
            }

            ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col align-self-center" id="cen"><br />
                <table>
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
                        $result = mysqli_query($conn, $sql);
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
            </div>
        </div>
    </div><br />
    <div style="text-align:center;">
        <div class="col">
            <?php

            if ($Prev_Page) {
                echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$First_Page'><< First</a> ";
            }

            if ($Prev_Page) {
                echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";
            }

            echo get_pagination_links($Page, $Num_Pages, $_SERVER['SCRIPT_NAME']);

            if ($Page != $Num_Pages) {
                echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";
            }

            if ($Page != $Num_Pages) {
                echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Last_Page'>Last>></a> ";
            }

            ?>
        </div>
    </div><br />
</body>

</html>