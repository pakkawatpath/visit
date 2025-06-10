<meta charset="utf-8">
<?php  // Signin now

include_once 'db.php';


	$xsql	= "delete from  visit_temp;";
	//print($xsql);
	mysqli_query($conn, $xsql);
 

 
	//$xsql	= "insert into visit_temp(name) values('$name')";
    //$xsql	= "insert into visit_temp(name) values('$name')";
print($visitname);

//$s_name=base64_decode($username);
//$s_name='วรานนท์ ชัยสุพรรณ';
//print($s_name);
//$xsql	= "insert into visit_temp(name) values('$s_name')";
//$xsql	= "insert into visit_temp(name) values('วรานนท์ ชัยสุพรรณ')";
$xsql	= "INSERT INTO `visit_temp`(`name`) VALUES ('$visitname')";
	print($xsql);
     mysqli_query($conn, $xsql);
//                   mysqli_query($conn, );
     
   $xsql ="update card set card_status='H'";
   mysqli_query($conn, $xsql);
?>