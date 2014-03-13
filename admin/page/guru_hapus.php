<?php
session_start();
require_once "../config/koneksi.php";
require_once "../config/ceklogin.php";
require_once "../config/fungsi.php";

if(isset($_GET['id']))
{
	$qry=que("select * from tb_guru where kode_guru='".$_GET['id']."'");
	$arr=fetch($qry);
	$hapus = mysql_query("DELETE FROM tb_guru WHERE kode_guru='".$_GET['id']."';");
	if($hapus)
	{unlink("../image/guru/$arr[photo]");?><script>pg('guru.php?notif=hy');</script><?php }
	else
	{?><script>pg('guru.php?notif=hn');</script><?php }
}
elseif(isset($_GET['kode_cek']))
{
	foreach($_GET['kode_cek'] as $n => $v)
	{
	$qry=que("select * from tb_guru where kode_guru='".$v."'");
	$arr=fetch($qry);
	$hapus = mysql_query("DELETE FROM tb_guru WHERE kode_guru='".$v."';");
	}	
	if($hapus)
	{unlink("../image/guru/$arr[photo]");?><script>pg('guru.php?notif=hy');</script><?php }
	else
	{?><script>pg('guru.php?notif=hn');</script><?php }

}
else
{ ?><script>pg('guru.php?notif=ck');</script><?php }
?>