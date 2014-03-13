<?php
session_start();
if(isset($_SESSION['namapengguna']) || isset($_COOKIE['namapengguna']))
{header('Location: index.aspx');}
else
{
require "../config/koneksi.php";require "../config/fungsi.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SI Akademik - Login</title>
<link rel="stylesheet" type="text/css" href="../style/login.css">
<link rel="shortcut icon" href="../style/image/favicon.ico" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.easing.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#content').animate({'margin-top':'+=530px'}, 1000, 'swing');
$('#notifsalah').animate({'margin-left':'-=400px'}, 0, 'swing');
$('#notifblokir').animate({'margin-left':'-=400px'}, 0, 'swing');
$('#notifkeluar').animate({'margin-left':'-=400px'}, 0, 'swing');
$('#notiflogin').animate({'margin-left':'-=400px'}, 0, 'swing');
<?php
if(isset($_GET['i'])) 
{
	if($_GET['i']=='k')
	{ ?>$('#notifkeluar').delay(1000).animate({'margin-left':'+=400px'}, 800, 'swing');<?php }
	else if($_GET['i']=='l')
	{?>$('#notiflogin').delay(1000).animate({'margin-left':'+=400px'}, 800, 'swing');<?php }
}
?>
$("#login").submit(function(event){		
	event.preventDefault();		
	$('#content').delay(800).animate({'margin-top':'-=700px'}, 800, 'swing');
	$("#notifblokir").animate({'margin-left':'-=400px'}, 400, 'swing');
	$("#notiflogin,#notifkeluar").animate({'margin-left':'-=400px'}, 400, 'swing');
	$("#notifsalah").animate({'margin-left':'-=400px'}, 400, 'swing');
	$('#load').animate({'margin-bottom':'+=100px'}, 600, 'swing');
	$("#masuk").focus();
	$("#login input").prop("disabled","disabled");
	if($("#pakecookie").prop("checked")==true) { pcookie = "iya"; }else{ pcookie = "tidak"; }
	$.post("login_cek.php",{namapengguna : $("[name='namapengguna']").val(),katasandi : $("[name='katasandi']").val(),type : "petugas",pakecookie : pcookie}
	,function (result,status){
	if(status)
	{
		if(result == 1)
		{
			$("#notifsalah,#notiflogin,#notifkeluar").animate({'margin-left':'-=400px'}, 1000, 'swing');
			$('#load').delay(450).animate({'margin-bottom':'-=100px'}, 800, 'swing');
			$('#line').delay(600).animate({'width':'+=100%'}, 2500, 'easeInOutCubic');			
			window.setTimeout('window.location=\"\"; ',3000);				
		}
		else if(result == 3)
		{
			$('#content').delay(500).animate({'margin-top':'+=700px'}, 1000, 'swing');
			$('#notifblokir').delay(2000).animate({'margin-left':'0px'}, 800, 'swing');
			$("#login input").removeAttr("disabled");
			$('#load').delay(700).animate({'margin-bottom':'-=100px'}, 800, 'swing');
		}
		else
		{
			$('#content').delay(500).animate({'margin-top':'+=700px'}, 1000, 'swing');
			$('#notifsalah').delay(2000).animate({'margin-left':'0px'}, 800, 'swing');
			$("#login input").removeAttr("disabled");
			$('#load').delay(700).animate({'margin-bottom':'-=100px'}, 800, 'swing');
		}
	}
	});
});
});
</script>
</head>
<body>
<div id='notifblokir' class="notif">Akun anda diblokir</div>
<div id='notiflogin' class="notif">Anda harus login dahulu!</div>
<div id='notifkeluar' class="notif">Anda telah keluar dari kontrol panel</div>
<div id='notifsalah' class="notif">Nama pengguna atau kata sandi tidak salah!</div>
<div id="line"></div>
<div id="content">
<div id="tali_kiri"></div>
<div id="tali_kanan"></div>
<div id="gandul_kiri"></div>
<div id="gandul_kanan"></div>
<div id="tulisan">Administrator</div>
<form action="#" method="post" id='login'>
  <input type='text' name='namapengguna' id='input' placeholder='Nama Pengguna' autocomplete="off"  required style="margin-bottom:5px;width:265px;"/><br/>
  <input type='password' name='katasandi' id='input'  placeholder='Kata Sandi' autocomplete="off" required style="width:200px;"/>
  <input type="submit" name='login' value='Masuk' id='masuk' class="masuk" onclick='login();return false;'/><br>
  <input type="checkbox" name="pakecookie" id='pakecookie'/> <div style="margin:-19px 0px 8px 72px;">Biarkan saya tetap login</div>
  <div id="footer">SMKN 1 Jenangan Ponorogo | <?php echo date("Y");?></div>
</form>
</div>
<div id="load" align="center"><img src="../style/image/load.gif" width="50" height="50"></div> 
</body>
</html>
<?php
}
?>