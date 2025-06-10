<?php
include_once "db.php";
session_start();
$config = $_GET['config'];

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

    <title>Config</title>

    <style>
        #back {
            margin-top: 10px;
            margin-left: 10px;
        }

        table.center {
            margin-left: auto;
            margin-right: auto;
        }

        select {
            width: 250px;
            text-align: center;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>

    <?php
    include_once "headcon.php";
    ?>
    <br />
    <?php
    /* if ($config == "employee") {
            $Per_Page = 25;   // Per Page
            $Page = $_GET["Page"];
            if (!$_GET["Page"]) {
                $Page = 1;
            }
            $Page_Start = (($Per_Page * $Page) - $Per_Page);
            $sqldbs = "SELECT * FROM `employee` LIMIT $Page_Start , $Per_Page";
            $objQuery = mysqli_query($conn, "SELECT * FROM `employee`");
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
                    $links .= "<a href=\"$url?config=employee&Page=1\">1</a>";
                    $i = max(2, $current_page - 3);
                    if ($i > 2)
                        $links .= " ... ";
                    for ($i; $i <= min($current_page + 3, $total_pages); $i++) {
                        if ($current_page == $i) {
                            $links .=  "<a href=\"$url?config=employee&Page=$i\"> <b>$i</b> </a>";
                        } elseif ($i == $total_pages) {
                            continue;
                        } else {
                            $links .=  "<a href=\"$url?config=employee&Page=$i\"> $i </a>";
                        }
                    }
                }
                return $links;
            }
        ?>
            <br />
            <form action="" method="post" class="container text-center">
                <label for="new">เพิ่มพนักงาน</label>
                <select id="new" name="new">
                    <option value="" disabled selected>--SELECT--</option>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM `newemployee` WHERE `personid` NOT IN (SELECT `personid` FROM `employee`) ORDER BY `personid`");
                    while ($rowdbs = $query->fetch_array()) :
                    ?>
                        <option value="<?php echo $rowdbs['personid'] ?>"><?php echo $rowdbs['personid'] . " " . $rowdbs['firstname'] . " " . $rowdbs['lastname'] . " " . $rowdbs['nickname'] ?></option>
                    <?php
                    endwhile
                    ?>
                </select>
                <button type="submit" id="save" class="btn btn-primary"><img src='icon/plus.png' style="margin-bottom: 1px" /> เพิ่ม</button>
            </form>
            <br />


            <table border="1" width='80%' class="center">

                <thead>

                    <tr>
                        <th class="text-center" width="5%">แก้ไข</th>
                        <th class="text-center" width="5%">ลบ</th>
                        <th class="text-center" width="10%">รหัสพนักงาน</th>
                        <th class="text-center" width="20%">ชื่อ</th>
                        <th class="text-center" width="20%">นามสกุล</th>
                        <th class="text-center" width="10%">ชื่อเล่น</th>
                    </tr>
                </thead>
                <div style="text-align:center;">
                    <div class="col">
                        <?php

                        if ($Prev_Page) {
                            echo " <a href='$_SERVER[SCRIPT_NAME]?config=employee&Page=$First_Page'><< First</a> ";
                        }

                        if ($Prev_Page) {
                            echo " <a href='$_SERVER[SCRIPT_NAME]?config=employee&Page=$Prev_Page'><< Back</a> ";
                        }

                        echo get_pagination_links($Page, $Num_Pages, $_SERVER['SCRIPT_NAME']);

                        if ($Page != $Num_Pages) {
                            echo " <a href ='$_SERVER[SCRIPT_NAME]?config=employee&Page=$Next_Page'>Next>></a> ";
                        }

                        if ($Page != $Num_Pages) {
                            echo " <a href ='$_SERVER[SCRIPT_NAME]?config=employee&Page=$Last_Page'>Last>></a> ";
                        }

                        ?>
                    </div>
                </div>
                <tbody>
                    <?php

                    $resultdbs = mysqli_query($conn, $sqldbs);
                    while ($rowdbs = $resultdbs->fetch_array()) :
                    ?>
                        <tr>
                            <td class="text-center" width="1%"><a href='edit.php?user=<?php echo $rowdbs['personid'] ?>'><img src='icon/edit.gif' /></button></a></td>
                            <td class="text-center" width="1%"><a href='del.php?user=<?php echo $rowdbs['personid'] ?>' onclick="return confirm('ต้องการลบหรือไม่')"><img src='icon/delete.gif' /></a></td>
                            <td class="text-center" width="1%"><?php echo $rowdbs['personid']; ?></td>
                            <td class="text-center" width="1%"><?php echo $rowdbs['firstname']; ?></td>
                            <td class="text-center" width="1%"><?php echo $rowdbs['lastname'] ?></td>
                            <td class="text-center" width="1%"><?php echo $rowdbs['nickname'] ?></td>
                        </tr>

                    <?php endwhile ?>

                </tbody>

            </table>
            <div style="text-align:center;">
                <div class="col">
                    <?php

                    if ($Prev_Page) {
                        echo " <a href='$_SERVER[SCRIPT_NAME]?config=employee&Page=$First_Page'><< Back</a> ";
                    }

                    if ($Prev_Page) {
                        echo " <a href='$_SERVER[SCRIPT_NAME]?config=employee&Page=$Prev_Page'><< Back</a> ";
                    }

                    echo get_pagination_links($Page, $Num_Pages, $_SERVER['SCRIPT_NAME']);

                    if ($Page != $Num_Pages) {
                        echo " <a href ='$_SERVER[SCRIPT_NAME]?config=employee&Page=$Next_Page'>Next>></a> ";
                    }

                    if ($Page != $Num_Pages) {
                        echo " <a href ='$_SERVER[SCRIPT_NAME]?config=employee&Page=$Last_Page'>Last>></a> ";
                    }
                    ?>
                </div>

            </div><br />
        <?php
        } */
    if ($config == "visit") { ?>
        <div class="container text-center">
            <div class="col-md-4" id="one">
                <form action="searchcon.php" method="get">
                    <div class="input-group input-group-sm mb-3">
                        <input type="hidden" name="Page" value="1">
                        <p>ชื่อ: <input type="text" autocomplete="off" name="fullname"></p>&nbsp;&nbsp;
                        <p>บริษัท: <input type="text" autocomplete="off" name="com"></p>&nbsp;&nbsp;
                        <p>Date: <input type="text" onfocus="this.value=''" id="from" autocomplete="off" name="from"> to Date: <input type="text" onfocus="this.value=''" id="to" autocomplete="off" name="to"></p>
                    </div>
                    <div class="col-md-11">
                        <input class="btn btn-outline-primary" type="submit" name="submit" value="ค้นหา">
                    </div>
                </form>
            </div>
        </div>
        <?php
        $Per_Page = 25;   // Per Page
        $Page = $_GET["Page"];
        if (!$_GET["Page"]) {
            $Page = 1;
        }
        $Page_Start = (($Per_Page * $Page) - $Per_Page);
        $sqldbs = "SELECT * FROM `visit` ORDER BY `time` LIMIT $Page_Start , $Per_Page";
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
                $links .= "<a href=\"$url?config=visit&Page=1\">1</a>";
                $i = max(2, $current_page - 3);
                if ($i > 2)
                    $links .= " ... ";
                for ($i; $i <= min($current_page + 3, $total_pages); $i++) {
                    if ($current_page == $i) {
                        $links .=  "<a href=\"$url?config=visit&Page=$i\"> <b>$i</b> </a>";
                    } elseif ($i == $total_pages) {
                        continue;
                    } else {
                        $links .=  "<a href=\"$url?config=visit&Page=$i\"> $i </a>";
                    }
                }
            }
            return $links;
        }
        ?>
        <br />
        <div class="container">
            <div class="row">
                <div class="col align-self-center" id="cen">
                    <table border="1" width='80%' class="center">

                        <thead>

                            <tr>
                                <th class="text-center" width="5%">แก้ไข</th>
                                <th class="text-center" width="5%">ลบ</th>
                                <th class="text-center" width="10%">ชื่อ</th>
                                <th class="text-center" width="10%">บริษัท</th>
                                <th class="text-center" width="10%">เบอร์</th>
                                <th class="text-center" width="10%">อีเมล์</th>
                                <th class="text-center" width="10%">พนักงานที่นัดพบ</th>
                                <th class="text-center" width="10%">วัน-เวลานัดพบ</th>
                                <!-- <th class="text-center" width="10%">ATK</th> -->
                            </tr>
                        </thead>
                        <div style="text-align:center;">
                            <div class="col">
                                <?php

                                if ($Prev_Page) {
                                    echo " <a href='$_SERVER[SCRIPT_NAME]?config=visit&Page=$First_Page'><< First</a> ";
                                }

                                if ($Prev_Page) {
                                    echo " <a href='$_SERVER[SCRIPT_NAME]?config=visit&Page=$Prev_Page'><< Back</a> ";
                                }

                                echo get_pagination_links($Page, $Num_Pages, $_SERVER['SCRIPT_NAME']);

                                if ($Page != $Num_Pages) {
                                    echo " <a href ='$_SERVER[SCRIPT_NAME]?config=visit&Page=$Next_Page'>Next>></a> ";
                                }

                                if ($Page != $Num_Pages) {
                                    echo " <a href ='$_SERVER[SCRIPT_NAME]?config=visit&Page=$Last_Page'>Last>></a> ";
                                }

                                ?>
                            </div>
                        </div><br />
                        <tbody>
                            <?php
                            $resultdbs = mysqli_query($conn, $sqldbs);
                            while ($rowdbs = $resultdbs->fetch_array()) :
                            ?>
                                <tr>
                                    <td class="text-center" width="1%"><a href='edit.php?visit=<?php echo $rowdbs['name'] ?>&time=<?php echo $rowdbs['time'] ?>'><img src='icon/edit.gif' /></button></a></td>
                                    <td class="text-center" width="1%"><a href='del.php?visit=<?php echo $rowdbs['name'] ?>&time=<?php echo $rowdbs['time'] ?>' onclick="return confirm('ต้องการลบหรือไม่')"><img src='icon/delete.gif' /></a></td>
                                    <td class="text-center" width="1%"><?php echo $rowdbs['name'] ?></td>
                                    <td class="text-center" width="1%"><?php echo $rowdbs['company'] ?></td>
                                    <td class="text-center" width="1%"><?php echo $rowdbs['phone'] ?></td>
                                    <td class="text-center" width="1%"><?php echo $rowdbs['email'] ?></td>
                                    <td class="text-center" width="1%"><?php echo $rowdbs['employee'] ?></td>
                                    <td class="text-center" width="1%"><?php echo $rowdbs['time'] ?></td>
                                    <!-- <?php
                                            $data = base64_encode($rowdbs['image'])
                                            ?>
                                        <?php if (!empty($data)) {
                                        ?>
                                            <td class="text-center" width="1%"><img id="image" src="data:image/jpeg;base64, <?php echo $data ?>" height="426" width="240" /></td>
                                        <?php
                                        } ?> -->
                                </tr>

                            <?php endwhile ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div><br />
        <div style="text-align:center;">
            <div class="col">
                <?php

                if ($Prev_Page) {
                    echo " <a href='$_SERVER[SCRIPT_NAME]?config=visit&Page=$First_Page'><< First</a> ";
                }

                if ($Prev_Page) {
                    echo " <a href='$_SERVER[SCRIPT_NAME]?config=visit&Page=$Prev_Page'><< Back</a> ";
                }

                echo get_pagination_links($Page, $Num_Pages, $_SERVER['SCRIPT_NAME']);

                if ($Page != $Num_Pages) {
                    echo " <a href ='$_SERVER[SCRIPT_NAME]?config=visit&Page=$Next_Page'>Next>></a> ";
                }

                if ($Page != $Num_Pages) {
                    echo " <a href ='$_SERVER[SCRIPT_NAME]?config=visit&Page=$Last_Page'>Last>></a> ";
                }

                ?>
            </div>
        </div>
        </br>
    <?php
    }

    if ($config == 'com') {
    ?>
        <form action="insert.php" method="POST">
            <div class="container text-center">
                <div class="row align-items-center">
                    <div class="col-5"></div>
                    <div class="col-2">
                        <input type="text" size="10" maxlength="50" name="com" class="form-control" placeholder="เพิ่มชือบริษัท" autocomplete="off">
                    </div>
                    <div class="col-1">
                        <button type="submit" id="save" class="btn btn-primary"><img src='icon/plus.png' style="margin-bottom: 1px" /> เพิ่ม</button>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <table border="1" width='40%' class="center">
            <thead>
                <tr>
                    <th class="text-center" width="3%">แก้ไข</th>
                    <th class="text-center" width="3%">ลบ</th>
                    <th class="text-center" width="50%">บริษัท</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $resultdbs = mysqli_query($conn, "SELECT * FROM `company`");
                while ($rowdbs = $resultdbs->fetch_array()) :
                    
                ?>
                        <tr>
                            <td class="text-center" width="1%"><a href='edit.php?com=<?php echo $rowdbs['Companyname'] ?>'><img src='icon/edit.gif' /></button></a></td>
                            <td class="text-center" width="1%"><a href='del.php?com=<?php echo $rowdbs['Companyname'] ?>' onclick="return confirm('ต้องการลบหรือไม่')"><img src='icon/delete.gif' /></a></td>
                            <td class="text-center" width="1%"><?php echo $rowdbs['Companyname'] ?></td>
                        </tr>

                <?php  
                endwhile ?>

            </tbody>
        </table>
    <?php
    }
    ?>
</body>

</html>
<?php


/* if (isset($_POST['new'])) {
    $id = $_POST['new'];

    $query = mysqli_query($conn, "SELECT * FROM `employee` WHERE `personid` = '$id'");

    if ($query->num_rows > 0) {
    ?>
        <script>
            alert("เพิ่มแล้ว");
            window.history.back();
        </script>
<?php
    } else {
        mysqli_query($conn, "INSERT INTO `employee`(`personid`, `firstname`, `lastname`, `nickname`) SELECT  `personid`,`firstname`,`lastname`,`nickname` FROM `newemployee` WHERE `personid` = '$id'");
        echo "<script>";
        echo "window.location.href = 'config.php?config=employee&Page=1'";
        echo "</script>";
    }
}
?> */