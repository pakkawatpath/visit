<meta charset="utf-8">
<?php  // Signin now


 mysql_connect("localhost","root","password") or die ("�Դ��͡Ѻ�ҹ������ Mssql �����"); 
mysql_select_db("visit") or die("���͡�ҹ�����������");
mysql_query("SET character_set_results=utf8");
	$xsql	= "delete from  visit_temp;";
	//print($xsql);
     $xrs = mysql_query($xsql);
print($name);
 $s_name=base64_decode($name);
print($s_name);
//	$xsql	= "insert into visit_temp(name) values('$name')";
    $xsql	= "insert into visit_temp(name) values('��ҹ��� ����ؾ�ó')";
	print($xsql);
     $xrs = mysql_query($xsql);
     
     $xsql ="update card set card_status='H'";
     $xrs = mysql_query($xsql);     

?>