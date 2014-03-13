<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$qrymax=que("select max(kode_siswa) from tb_siswa");
$arrmax=fetch($qrymax);
$id=$arrmax['0']+1;
?>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian siswa, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('siswa.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Siswa</div>
<div id="progres">
<div id="progres_data_a">Identitas</div><div id="progres_panah_a"></div>
<div id="progres_data">Asal</div><div id="progres_panah_d"></div>
<div id="progres_data">Wali</div><div id="progres_panah_d"></div>
<div id="progres_data">Jurusan</div><div id="progres_panah_d"></div>
<div id="progres_data">Photo</div><div id="progres_panah"></div>
</div>
<?php
if(isset($_GET['nama']))
{
	$cek 		= que("SELECT * FROM tb_siswa WHERE nisn='".$_GET['nisn']."';");
	$cek1 		= que("SELECT * FROM tb_siswa WHERE nis='".$_GET['nis']."';");
	if(strlen($_GET['nisn'])<10)
	{
		echo "0|<div class='notif'>NISN ada 10 digit, yang anda masukkan hanya ".strlen($_GET['nisn'])." digit</div>";
	}
	elseif(strlen($_GET['nis'])<13)
	{
		echo "0|<div class='notif'>NIS ada 10 digit, yang anda masukkan hanya kurang</div>";
	}
	elseif(num($cek)>0)
	{
		echo "0|<div class='notif'>NISN $_GET[nisn] sudah ada</div>";
	}
	elseif(num($cek1)>0)
	{
		echo "0|<div class='notif'>NIS $_GET[nis] sudah ada</div>";
	}
	else
	{
		$nama=ucwords(esc($_GET['nama']));		
		$alamat=ucwords(esc($_GET['alamat']));
		$tmp=ucwords(esc($_GET['tmp_lahir']));
		$simpan = que("INSERT INTO tb_siswa VALUES (NULL, '$_GET[keahlian]', '$_GET[nisn]', '$_GET[nis]', '$nama', '$alamat', '$tmp', '$_GET[tgl_lahir]-$_GET[bln_lahir]-$_GET[thn_lahir]', '$_GET[jenkel]', '$_GET[telpon]', '', '', '', '', '', '');");	
		if($simpan)
		{   echo "0|<div class='notif'>Data berhasil disimpan</div>"; ?>
			<script>$(document).ready(function(){$('#lanjut').show(0);$("#lanjut").focus();$('#simpan').hide(0);$('#reset').hide(0);$('#kem').hide(0);});</script><?php 
		}
		else
		{	echo "0|<div class='notif'>Data gagal disimpan</div>"; }
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
			url: "siswa_tambah.php?"+data,
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
<table id="form">
  <tr>
  	<td style="width:165px">Nama</td>
    <td><input type="text" name='nama' required id="input"/></td>
  </tr>
  <tr>
  	<td>NISN</td>
    <td><input type="text" name='nisn'  required maxlength='10' pattern="\-?\d+(\.\d{0,})?" id="input"/><span class="notification">Masukkan 10 digit NISN</span></td>
  </tr>
  <tr>
  	<td>NIS</td>
    <td><input type="text" name='nis'  required maxlength='13' id="input"/><span class="notification">Masukkan 11 digit NIS, format "14835/252.070"</span></td>
  </tr>
  <tr>
  	  <td>Jenis Kelamin</td>
      <td>
        <input type="radio" name='jenkel' value="Laki-laki" required id="radio"/><div style="margin:-16px 0px 4px 20px; border:0px solid gray;">Laki-laki</div>
        <input type="radio" name='jenkel' value="Perempuan" required id="radio"/><div style="margin:-16px 0px 0px 20px; border:0px solid gray;">Perempuan</div>
      </td>
  </tr>
  <tr>
  	<td>Tempat Lahir</td>
    <td><input type="text" name='tmp_lahir' required id="input"/></td>
  </tr>
  <tr>
  <td>Tanggal Lahir</td>
  <td>
    <select name="tgl_lahir" required id="select1">
    <option value=""></option>
    <?php
    for($tgl=1;$tgl<=31;$tgl++)
	{ if($tgl<10){$tgl="0".$tgl;}; echo "<option value='$tgl'>$tgl</option>";}
	?>
    </select>
    <select name="bln_lahir" required id="select2">
    <option value=""></option>
    <?php
    for($bln=1;$bln<=12;$bln++)
	{
		if($bln<10){$bln="0".$bln;};
		echo "<option value='$bln'>".bulan($bln)."</option>";}
	?>
    </select>
    <select name="thn_lahir" required id="select3">
    <option value=""></option>
    <?php
    for($th=1990;$th<=2005;$th++)
	{echo "<option value='$th'>$th</option>";}
	?>
    </select>
    </td>
  </tr>
  <tr>
  	<td>Alamat</td>
    <td><input type="text" name='alamat' required id="input"/></td>
  </tr>
  <tr>
  	<td>Telpon</td>
    <td><input type="text" name='telpon' required id="input" maxlength="12" pattern="\-?\d+(\.\d{0,})?"/></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  	<td>
      <input type='submit' id='simpan' value='Simpan' class="btn2"/> 
      <input type='button' id='lanjut' value='Lanjut' class="btn2" style="display:none" onclick="pages('siswa_asal_tambah.php?id=<?php echo $id;?>');"/> 
      <input type='reset' name='reset' id="reset" value='Hapus' class="btn2"/>
      <input type="button" id="kem" value="Kembali" onclick="pages('siswa.php');" class="btn2"/>      
    </td>
  </tr>
</table>
</form>
<?php
}
?>