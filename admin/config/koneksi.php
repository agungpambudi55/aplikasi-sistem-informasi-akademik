<?php
date_default_timezone_set("Asia/Jakarta");
$connect  = mysql_connect("localhost","root","");
$db = mysql_select_db("db_akademik",$connect);
if(!$db)
{
	die("koneksi gagal!");
}
?>