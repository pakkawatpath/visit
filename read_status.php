<?php  // Signin now


 mysql_connect("localhost","root","password") or die ("�Դ��͡Ѻ�ҹ������ Mssql �����"); 
mysql_select_db("visit") or die("���͡�ҹ�����������");
         	             $xsql2="select * from card";
      	         //    print($xsql2);
	                  $xrs2 = mysql_query($xsql2);
                       $xrow2= mysql_fetch_array($xrs2); 
                       print($xrow2[card_status]);
 


 
?>