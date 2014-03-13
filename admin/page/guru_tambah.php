<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$qrymax=que("select max(kode_guru) from tb_guru");
$arrmax=fetch($qrymax);
?>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian guru, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('guru.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Guru</div>
<div id="progres">
<div id="progres_data_a">Identitas</div><div id="progres_panah_a"></div>
<div id="progres_data">Photo</div><div id="progres_panah"></div>
</div>
<?php
if(isset($_GET['nama']))
{
		$nama=ucwords(esc($_GET['nama']));
		$alamat=ucwords($_GET['alamat']);
		$tmp_lahir=ucwords(esc($_GET['tmp_lahir']));
		$pendidikan=ucwords(esc($_GET['pendidikan']));
		if($_GET['nip']=="")
		{	
			$nip="-";	
			$simpan = que("INSERT INTO tb_guru VALUES (NULL, '$nip', '$nama', '$_GET[keahlian]', '$alamat', '$_GET[telpon]', '$_GET[agama]', '$_GET[jenkel]', '$tmp_lahir', '$_GET[tgl_lahir]-$_GET[bln_lahir]-$_GET[thn_lahir]', '$pendidikan', '$_GET[status]', '');");	
			if($simpan)
			{  
				echo "1|<div class='notif'>Data berhasil disimpan</div>"; 
				?><script>$(document).ready(function(){$('#lanjut').show(0);$("#lanjut").focus();$('#simpan').hide(0);$('#reset').hide(0);$('#kem').hide(0);});</script><?php 
			}
			else
			{	echo "0|<div class='notif'>Data gagal disimpan</div>"; }	
		}
		else
		{
			$nip=$_GET['nip'];
			if(strlen($nip)<18)
			{echo "0|<div class='notif'>Jumlah NIP harus 18 digit, yang anda masukkan hanya ".strlen($nip)." digit</div>";}
			else
			{
				$cek 		= que("SELECT * FROM tb_guru WHERE nip='".$_GET['nip']."';");
				if(num($cek)>0)
				{echo "0|<div class='notif'>NIP $_GET[nip] sudah ada</div>";}
				else
				{
					$simpan = que("
					INSERT INTO tb_guru VALUES (NULL, '$nip', '$nama', '$_GET[keahlian]', '$alamat', '$_GET[telpon]', '$_GET[agama]', '$_GET[jenkel]', '$tmp_lahir', '$_GET[tgl_lahir]-$_GET[bln_lahir]-$_GET[thn_lahir]', '$pendidikan', '$_GET[status]', '');");	
					if($simpan)
					{ 
						echo "1|<div class='notif'>Data berhasil disimpan</div>"; 					
						?><script>$(document).ready(function(){$('#lanjut').show(0);$("#lanjut").focus();$('#simpan').hide(0);$('#reset').hide(0);$('#kem').hide(0);});</script><?php 
					}
					else
					{	echo "0|<div class='notif'>Data gagal disimpan</div>"; }
				}
				
			}
		
		}
	
}
else
{
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#lanjut').hide(0);
	$("#formtambah").submit(function(event){
		event.preventDefault();
		$('.notif').remove();
		data = $("#formtambah").serialize();
		$("#simpan").val("Menyimpan...");
		$("#formtambah *").prop("disabled","disabled");
		$.ajax({
			url: "guru_tambah.php?"+data,
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
				{pages('guru_tambah.php');}
			}
		});
	});
});
</script>
<form id="formtambah" action="#" method="get">
<table id="form">
  <tr>
  	<td style="width:165px">NIP</td>
    <td><input type="text" name='nip'  maxlength='18' pattern="\-?\d+(\.\d{0,})?" id="input" style="background:#FFF"/><span class="notification">Masukkan NIP jika ada, 18 digit</span></td>
  </tr>
  <tr>
  	<td>Nama</td>
    <td><input type="text" name='nama' required id="input"/></td>
  </tr>
  <tr>
  	<td>Alamat</td>
    <td><input type="text" name='alamat' required id="input"/></td>
  </tr>
  <tr>
  	<td>Telpon</td>
    <td><input type="text" name='telpon' required id="input" pattern="\-?\d+(\.\d{0,})?" maxlength="12"/></td>
  </tr>
  <tr>
  	<td>Jenis Kelamin</td>
    <td>
    <input type="radio" name='jenkel' value="Laki-laki" required id="radio"/><div style="margin:-16px 0px 4px 20px; border:0px solid gray;">Laki-laki</div>
    <input type="radio" name='jenkel' value="Perempuan" required id="radio"/><div style="margin:-16px 0px 0px 20px; border:0px solid gray;">Perempuan</div>
    </td>
  </tr>
  <tr>
  	<td>Tempat Lahir </td>
    <td>
    <input type="text" name='tmp_lahir' required id="input"/>
    </td>
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
    for($th=1950;$th<=2000;$th++)
	{echo "<option value='$th'>$th</option>";}
	?>
    </select>
    </td>
  </tr>
  <tr>
  	<td>Agama</td>
    <td>
    <input type="radio" name='agama' value="Islam" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 4px 5px; float:left; border:0px solid gray;">Islam</div>
    <input type="radio" name='agama' value="Kristen" required id="radio"  style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Kristen</div>
    <input type="radio" name='agama' value="Budha" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 4px 5px; float:left;border:0px solid gray;">Budha</div>
    <input type="radio" name='agama' value="Hindu" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Hindu</div>
    <input type="radio" name='agama' value="Khonghucu" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Khonghucu</div>
    </td>
  </tr>
  <tr>
  	<td>Pendidikan</td>
    <td><input type="text" name='pendidikan' required id="input" /> <span class="notification">Lulusan pendidikan terakhir yang ditempuh</span></td>
  </tr>
  <tr>
  	<td>Kompetensi Keahlian</td>
    <td>
    <select name="keahlian" required id="select">
    <option value=""></option>
    <?php
    $qry1=que("select * from tb_keahlian order by nama_keahlian asc");
	while($arr1=fetch($qry1))
	{echo "<option value='$arr1[0]'>$arr1[2]</option>";}
	?>
    </select>
    <span class="notification">Mengajar bagian dikeahlian</span>
    </td>
  </tr>
  <tr>
  	<td>Status</td>
    <td>
    <input type="radio" name='status' value="Guru Bantu" required id="radio"/><div style="margin:-15px 0px 4px 20px; border:0px solid gray;">Guru Bantu</div>
    <input type="radio" name='status' value="Guru Tetap" required id="radio"/><div style="margin:-15px 0px 0px 20px; border:0px solid gray;">Guru Tetap</div>
    </td>
  </tr>
 	<tr>
    <td>&nbsp;</td>
  	<td>
      <input type='submit' id='simpan' value='Simpan' class="btn2"/> 
      <input type='button' id='lanjut' value='Lanjut' class="btn2" onclick="pg('guru_photo.php?id=<?php echo ($arrmax['0']+1);?>');"/> 
      <input type='reset' id="reset" name='reset' value='Hapus' class="btn2"/>
      <input type="button" id="kem" value="Kembali" onclick="pages('guru.php');" class="btn2"/>      
    </td>
  </tr>
</table>
</form>
<?php
}
?>