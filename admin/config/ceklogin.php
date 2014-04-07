<?php
if(isset($_SESSION['namapengguna']) OR isset($_COOKIE['namapengguna']))
{
	if(isset($_SESSION['namapengguna']))
  	{ $namapengguna = $_SESSION['namapengguna']; }
	else
	{ $namapengguna = $_COOKIE['namapengguna']; }			
  $cekuser = mysql_query("SELECT * FROM tb_pengguna WHERE kode='".$namapengguna."'");
  if(mysql_num_rows($cekuser) != 1)
  { echo "<script>window.setTimeout('window.location=\"login.aspx?i=l\"; ',1000);</script>"; }
  else
  { $user = mysql_fetch_array($cekuser); }
}
else
{ echo "<script>window.setTimeout('window.location=\"login.aspx?i=l\"; ',1000);</script>"; }?>