<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
if($_SESSION['photo_guru']=="")
{echo "0|<div class='notif'>Tidak ada photo</div>";}
else
{
	$hps=que("select * from tb_siswa where kode_siswa='".$_GET['id']."'");
	$arr=fetch($hps);
	$qry =que("update tb_siswa set photo='".$_SESSION['photo_guru']."' where kode_siswa='$_GET[id]'");
	if($qry)
	{unlink("../image/siswa/$arr[photo]");copy("../image/sementara/$_SESSION[photo_guru]","../image/siswa/$_SESSION[photo_guru]");echo "1|<div class='notif'>Photo berhasil diunggah</div>";}
	else
	{echo "0|<div class='notif'>Photo gagal diunggah</div>";}	
}
?>