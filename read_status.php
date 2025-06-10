<?php  // Signin now


 mysql_connect("localhost","root","password") or die ("ติดต่อกับฐานข้อมูล Mssql ไม่ได้"); 
mysql_select_db("visit") or die("เลือกฐานข้อมูลไม่ได้");
         	             $xsql2="select * from card";
      	         //    print($xsql2);
	                  $xrs2 = mysql_query($xsql2);
                       $xrow2= mysql_fetch_array($xrs2); 
                       print($xrow2[card_status]);
 


 
?>