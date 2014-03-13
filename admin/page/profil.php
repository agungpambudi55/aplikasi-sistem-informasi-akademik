<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
?>
<div id="tit_page">Pengguna</div>
<?php
if(isset($_GET['kode']))
{
	$kode=esc($_GET['kode']);
	$nama=ucwords(esc($_GET['nama']));
		if($kode==$user['kode'])
		{
				$simpan = que("update tb_pengguna set nama='$nama' where kode='$user[kode]'");	
				if($simpan)
				{   echo "0|<div class='notif'>Profil berhasil diedit</div>"; }
				else
				{	echo "0|<div class='notif'>Profil gagal diedit</div>"; }
		}
		else
		{
				$cek = que("SELECT * FROM tb_pengguna WHERE kode='".$_GET['kode']."';");
				if(num($cek)>0)
				{echo "0|<div class='notif'>Nama Pengguna sudah ada</div>";}
				else
				{
					$simpan = que("update tb_pengguna set kode='$kode', nama='$nama' where kode='$user[kode]'");	
					if($simpan)
					{ 
						$_SESSION['namapengguna']=$kode;  
						echo "0|<div class='notif'>Profil berhasil diedit</div>"; 
						echo "<script>window.setTimeout('window.location=\"index.aspx\"; ',500);</script>";					}
					else
					{	echo "0|<div class='notif'>Profil gagal diedit</div>"; }		
				}
		}
}
elseif(isset($_GET['sandi1']))
{
	$sandi=md5($_GET['sandi2']);	
	if(md5($_GET['sandilama'])==$user['password'])
	{
		if($_GET['sandi1']==$_GET['sandi2'])
		{
			$simpan = que("update tb_pengguna set password='$sandi' where kode='$user[kode]'");	
			if($simpan)
			{ echo "0|<div class='notif'>Profil berhasil diedit</div>"; echo "<script>window.setTimeout('window.location=\"index.aspx\"; ',500);</script>";	}
			else
			{	echo "0|<div class='notif'>Profil gagal diedit</div>"; }		
		}
		else
		{echo "0|<div class='notif'>Kata sandi baru tidak sama</div>"; }
	}
	else
	{echo "0|<div class='notif'>Kata sandi lama salah</div>"; }
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
		$("#formtambah *").prop("disabled","disabled");
		$.ajax({
			url: "profil.php?"+data,
			success: function(result,status){				
				response = result.split("|");
				if(response[0] != "1")
				{
					$('.notif').remove();
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
<?php if(!isset($_GET['tab']))
{?>
<div id="tab">
<div id="taba" onclick="pg('profil.php');" style=" background:#028DD0">Profil</div>
<div id="tabb" onclick="pg('profil.php?tab=tab');" >Kata Sandi</div>	
</div>
<table id="form">
  <tr>
  	<td style="width:165px">Nama Pengguna</td>
    <td><input type="text" name='kode'  required maxlength='10' id="input" value="<?php echo $user['kode'];?>"/><span class="notification">Masukkan nama pengguna maksimal 10</span></td>
  </tr>
  <tr>
  	<td style="width:165px">Nama Lengkap</td>
    <td><input type="text" name='nama'  required id="input" value="<?php echo $user['nama'];?>"/><span class="notification">Masukkan nama lengkap</span></td>
  </tr>
 	<tr>
    <td>&nbsp;</td>
  	<td>
    	<input type='submit' id='simpan' value='Edit' class="btn2"/> 
    </td>
  </tr>
</table>
<?php
}
else
{?>
<div id="tab">
<div id="taba" onclick="pg('profil.php');">Profil</div>
<div id="tabb" onclick="pg('profil.php?tab=tab');"  style=" background:#028DD0">Kata Sandi</div>	
</div>
<table id="form">
  <tr>
  	<td width="165">Kata Sandi Lama</td>
    <td><input type="password" name='sandilama' required id="input"/><span class="notification">Masukkan kata sandi lama</span></td>
  </tr>
  <tr>
  	<td width="165">Kata Sandi Baru</td>
    <td><input type="password" name='sandi1' required id="input"/><span class="notification">Masukkan kata sandi baru</span></td>
  </tr>
  <tr>
  	<td>Kata Sandi Baru Ulang</td>
    <td><input type="password" name='sandi2' required id="input"/><span class="notification">Ulangi Kata sandi baru diatas</span></td>
  </tr>
 	<tr>
    <td>&nbsp;</td>
  	<td>
    	<input type='submit' id='simpan' value='Ganti' class="btn2"/> 
    </td>
  </tr>
</table>
<?php }
?></form>
<?php
}
?>