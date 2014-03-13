<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){exit;}
$folder = '../image/sementara/';
$filename = md5($_SERVER['REMOTE_ADDR'].rand()).'.jpg';
$original = $folder.$filename;
$input = file_get_contents('php://input');
if(md5($input) == '7d4df9cc423720b7f1f3d672b89362be'){exit;}
$result = file_put_contents($original, $input);
if (!$result) {
	echo '{
		"error"		: 1,
		"message"	: "Tidak dapat menyimpan gambar"
	}';
	exit;
}
$info = getimagesize($original);
if($info['mime'] != 'image/jpeg'){
	unlink($original);
	exit;
}
rename($original,'$folder/'.$filename);
$original = '$folder/'.$filename;
unset($_SESSION['photo_guru']);
$_SESSION['photo_guru']=$filename;
echo '{"status":1,"message":"Success!","filename":"'.$filename.'"}';
?>
