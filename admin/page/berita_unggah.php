<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
	$qry =que("INSERT INTO tb_berita VALUES (NULL, CURRENT_TIMESTAMP, '$_SESSION[namapengguna]', '$_GET[judul]', '$_GET[isi]', '$_SESSION[photo_guru]');");
	if($qry)
	{copy("../image/sementara/$_SESSION[photo_guru]","../image/slide/$_SESSION[photo_guru]");echo "1|<div class='notif'>Berita berhasil berhasil diterbitkan</div>";}
	else
	{echo "0|<div class='notif'>Berita gagal diterbitkan</div>";}	
?>