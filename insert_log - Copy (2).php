
<?php  // Signin now

include_once 'db.php';


	$xsql	= "delete from  visit_temp;";
	//print($xsql);
	mysqli_query($conn, $xsql);
 

 
	//$xsql	= "insert into visit_temp(name) values('$name')";
    //$xsql	= "insert into visit_temp(name) values('$name')";
print($name);

//$s_name=base64_decode($name);
//$s_name='วรานนท์ ชัยสุพรรณ';
print($s_name);
$xsql	= "insert into visit_temp(name) values('$name')";
//$xsql	= "insert into visit_temp(name) values('วรานนท์ ชัยสุพรรณ')";
	print($xsql);
     mysqli_query($conn, $xsql);
     
   $xsql ="update card set card_status='H'";
   mysqli_query($conn, $xsql);
?>