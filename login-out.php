<?php
session_start();
if (isset($_POST['Username'])) {

  include("db.php");
  $Username = $_POST['Username'];
  $Password = $_POST['Password'];
  $sql = "SELECT * FROM `users` Where `User`='" . $Username . "' and `Password`='" . $Password . "' ";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $_SESSION["UserID"] = $row["User"];
    $_SESSION["Level"] = $row["level"];
    $_SESSION["User"] = $row["Name"] . " " . $row["Lastname"];

    if ($_SESSION["Level"] == "user") {
      /* header("Location: config.php?config=visit&Page=1"); */
      header("Location: visit?Page=1");
    }

    if ($_SESSION["Level"] == "admin") {
      header("Location: visit?Page=1");
    }

?>
    <script>
      alert(" user หรือ  password ไม่ถูกต้อง");
      window.history.back();
    </script>
  <?php

  } else {
  ?>
    <script>
      alert(" user หรือ  password ไม่ถูกต้อง");
      window.history.back();
    </script>
<?php
  }
} else {
  Header("Location: index.php");
}

if (isset($_POST['Logout'])) {
  session_destroy();
  header("Location: index.php ");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

</html>