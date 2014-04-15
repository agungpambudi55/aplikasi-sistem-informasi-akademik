<?php
session_start();
require "../config/koneksi.php";
require "../config/fungsi.php";
$quser = que("SELECT * FROM tb_user WHERE kode='$_GET[user]'");
if(num($quser) == 1)
{
	$user	 = fetch($quser);
	if(md5($_GET['password']) == $user['password1'])
	{
		if($user['status']=="1")
		{			
				$_SESSION['pengguna'] = $user['kode'];
				echo "1|";
		}
		elseif($user['status']=="2")
		{echo "3|<div class='ntf'>Akun diblokir</div>";}
		elseif($user['status']=="3")
		{echo "3|<div class='ntf'>Akun belum dikonfirmasi</div>";}
	}
	else
	{
		echo "0|<div class='ntf'>Kata sandi salah</div>";
	}
}
else
{
	echo "0|<div class='ntf'>Akun tidak terdaftar</div>";
}
?>