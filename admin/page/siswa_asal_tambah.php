<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$id=$_GET['id'];
?>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian siswa, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('siswa.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Siswa</div>
<div id="progres">
<div id="progres_data_b">Identitas</div><div id="progres_panah_d"></div>
<div id="progres_data_e">Asal</div><div id="progres_panah_a"></div>
<div id="progres_data">Wali</div><div id="progres_panah_d"></div>
<div id="progres_data">Jurusan</div><div id="progres_panah_d"></div>
<div id="progres_data">Photo</div><div id="progres_panah"></div>
</div>
<?php
if(isset($_GET['nama']))
{
	if(strlen($_GET['tahun'])<4)
	{
		echo "0|<div class='notif'>Masukkan tahun dengan benar</div>";
	}

		$nama=ucwords(esc($_GET['nama']));		
		$alamat=ucwords(esc($_GET['alamat']));
		$tmp=ucwords(esc($_GET['tmp_lahir']));
		$simpan = que("UPDATE tb_siswa SET sekolah_nama = '$_GET[nama]', sekolah_alamat = '$alamat', ijasah_tahun = '$_GET[tahun]', ijasah_no = '$_GET[nomor]' WHERE kode_siswa = '$_GET[id]';");	
		if($simpan)
		{   echo "0|<div class='notif'>Data berhasil disimpan</div>"; ?>
		<script>$(document).ready(function(){$('#lanjut').show(0);$("#lanjut").focus();$('#simpan').hide(0);$('#reset').hide(0);});</script><?php 
		}
		else
		{	echo "0|<div class='notif'>Data gagal disimpan</div>"; }
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
			url: "siswa_asal_tambah.php?"+data,
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
				{pages('siswa_tambah.php');}
			}
		});
	});
});
</script>
<form id="formtambah" action="#" method="get">
<input type="hidden" name="id" value="<?php echo $id;?>"/>
<table id="form">
  <tr>
  	<td style="width:165px">Nama Sekolah Asal</td>
    <td><input type="text" name='nama' required id="input"/></td>
  </tr>
  <tr>
  	<td>Alamat Sekolah Asal</td>
    <td><input type="text" name='alamat' required id="input"/></td>
  </tr>
  <tr>
  	<td>Tahun Ijazah</td>
    <td><input type="text" name='tahun' required id="input" maxlength="4" pattern="\-?\d+(\.\d{0,})?"/></td>
  </tr>
  <tr>
  	<td>Nomor Ijazah</td>
    <td><input type="text" name='nomor' required id="input" maxlength="20"/></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  	<td>
      <input type='submit' id='simpan' value='Simpan' class="btn2"/> 
      <input type='button' id='lanjut' value='Lanjut' class="btn2" style="display:none" onclick="pg('siswa_wali_tambah.php?id=<?php echo $id;?>');"/> 
      <input type='reset' name='reset' id="reset" value='Hapus' class="btn2"/>
    </td>
  </tr>
</table>
</form>
<?php
}
?>