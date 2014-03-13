<?php
session_start();
unset($_SESSION['namapengguna']);
if(isset($_COOKIE['namapengguna']))
{
	setcookie("namapengguna",$_COOKIE['namapengguna'],time()-7*24*3600);
}
echo "<script>window.setTimeout('window.location=\"login.aspx?i=k\"; ',1000);</script>";
?>
<script>$('#sidebar').animate({'margin-left':'-=279px'}, 700, 'swing');</script>
<div id="tit_page">Keluar</div>
Terima kasih.