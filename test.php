<?php
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="MyXls.xls"');#ชื่อไฟล์
?>
<HTML xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel">
<HEAD>
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
</HEAD><BODY>
<TABLE  x:str BORDER="1">
<TR>
<TD><b>AAA</b></TD>
<TD><b>AAA</b></TD>
<TD><b>AAA</b></TD>
</TR>
<TR>
<TD>0123</TD>
<TD>ภาษาไทย</TD>
<TD>ภาษาไทย</TD>
</TR>
</TABLE>
</BODY>
</HTML>

