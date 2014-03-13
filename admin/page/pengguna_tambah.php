<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
?>
<div id="tit_page">Pengguna Dashboard</div>
<?php
if(isset($_GET['kode']))
{
		$cek = que("SELECT * FROM tb_pengguna WHERE kode='".$_GET['kode']."';");
		if(num($cek)>0)
		{
			echo "0|<div class='notif'>Nama pengguna sudah ada</div>";
		}
		else
		{
			if($_GET['sandi1']==$_GET['sandi2'])
			{
				$kode=esc($_GET['kode']);
				$sandi=md5($_GET['sandi1']);
				$nama=ucwords(esc($_GET['nama']));
				$simpan = que("INSERT INTO tb_pengguna VALUES(
				'$kode',
				'$nama',
				'$sandi',
				'1',
				'$_GET[akses]'
				)");	
				if($simpan)
				{   echo "0|<div class='notif'>Data berhasil disimpan</div>"; }
				else
				{	echo "0|<div class='notif'>Data gagal disimpan</div>"; }
			}
			else
			{echo "0|<div class='notif'>Kata sandi salah</div>";}
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
			url: "pengguna_tambah.php?"+data,
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
				{pages('bidang_tambah.php');}
			}
		});
	});
});
</script>
<form id="formtambah" action="#" method="get">
<table id="form">
  <tr>
  	<td style="width:165px">Nama Pengguna</td>
    <td><input type="text" name='kode'  required maxlength='10' id="input"/><span class="notification">Masukkan nama pengguna maksimal 10</span></td>
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
  	<td style="width:165px">Nama Lengkap</td>
    <td><input type="text" name='nama'  required id="input"/><span class="notification">Masukkan nama lengkap</span></td>
  </tr>
  <tr>
  	<td>Hak Akses</td>
    <td>
    <input type="radio" value="1" name="akses" required id="radio"/> Administrator<br />
    <input type="radio" value="2" name="akses" required id="radio"/> Operator
    </td>
  </tr>
 	<tr>
    <td>&nbsp;</td>
  	<td>
    	<input type='submit' id='simpan' value='Simpan' class="btn2"/> 
      <input type='reset' name='reset' value='Hapus' class="btn2" onclick="pg('pengguna_tambah.php');"/>
      <input type="button" value="Kembali" onclick="pages('pengguna.php');" class="btn2"/>      
    </td>
  </tr>
</table>
</form>
<?php
}
?>