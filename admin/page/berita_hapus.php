<?php
session_start();
require_once "../config/koneksi.php";
require_once "../config/ceklogin.php";
require_once "../config/fungsi.php";
if(isset($_GET['id']))
{
	$hapus = mysql_query("DELETE FROM tb_berita WHERE kode_berita='".$_GET['id']."';");
	if($hapus)
	{?><script>pg('berita.php?notif=hy');</script><?php }
	else
	{?><script>pg('berita.php?notif=hn');</script><?php }
}
elseif(isset($_GET['kode_cek']))
{
	foreach($_GET['kode_cek'] as $n => $v)
	{
	$hapus = mysql_query("DELETE FROM tb_berita WHERE kode_berita='".$v."';");
	}	
	if($hapus)
	{?><script>pg('berita.php?notif=hy');</script><?php }
	else
	{?><script>pg('berita.php?notif=hn');</script><?php }

}
else
{ ?><script>pg('berita.php?notif=ck');</script><?php }
?>