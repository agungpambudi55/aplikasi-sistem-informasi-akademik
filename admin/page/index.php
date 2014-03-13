<?php
session_start();
require "../config/koneksi.php";
require "../config/fungsi.php";
require "../config/ceklogin.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SI Akademik - Dashboard</title>
<link rel="stylesheet" href="../style/admin.css" />
<link rel="shortcut icon" href="../style/image/favicon.ico" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.easing.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
</head>
<body onload="waktu();">
<div id="load"></div>
<div id="head">
<div id="head1">
<div id="tit_ad">SMKN 1 JENPO</div>
<p id="sidebar_c"></p>
<p id="sidebar_o"></p>
</div>
<a href="../../index.aspx" target="_new"><div id="site"></div></a>
<div id="akun">
  <div id="akun_nama">Hai, <span><?php echo $_SESSION['namapengguna'];?></span></div>
</div>
<div id="logout" onclick="pages('logout.php');"></div>
</div>
<div id="akun_mn">
	<div id="akun_menu" onclick="pages('profil.php')">Profil</div>
    <?php
    if($user['akses']=="1")
	{
	?>
	<div id="akun_menu" onclick="pages('paging.php')">Paging</div>
	<div id="akun_menu" onclick="pages('pengguna.php')">Pengguna Dashboard</div>
	<div id="akun_menu" onclick="pages('user_guru.php')">Pengguna Guru</div>
	<div id="akun_menu" onclick="pages('user_siswa.php')">Pengguna Siswa</div>
    <?php
	}
	?>
</div>
<div id="sidebar">
<div id="htj">
<div id="hr"><?php echo hari(date('D'));?></div>
<div id="tgl1"><?php echo date('d');?></div>
<div id="tgl2"><?php echo bulan(date('m'));?></div>
<div id="tgl3"><?php echo date('Y');?></div>
<div id="waktu"></div>
</div>
        <ul id="mn">
				<li id="mn1" onclick="pages('beranda.php');" class="home">Dashboard</li>
                	<ul id="mn2">
                    </ul>
				<li id="mn1" class="kompetensi">Kompetensi</li>
					<ul id="mn2">
					<li id="mn3" onclick="pages('bidang.php');">Bidang Studi Keahlian</li>
					<li id="mn3" onclick="pages('prodi.php');">Program Studi Keahlian</li>
					<li id="mn3" onclick="pages('keahlian.php');">Kompetensi Keahlian</li>
					<li id="mn3" onclick="pages('standar.php');">Standar Kompetensi</li>
					</ul>
				<li id="mn1" class="guru">Guru</li>
					<ul id="mn2">
					<li id="mn3" onclick="pages('guru.php');">Guru</li>
					<li id="mn3" onclick="pages('guru_sk.php');">Guru Standar Kompetensi</li>
					</ul>
				<li id="mn1" class="siswa">Siswa</li>
					<ul id="mn2">
					<li id="mn3" onclick="pages('siswa.php');">Siswa</li>
					<li id="mn3" onclick="pages('kelas.php');">Kelas</li>
					<li id="mn3" onclick="pages('kelas_siswa.php');">Kelas Siswa</li>
					</ul>
        		<li id="mn1" class="nilai">Nilai</li>
					<ul id="mn2">
    				<?php if($user['akses']=="1")	{?><li id="mn3" onclick="pages('nilai_tambah.php');">Penilaian</li><?php } ?>
					<li id="mn3" onclick="pages('nilai.php');">Nilai</li>
					<li id="mn3" onclick="pages('laporan.php');">Laporan</li>
					</ul>
				<li id="mn1" onclick="pages('berita.php');" class="berita">Berita</li>
                	<ul id="mn2">
                    </ul>
        </ul>
</div>
<div id="content">
<script>
pages("beranda.php");
</script>
</div>
<div id="footer">
© <?php echo date("Y");?> - SMKN 1 Jenangan Ponorogo - All Rights Reserved.
</div>
</body>
</html>
<script type="text/javascript">
$("#mn > ul").slideToggle(300);
$("#mn > li").click(function(){
	if(false == $(this).next().is(':visible')) {
		$('#mn > ul').slideUp(300);
	}
	$(this).next().slideToggle(300);
});
</script>