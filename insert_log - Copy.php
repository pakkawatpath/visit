<?php  // Signin now
include_once 'db.php';


	$xsql	= "delete from  visit_temp;";
	//print($xsql);
	mysqli_query($conn, $xsql);
 

 
	//$xsql	= "insert into visit_temp(name) values('$name')";
    //$xsql	= "insert into visit_temp(name) values('$name')";
//$name=base64_decode($name);
$xsql	= "insert into visit_temp(name) values('$name')";
//$xsql	= "insert into visit_temp(name) values('วรานนท์ ชัยสุพรรณ')";
	print($xsql);
     mysqli_query($conn, $xsql);
     
     $xsql ="update card set card_status='H'";
   mysqli_query($conn, $xsql);
?>