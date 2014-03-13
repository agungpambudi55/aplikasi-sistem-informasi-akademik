<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$id=$_GET['id'];
$qry_edit=que("select * from tb_siswa where kode_siswa='$id'");
$arr_edit=fetch($qry_edit);
?>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian siswa, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('siswa.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Siswa</div>
<div id="progres">
<div id="progres_data_b" onClick="pg('siswa_edit.php?id=<?php echo $id;?>')" style="cursor:pointer">Identitas</div><div id="progres_panah_d"></div>
<div id="progres_data_e">Asal</div><div id="progres_panah_a"></div>
<div id="progres_data" onclick="pg('siswa_wali_edit.php?id=<?php echo $id;?>');" style="cursor:pointer">Wali</div><div id="progres_panah_d"></div>
<div id="progres_data" onclick="pg('siswa_jurusan_edit.php?id=<?php echo $id;?>');" style="cursor:pointer">Jurusan</div><div id="progres_panah_d"></div>
<div id="progres_data" onclick="pg('siswa_photo.php?id=<?php echo $id;?>');" style="cursor:pointer">Photo</div><div id="progres_panah"></div>
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
		$simpan = que("UPDATE tb_siswa SET sekolah_nama = '$_GET[nama]', sekolah_alamat = '$alamat', ijasah_tahun = '$_GET[tahun]', ijasah_no = '$_GET[nomor]' WHERE kode_siswa = '$_GET[kode]';");	
		if($simpan)
		{   echo "0|<div class='notif'>Data berhasil disimpan</div>";
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
			url: "siswa_asal_edit.php?"+data,
			success: function(result,status){				
				response = result.split("|");
				if(response[0] != "1")
				{
					$('.notif').remove();
					$("#simpan").val("Edit");
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
<input type="hidden" name="kode" value="<?php echo $id;?>"/>
<table id="form">
  <tr>
  	<td style="width:165px">Nama Sekolah Asal</td>
    <td><input type="text" name='nama' required id="input"  value="<?php echo $arr_edit['sekolah_nama'];?>"/></td>
  </tr>
  <tr>
  	<td>Alamat Sekolah Asal</td>
    <td><input type="text" name='alamat' required id="input" value="<?php echo $arr_edit['sekolah_alamat'];?>"/></td>
  </tr>
  <tr>
  	<td>Tahun Ijazah</td>
    <td><input type="text" name='tahun' required id="input" maxlength="4" pattern="\-?\d+(\.\d{0,})?" value="<?php echo $arr_edit['ijasah_tahun'];?>"/></td>
  </tr>
  <tr>
  	<td>Nomor Ijazah</td>
    <td><input type="text" name='nomor' required id="input" maxlength="20" value="<?php echo $arr_edit['ijasah_no'];?>"/></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  	<td>
      <input type='submit' id='simpan' value='Edit' class="btn2"/> 
      <input type='reset' name='reset' id="reset" value='Hapus' class="btn2"/>
      <input type='button' id='kem' value='Kembali' class="btn2" onclick="pg('siswa_edit.php?id=<?php echo $id;?>');"/> 
      <input type='button' id='lanjut' value='Lewati' class="btn2" onclick="pg('siswa_wali_edit.php?id=<?php echo $id;?>');"/> 
    </td>
  </tr>
</table>
</form>
<?php
}
?>