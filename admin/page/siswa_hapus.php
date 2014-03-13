<?php
session_start();
require_once "../config/koneksi.php";
require_once "../config/ceklogin.php";
require_once "../config/fungsi.php";
if(isset($_GET['id']))
{
	$qry=que("select * from tb_siswa where kode_siswa='".$_GET['id']."'");
	$arr=fetch($qry);
	$hapus = mysql_query("DELETE FROM tb_siswa WHERE kode_siswa='".$_GET['id']."';");
	$hapus1 = mysql_query("DELETE FROM tb_wali WHERE kode_siswa='".$_GET['id']."';");
	if($hapus)
	{unlink("../image/siswa/$arr[photo]");?><script>pg('siswa.php?notif=hy');</script><?php }
	else
	{?><script>pg('siswa.php?notif=hn');</script><?php }
}
elseif(isset($_GET['kode_cek']))
{
	foreach($_GET['kode_cek'] as $n => $v)
	{
	$qry=que("select * from tb_siswa where kode_siswa='".$v."'");
	$arr=fetch($qry);
	$hapus = mysql_query("DELETE FROM tb_siswa WHERE kode_siswa='".$v."';");
	$hapus1 = mysql_query("DELETE FROM tb_wali WHERE kode_siswa='".$v."';");
	}	
	if($hapus)
	{unlink("../image/siswa/$arr[photo]");?><script>pg('siswa.php?notif=hy');</script><?php }
	else
	{?><script>pg('siswa.php?notif=hn');</script><?php }

}
else
{ ?><script>pg('siswa.php?notif=ck');</script><?php }
?>