<?php
session_start();
require "admin/config/koneksi.php";
@$qry_user=mysql_query("select * from tb_user where kode='$_SESSION[pengguna]'");
$user=mysql_fetch_array($qry_user);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SMKN 1 Jenangan Ponorogo</title>
<link rel="shortcut icon" href="admin/style/image/favicon.ico" />
<link rel="stylesheet" type="text/css" href="admin/style/front.css" />
<link href="admin/style/skitter.styles.css" type="text/css" media="all" rel="stylesheet" />
<script type="text/javascript" src="admin/js/jquery.js"></script>
<script type="text/javascript" src="admin/js/jquery.easing.js"></script>
<script type="text/javascript" src="admin/js/front.js"></script>
<script type="text/javascript" language="javascript" src="admin/js/jquery.skitter.min.js"></script>
</head>
<body>
<div id="header">
<div id="menus">
    <div id="menu" class="cm" onclick="pages('beranda.php');">BERANDA</div>
    <div id="menu" class="cm" onclick="pages('berita.php');">BERITA</div>
    <div id="menu" class="info">INFORMASI</div>
    <?php
	if(isset($_SESSION['pengguna']))
	{?>    	<div id="menu" style="float:right" onclick="pg('logout.php');">LOGOUT</div><?php
		if($user['akses']==2)
		{
		?>
    	<div id="menu" style="float:right" onclick="pages('profil.php');">PROFIL</div>
    	<div id="menu" style="float:right" onclick="pages('nilai_siswa.php');">NILAI</div>
	<?php }
		elseif($user['akses']==1)
		{
		?>
    	<div id="menu" style="float:right" onclick="pages('penilaian.php');">PENILAIAN</div>
     	<div id="menu" style="float:right" onclick="pages('nilai.php');">NILAI</div>
	<?php }
	}
	else
	{?><div id="menu_login" class="login">LOGIN</div><?php }?>
</div>
</div>
<div id="box_login">
	<div id="box_l">
        <div id="login">
        <form action="#" id="log" method="get" name="login">
        <input type="text" name="user" id="il" required autocomplete="off" placeholder="Kode"/><br />
        <input type="password" name="password" id="il" required placeholder="Kata Sandi"/><br />
        <div id="new" onclick="pages('akun.php');">Daftar</div>
        <div id="new" onclick="pages('lupa.php');">Lupa Kata Sandi</div><br />
        <input type="submit" value="Login" id="tl"/>
        </form>
        </div>
    </div>
</div>
<div id="menu_sub">
	<div id="menu_sub_isi">
<?php include "admin/page_front/menu_sub.php";?>
	</div>
</div>
<div id="loader"><div id="loading"></div></div>
<div id="container">
<div id="content">
<script>pages('beranda.php');</script>
</div>
</div>
<div id="footer">
    <div id="footer1"></div>
    <div id="footer2">
    <div id="footer3">
    	<div id="footer_isi">
		    <div id="footer_judul">SMKN 1 Jenangan Ponorogo</div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sekolah Adiwiyata ini didirikan tahun 1964 hasil prakarsa Pemerintah Daerah dan dunia usaha di Ponorogo untuk pertama pada saat itu disebut STM (Sekolah Teknologi Menengah) Persiapan Negeri Ponorogo. Secara resmi lembaga ini menjadi STM Negeri Ponorogo berdasarkan SK Menteri Pendidikan dan Kebudayaan nomor 148/Diprt/BI/66 tanggal 1 Pebruari 1966. Perubahan STM Negeri Ponorogo menjadi SMK Negeri 1 Jenangan berdasarkan SK Mendikbud nomor 036/0/1997 tanggal 7 Maret 1997. <br /> <br /> 
            <b>Alamat</b> <p>: Jalan Niken Gandini No 98, Setono, Jenangan, Ponorogo.</p>
            <b>NSS</b> <p>: 321051102001</p>
            <b>Telp. / 	Fax</b> <p>: (0352) 481236</p>
            <b>E-mail</b> <p>: smknjenpo@yahoo.com</p>
    	</div>
    </div>
    </div>
</div>
</body>
</html>