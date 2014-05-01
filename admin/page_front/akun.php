<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
if(isset($_GET['kode']))
{
		$cek1 = que("SELECT * FROM tb_user WHERE kode='".$_GET['kode']."';");
		if(num($cek1)>0)
		{
			echo "0|<div class='notif'>Akun sudah terdaftar</div>";
		}
		else
		{
			$cek2 = que("SELECT * FROM tb_guru WHERE tb_guru.nip='".$_GET['kode']."';");
			$cek3 = que("SELECT * FROM tb_siswa WHERE tb_siswa.nis='".$_GET['kode']."';");
			if(num($cek2)<1 && num($cek3)<1)
			{
				echo "0|<div class='notif'>Anda tidak bisa daftar, kode tidak terdaftar</div>";
			}
			else
			{
				if(num($cek3)>0)
				{
					if($_GET['sandi1']==$_GET['sandi2'])
					{
						$kode=esc($_GET['kode']);
						$sandi=md5($_GET['sandi1']);
						$nama=ucwords(esc($_GET['nama']));
						$simpan = que("INSERT INTO tb_user VALUES(
						'$kode',
						'$sandi',
						'$_GET[sandi1]',
						'3',
						'2'
						)");	
						if($simpan)
						{   echo "0|<div class='notif'>Akun berhasil didaftarkan, tunggu konfirmasi</div>"; }
						else
						{	echo "0|<div class='notif'>Akun gagal didaftarkan</div>"; }
					}
					else
					{echo "0|<div class='notif'>Kata sandi tidak sama</div>";}
				}
				elseif(num($cek2)>0)
				{
					if($_GET['sandi1']==$_GET['sandi2'])
					{
						$kode=esc($_GET['kode']);
						$sandi=md5($_GET['sandi1']);
						$nama=ucwords(esc($_GET['nama']));
						$simpan = que("INSERT INTO tb_user VALUES(
						'$kode',
						'$sandi',
						'$_GET[sandi1]',
						'3',
						'1'
						)");	
						if($simpan)
						{   echo "0|<div class='notif'>Akun berhasil didaftarkan, tunggu konfirmasi</div>"; }
						else
						{	echo "0|<div class='notif'>Akun gagal didaftarkan</div>"; }
					}
					else
					{echo "0|<div class='notif'>Kata sandi tidak sama</div>";}
				}
			}
		}
}
else
{
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#formtambah").submit(function(event){
		event.preventDefault();
		$('.notif').remove();
		data = $("#formtambah").serialize();
		$("#simpan").val("Menyimpan...");
		$("#formtambah *").prop("disabled","disabled");
		$.ajax({
			url: "admin/page_front/akun.php?"+data,
			success: function(result,status){				
				response = result.split("|");
				if(response[0] != "1")
				{
					$('.notif').remove();
					$("#simpan").val("Simpan");
					$("#simpan").focus();
					$("#formtambah *").removeAttr("disabled");
					$("#formtambah").before(response[1]);
				}
				else
				{pages('admin/page_front/beranda.php');}
			}
		});
	});
});
</script>
<div id="jud"><span id="judul">Daftar Akun Baru</span></div>
<form id="formtambah" action="#" method="get">
<table id="form" width="500">
  <tr>
  	<td width="40%">Kode</td>
    <td width="60%"><input type="text" name='kode'  required maxlength='20' id="input"/><span class="notification">Jika siswa masukkan NIS, jika guru masukkan NIP</span></td>
  </tr>
  <tr>
  	<td>Kata Sandi</td>
    <td><input type="password" name='sandi1' required id="input"/><span class="notification">Masukkan kata sandi</span></td>
  </tr>
  <tr>
  	<td>Kata Sandi Ulang</td>
    <td><input type="password" name='sandi2' required id="input"/><span class="notification">Ulangi Kata sandi diatas</span></td>
  </tr>
 	<tr>
    <td>&nbsp;</td>
  	<td>
    	<input type="submit" id="tl" value="Daftar"/> 
    </td>
  </tr>
</table>
</form>
<?php
}
?>