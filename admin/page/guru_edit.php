<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$qry5 =que("select * from tb_guru where kode_guru='$_GET[id]'");
$arr5 =fetch($qry5);
?>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian guru, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('guru.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Guru</div>
<div id="progres">
<div id="progres_data_a">Identitas</div><div id="progres_panah_a"></div>
<div id="progres_data" onclick="pg('guru_photo.php?id=<?php echo $arr5['0'];?>');" style="cursor:pointer">Photo</div><div id="progres_panah"></div>
</div>
<?php
if(isset($_GET['kode']))
{
	$nama=ucwords(esc($_GET['nama']));
	$alamat=ucwords($_GET['alamat']);
	$tmp_lahir=ucwords(esc($_GET['tmp_lahir']));
	$pendidikan=ucwords(esc($_GET['pendidikan']));
	if($_GET['nip']=="")
	{ 	$nip="-";
		$simpan = que("UPDATE tb_guru SET nip = '$nip', nama_guru = '$nama', agama='$_GET[agama]', kode_keahlian = '$_GET[keahlian]', alamat = '$alamat', telpon = '$_GET[telpon]', jenis_kelamin = '$_GET[jenkel]', tmp_lahir = '$tmp_lahir', tgl_lahir = '$_GET[tgl_lahir]-$_GET[bln_lahir]-$_GET[thn_lahir]', pendidikan = '$pendidikan', status = '$_GET[status]' WHERE tb_guru.kode_guru = $_GET[kode];");	
		if($simpan)
		{   echo "0|<div class='notif'>Data berhasil diedit</div>"; }
		else
		{	echo "0|<div class='notif'>Data gagal diedit</div>"; }
	}
	else
	{
		$nip_lama=$_GET['nip_lama'];$nip=$_GET['nip'];
		if(strlen($nip)<18)
		{echo "0|<div class='notif'>Jumlah NIP harus 18 digit, yang anda masukkan hanya ".strlen($nip)." digit</div>";}
		else
		{
			if($nip_lama==$nip)
			{
				$simpan = que("UPDATE tb_guru SET nip = '$_GET[nip]', nama_guru = '$nama', agama='$_GET[agama]', kode_keahlian = '$_GET[keahlian]', alamat = '$alamat', telpon = '$_GET[telpon]', jenis_kelamin = '$_GET[jenkel]', tmp_lahir = '$tmp_lahir', tgl_lahir = '$_GET[tgl_lahir]-$_GET[bln_lahir]-$_GET[thn_lahir]', pendidikan = '$pendidikan', status = '$_GET[status]' WHERE tb_guru.kode_guru = $_GET[kode];");	
				if($simpan)
				{   echo "0|<div class='notif'>Data berhasil diedit</div>"; }
				else
				{	echo "0|<div class='notif'>Data gagal diedit</div>"; }
			}
			else
			{
				$cek 		= que("SELECT * FROM tb_guru WHERE nip='".$nip."';");
				if(num($cek)>0)
				{
					echo "0|<div class='notif'>NIP $_GET[nip] sudah ada</div>";
				}
				else
				{		
					$simpan = que("UPDATE tb_guru SET nip = '$_GET[nip]', nama_guru = '$nama', agama='$_GET[agama]', kode_keahlian = '$_GET[keahlian]', alamat = '$alamat', telpon = '$_GET[telpon]', jenis_kelamin = '$_GET[jenkel]', tmp_lahir = '$tmp_lahir', tgl_lahir = '$_GET[tgl_lahir]-$_GET[bln_lahir]-$_GET[thn_lahir]', pendidikan = '$pendidikan', status = '$_GET[status]' WHERE tb_guru.kode_guru = $_GET[kode];");	
					if($simpan)
					{   echo "0|<div class='notif'>Data berhasil diedit</div>"; }
					else
					{	echo "0|<div class='notif'>Data gagal diedit</div>"; }
				}
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
			url: "guru_edit.php?"+data,
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
				{pages('guru_tambah.php');}
			}
		});
	});
});
</script>
<form id="formtambah" action="#" method="get">
<input type="hidden" name="kode" value="<?php echo $arr5['kode_guru'];?>" />
<input type="hidden" name="nip_lama" value="<?php echo $arr5['nip'];?>" />
<table id="form">
  <tr>
  	<td style="width:165px">NIP</td>
    <td><input type="text" name='nip' maxlength='18' id="input" value="<?php echo $arr5['nip'];?>"/><span class="notification">Masukkan NIP jika ada, 18 digit</span></td>
  </tr>
  <tr>
  	<td>Nama</td>
    <td><input type="text" name='nama' required id="input" value="<?php echo $arr5['nama_guru'];?>"/></td>
  </tr>
  <tr>
  	<td>Alamat</td>
    <td><input type="text" name='alamat' required id="input" value="<?php echo $arr5['alamat'];?>"/></td>
  </tr>
  <tr>
  	<td>Telpon</td>
    <td><input type="text" name='telpon' maxlength="12" required id="input" pattern="\-?\d+(\.\d{0,})?" value="<?php echo $arr5['telpon'];?>"/></td>
  </tr>
  <tr>
  	<td>Jenis Kelamin</td>
    <td>
    <?php
    if($arr5['jenis_kelamin']=="Laki-laki")
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
  	<td>Tempat Lahir </td>
    <td>
    <input type="text" name='tmp_lahir'  id="input" value="<?php echo $arr5['tmp_lahir'];?>" required/>
    </td>
  </tr>
  <tr>
  <td>Tanggal Lahir</td>
  <td>
    <select name="tgl_lahir" required id="select1">
    <option value=""></option>
    <?php
    for($tgl=1;$tgl<=31;$tgl++)
	{ if($tgl<10){$tgl="0".$tgl;}; if($tgl==substr($arr5['tgl_lahir'],0,2)){echo "<option value='$tgl' selected>$tgl</option>";}else{echo "<option value='$tgl'>$tgl</option>";}}
	?>
    </select>
    <select name="bln_lahir" required id="select2">
    <option value=""></option>
    <?php
    for($bln=1;$bln<=12;$bln++)
	{
		if($bln<10){$bln="0".$bln;};
		if($bln==substr($arr5['tgl_lahir'],3,2)){echo "<option value='$bln' selected>".bulan($bln)."</option>";}else{echo "<option value='$bln'>".bulan($bln)."</option>";}
	}
	?>
    </select>
    <select name="thn_lahir" required id="select3">
    <option value=""></option>
    <?php
    for($th=1950;$th<=2000;$th++)
	{ if($th==substr($arr5['tgl_lahir'],6,4)){echo "<option value='$th' selected>$th</option>";}else{echo "<option value='$th'>$th</option>";}}
	?>
    </select>
    </td>
  </tr>
  <tr>
  	<td>Agama</td>
    <td>
    <?php
	if($arr5['agama']=="Islam")
	{?>
    <input type="radio" name='agama' value="Islam" required id="radio" style="float:left; margin-top:3px;" checked/>
    <div style="margin:1px 5px 4px 5px; float:left; border:0px solid gray;">Islam</div>
    <input type="radio" name='agama' value="Kristen" required id="radio"  style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Kristen</div>
    <input type="radio" name='agama' value="Budha" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 4px 5px; float:left;border:0px solid gray;">Budha</div>
    <input type="radio" name='agama' value="Hindu" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Hindu</div>
    <input type="radio" name='agama' value="Khonghucu" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Khonghucu</div>
	<?php }
	elseif($arr5['agama']=="Kristen")
	{?>
    <input type="radio" name='agama' value="Islam" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 4px 5px; float:left; border:0px solid gray;">Islam</div>
    <input type="radio" name='agama' value="Kristen" required id="radio"  style="float:left; margin-top:3px;" checked/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Kristen</div>
    <input type="radio" name='agama' value="Budha" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 4px 5px; float:left;border:0px solid gray;">Budha</div>
    <input type="radio" name='agama' value="Hindu" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Hindu</div>
    <input type="radio" name='agama' value="Khonghucu" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Khonghucu</div>
	<?php }
	elseif($arr5['agama']=="Budha")
	{?>
    <input type="radio" name='agama' value="Islam" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 4px 5px; float:left; border:0px solid gray;">Islam</div>
    <input type="radio" name='agama' value="Kristen" required id="radio"  style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Kristen</div>
    <input type="radio" name='agama' value="Budha" required id="radio" style="float:left; margin-top:3px;" checked/>
    <div style="margin:1px 5px 4px 5px; float:left;border:0px solid gray;">Budha</div>
    <input type="radio" name='agama' value="Hindu" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Hindu</div>
    <input type="radio" name='agama' value="Khonghucu" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Khonghucu</div>
	<?php }
	elseif($arr5['agama']=="Hindu")
	{?>
    <input type="radio" name='agama' value="Islam" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 4px 5px; float:left; border:0px solid gray;">Islam</div>
    <input type="radio" name='agama' value="Kristen" required id="radio"  style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Kristen</div>
    <input type="radio" name='agama' value="Budha" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 4px 5px; float:left;border:0px solid gray;">Budha</div>
    <input type="radio" name='agama' value="Hindu" required id="radio" style="float:left; margin-top:3px;" checked/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Hindu</div>
    <input type="radio" name='agama' value="Khonghucu" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Khonghucu</div>
	<?php }
	elseif($arr5['agama']=="Khonghucu")
	{?>
    <input type="radio" name='agama' value="Islam" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 4px 5px; float:left; border:0px solid gray;">Islam</div>
    <input type="radio" name='agama' value="Kristen" required id="radio"  style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Kristen</div>
    <input type="radio" name='agama' value="Budha" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 4px 5px; float:left;border:0px solid gray;">Budha</div>
    <input type="radio" name='agama' value="Hindu" required id="radio" style="float:left; margin-top:3px;"/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Hindu</div>
    <input type="radio" name='agama' value="Khonghucu" required id="radio" style="float:left; margin-top:3px;" checked/>
    <div style="margin:1px 5px 0px 5px; float:left;border:0px solid gray;">Khonghucu</div>
	<?php }
	elseif($arr5['agama']=="Islam")
	{?>
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
	<?php }

	?>
    </td>
  </tr>
  <tr>
  	<td>Pendidikan</td>
    <td><input type="text" name='pendidikan' required id="input"value="<?php echo $arr5['pendidikan'];?>"/><span class="notification">Lulusan pendidikan terakhir yang ditempuh</span></td>
  </tr>
  <tr>
  	<td>Kompetensi Keahlian</td>
    <td>
    <select name="keahlian" required id="select">
    <option value=""></option>
    <?php
    $qry1=que("select * from tb_keahlian order by nama_keahlian asc");
	while($arr1=fetch($qry1))
	{
		if($arr1['0']==$arr5['kode_keahlian'])
		{echo "<option value='$arr1[0]' selected>$arr1[2]</option>";}
		else
		{echo "<option value='$arr1[0]'>$arr1[2]</option>";}
	}
	?>
    </select>
    <span class="notification">Mengajar bagian keahlian</span>
    </td>
  </tr>
  <tr>
  	<td>Status</td>
    <td>
    <?php
    if($arr5['status']=="Guru Bantu")
	{
?>   	<input type="radio" name='status' value="Guru Bantu" checked required id="radio"/><div style="margin:-15px 0px 4px 20px; border:0px solid gray;">Guru Bantu</div>
    	<input type="radio" name='status' value="Guru Tetap" required id="radio"/><div style="margin:-15px 0px 0px 20px; border:0px solid gray;">Guru Tetap</div>
<?php	
	}
	else
	{
?>   	<input type="radio" name='status' value="Guru Bantu" required id="radio"/><div style="margin:-15px 0px 4px 20px; border:0px solid gray;">Guru Bantu</div>
    	<input type="radio" name='status' value="Guru Tetap" checked required id="radio"/><div style="margin:-15px 0px 0px 20px; border:0px solid gray;">Guru Tetap</div>
<?php	
	}	
	?>
    
    </td>
  </tr>
 	<tr>
    <td>&nbsp;</td>
  	<td>
    	<input type='submit' id='simpan' value='Edit' class="btn2"/> 
      <input type='reset' name='reset' value='Hapus' class="btn2"/>
      <input type="button" value="Kembali" onclick="pages('guru.php');" class="btn2"/>      
      <input type="button" value="Lewati" onclick="pg('guru_photo.php?id=<?php echo $arr5['0'];?>');" class="btn2"/>      
    </td>
  </tr>
</table>
</form>
<?php
}
?>