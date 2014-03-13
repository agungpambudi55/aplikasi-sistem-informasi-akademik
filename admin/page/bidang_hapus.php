<?php
session_start();
require_once "../config/koneksi.php";
require_once "../config/ceklogin.php";
require_once "../config/fungsi.php";
if(isset($_GET['id']))
{
	$hapus = mysql_query("DELETE FROM tb_bidang WHERE kode_bidang='".$_GET['id']."';");
	if($hapus)
	{?><script>pg('bidang.php?notif=hy');</script><?php }
	else
	{?><script>pg('bidang.php?notif=hn');</script><?php }
}
elseif(isset($_GET['kode_cek']))
{
	foreach($_GET['kode_cek'] as $n => $v)
	{
	$hapus = mysql_query("DELETE FROM tb_bidang WHERE kode_bidang='".$v."';");
	}	
	if($hapus)
	{?><script>pg('bidang.php?notif=hy');</script><?php }
	else
	{?><script>pg('bidang.php?notif=hn');</script><?php }

}
else
{ ?><script>pg('bidang.php?notif=ck');</script><?php }
?>