<?php
session_start();
require "../config/koneksi.php";
require "../config/fungsi.php";
$quser = que("SELECT * FROM tb_pengguna WHERE kode='".$_POST['namapengguna']."'");
if(num($quser) == 1)
{
	$user	 = fetch($quser);
	if(md5($_POST['katasandi']) == $user['password'])
	{
		if($user['status']=="1")
		{
			
			if($_POST['pakecookie']=="iya")
			{
				setcookie("namapengguna",$user['kode'],time()+7*24*3600);
			}
			else
			{
				$_SESSION['namapengguna'] = $user['kode'];
			}
			echo "1";
		}
		else
		{echo "3";}
	}
	else
	{
		echo "0";
	}
}
else
{
	echo "0";
}
sleep(1);
?>