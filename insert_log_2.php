<meta charset="utf-8">
<?php  // Signin now


 mysql_connect("localhost","root","password") or die ("ติดต่อกับฐานข้อมูล Mssql ไม่ได้"); 
mysql_select_db("visit") or die("เลือกฐานข้อมูลไม่ได้");
mysql_query("SET character_set_results=utf8");
	$xsql	= "delete from  visit_temp;";
	//print($xsql);
     $xrs = mysql_query($xsql);
print($name);
 $s_name=base64_decode($name);
print($s_name);
//	$xsql	= "insert into visit_temp(name) values('$name')";
    $xsql	= "insert into visit_temp(name) values('วรานนท์ ชัยสุพรรณ')";
	print($xsql);
     $xrs = mysql_query($xsql);
     
     $xsql ="update card set card_status='H'";
     $xrs = mysql_query($xsql);     

?>