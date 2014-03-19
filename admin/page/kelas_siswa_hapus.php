<?php
session_start();
require_once "../config/koneksi.php";
require_once "../config/ceklogin.php";
require_once "../config/fungsi.php";
if(isset($_GET['kode_keahlian']) && isset($_GET['kode_kelas']) && isset($_GET['tahun']))
{
	$hapus = mysql_query("DELETE FROM tb_kelas_siswa WHERE kode_keahlian='$_GET[kode_keahlian]' and kode_kelas='$_GET[kode_kelas]' and tahun_masuk='$_GET[tahun]';");
	if($hapus)
	{?><script>pg('kelas_siswa.php?notif=hy');</script><?php }
	else
	{?><script>pg('kelas_siswa.php?notif=hn');</script><?php }
}
elseif(isset($_GET['kode1']))
{
	foreach($_GET['kode1'] as $n1 => $v1)
	{
		foreach($_GET['kode2'] as $n2 => $v2)
		{
			foreach($_GET['kode3'] as $n3 => $v3)
			{
			$hapus = mysql_query("DELETE FROM tb_kelas_siswa WHERE kode_keahlian='$v1' and kode_kelas='$v2' and tahun_masuk='$v3';");
			}
		}
	}	
	if($hapus)
	{?><script>pg('kelas_siswa.php?notif=hy');</script><?php }
	else
	{?><script>pg('kelas_siswa.php?notif=hn');</script><?php }

}
else
{ ?><script>pg('kelas_siswa.php?notif=ck');</script><?php }
?>