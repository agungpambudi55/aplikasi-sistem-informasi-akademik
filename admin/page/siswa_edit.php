<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$id=$_GET['id'];
$qry_edit=que("select * from tb_siswa where kode_siswa='$_GET[id]'");
$arr_edit=fetch($qry_edit);
?>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian siswa, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('siswa.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Siswa</div>
<div id="progres">
<div id="progres_data_a">Identitas</div><div id="progres_panah_a"></div>
<div id="progres_data" onclick="pg('siswa_asal_edit.php?id=<?php echo $id;?>');" style="cursor:pointer">Asal</div><div id="progres_panah_d"></div>
<div id="progres_data" onclick="pg('siswa_wali_edit.php?id=<?php echo $id;?>');" style="cursor:pointer">Wali</div><div id="progres_panah_d"></div>
<div id="progres_data" onclick="pg('siswa_jurusan_edit.php?id=<?php echo $id;?>');" style="cursor:pointer">Jurusan</div><div id="progres_panah_d"></div>
<div id="progres_data"  onclick="pg('siswa_photo.php?id=<?php echo $id;?>');" style="cursor:pointer">Photo</div><div id="progres_panah"></div>
</div>
<?php
if(isset($_GET['kode']))
{
	if(strlen($_GET['nisn'])<10)
	{
		echo "0|<div class='notif'>NISN ada 10 digit, yang anda masukkan hanya ".strlen($_GET['nisn'])." digit</div>";
	}
	elseif(strlen($_GET['nis'])<13)
	{
		echo "0|<div class='notif'>NIS ada 10 digit, yang anda masukkan hanya kurang</div>";
	}
	else
	{
		$nama=ucwords(esc($_GET['nama']));		
		$alamat=ucwords(esc($_GET['alamat']));
		$tmp=ucwords(esc($_GET['tmp_lahir']));
		$simpan = que("update tb_siswa set nisn='$_GET[nisn]', nis='$_GET[nis]', nama='$nama', alamat='$alamat', tmp_lahir='$tmp', tgl_lahir='$_GET[tgl_lahir]-$_GET[bln_lahir]-$_GET[thn_lahir]', jenis_kelamin='$_GET[jenkel]', telpon='$_GET[telpon]' where kode_siswa='$_GET[kode]';");	
		if($simpan)
		{   echo "0|<div class='notif'>Data berhasil diedit</div>";}
		else
		{	echo "0|<div class='notif'>Data gagal diedit</div>"; }
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
			url: "siswa_edit.php?"+data,
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
				{pages('siswa_edit.php');}
			}
		});
	});
});
</script>
<form id="formtambah" action="#" method="get">
<input type="hidden" name='kode'  value="<?php echo $_GET['id'];?>"/>
<table id="form">
  <tr>
  	<td style="width:165px">Nama</td>
    <td><input type="text" name='nama' required id="input" value="<?php echo $arr_edit['nama'];?>"/></td>
  </tr>
  <tr>
  	<td>NISN</td>
    <td><input type="text" name='nisn'  required maxlength='10' pattern="\-?\d+(\.\d{0,})?" id="input"  value="<?php echo $arr_edit['nisn'];?>"/><span class="notification">Masukkan 10 digit NISN</span></td>
  </tr>
  <tr>
  	<td>NIS</td>
    <td><input type="text" name='nis'  required maxlength='13' id="input"  value="<?php echo $arr_edit['nis'];?>"/><span class="notification">Masukkan 11 digit NIS, format "14835/252.070"</span></td>
  </tr>
  <tr>
  	  <td>Jenis Kelamin</td>
      <td>
    <?php
    if($arr_edit['jenis_kelamin']=="Laki-laki")
	{
?>  <input type="radio" name='jenkel' value="Laki-laki" required id="radio" checked/><div style="margin:-16px 0px 4px 20px; border:0px solid gray;">Laki-laki</div>
    <input type="radio" name='jenkel' value="Perempuan" required id="radio"/><div style="margin:-16px 0px 0px 20px; border:0px solid gray;">Perempuan</div><?php	
	}
	else
	{
?>  <input type="radio" name='jenkel' value="Laki-laki" required id="radio"/><div style="margin:-16px 0px 4px 20px; border:0px solid gray;">Laki-laki</div>
    <input type="radio" name='jenkel' value="Perempuan" required id="radio" checked/><div style="margin:-16px 0px 0px 20px; border:0px solid gray;">Perempuan</div><?php	
	}	
	?>
      </td>
  </tr>
  <tr>
  	<td>Tempat Lahir</td>
    <td><input type="text" name='tmp_lahir' required id="input"  value="<?php echo $arr_edit['tmp_lahir'];?>"/></td>
  </tr>
  <tr>
  <td>Tanggal Lahir</td>
  <td>
    <select name="tgl_lahir" required id="select1">
    <option value=""></option>
    <?php
    for($tgl=1;$tgl<=31;$tgl++)
	{ if($tgl<10){$tgl="0".$tgl;}; if($tgl==substr($arr_edit['tgl_lahir'],0,2)){echo "<option value='$tgl' selected>$tgl</option>";}else{echo "<option value='$tgl'>$tgl</option>";}}
	?>
    </select>
    <select name="bln_lahir" required id="select2">
    <option value=""></option>
    <?php
    for($bln=1;$bln<=12;$bln++)
	{
		if($bln<10){$bln="0".$bln;};
		if($bln==substr($arr_edit['tgl_lahir'],3,2)){echo "<option value='$bln' selected>".bulan($bln)."</option>";}else{echo "<option value='$bln'>".bulan($bln)."</option>";}
	}
	?>
    </select>
    <select name="thn_lahir" required id="select3">
    <option value=""></option>
    <?php
    for($th=1990;$th<=2005;$th++)
	{ if($th==substr($arr_edit['tgl_lahir'],6,4)){echo "<option value='$th' selected>$th</option>";}else{echo "<option value='$th'>$th</option>";}}
	?>
    </select>
    </td>
  </tr>
  <tr>
  	<td>Alamat</td>
    <td><input type="text" name='alamat' required id="input" value="<?php echo $arr_edit['alamat'];?>"/></td>
  </tr>
  <tr>
  	<td>Telpon</td>
    <td><input type="text" name='telpon' required id="input" maxlength="12"  value="<?php echo $arr_edit['telpon'];?>"/></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  	<td>
      <input type='submit' id='simpan' value='Edit' class="btn2"/> 
      <input type='reset' name='reset' id="reset" value='Hapus' class="btn2"/>
      <input type="button" id="kem" value="Kembali" onclick="pages('siswa.php');" class="btn2"/>      
      <input type='button' id='lanjut' value='Lewati' class="btn2" onclick="pg('siswa_asal_edit.php?id=<?php echo $id;?>');"/> 
    </td>
  </tr>
</table>
</form>
<?php
}
?>