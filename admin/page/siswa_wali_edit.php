<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$id=$_GET['id'];
$qry_edit=que("select * from tb_wali where kode_siswa='$id'");
$arr_edit=fetch($qry_edit);
?>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian siswa, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('siswa.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Siswa</div>
<div id="progres">
<div id="progres_data_b" onClick="pg('siswa_edit.php?id=<?php echo $id;?>')" style="cursor:pointer">Identitas</div><div id="progres_panah_d"></div>
<div id="progres_data" onclick="pg('siswa_asal_edit.php?id=<?php echo $id;?>');" style="cursor:pointer">Asal</div><div id="progres_panah_d"></div>
<div id="progres_data_e">Wali</div><div id="progres_panah_a"></div>
<div id="progres_data" onclick="pg('siswa_jurusan_edit.php?id=<?php echo $id;?>');" style="cursor:pointer">Jurusan</div><div id="progres_panah_d"></div>
<div id="progres_data" onclick="pg('siswa_photo.php?id=<?php echo $id;?>');" style="cursor:pointer">Photo</div><div id="progres_panah"></div>
</div>
<div id="tab_wali">
<div id="tab_a"></div>
</div>
<?php
if(isset($_GET['telpon']) || isset($_GET['telponw']))
{
		$na=ucwords($_GET['nama_ayah']);
		$ni=ucwords($_GET['nama_ibu']);
		$alamatw=ucwords($_GET['alamatw']);
		$nw=ucwords($_GET['nama_wali']);
		$alamat=ucwords($_GET['alamat']);
		$pa=ucwords($_GET['pekerjaan_ayah']);
		$pi=ucwords($_GET['pekerjaan_ibu']);		
		$pw=ucwords($_GET['pekerjaan_wali']);		
		$simpan = que("update tb_wali set 
		nama_ayah='$na', 
		pendidikan_ayah='$_GET[pendidikan_ayah]', 
		pekerjaan_ayah='$pa', 
		nama_ibu='$ni', 
		pendidikan_ibu='$_GET[pendidikan_ibu]', 
		pekerjaan_ibu='$pi', 
		nama_wali='$nw', 
		pendidikan_wali='$_GET[pendidikan_wali]', 
		pekerjaan_wali='$pw', 
		telpon='$_GET[telpon]$_GET[telponw]', 
		alamat='$alamat$alamatw'
		where kode_wali=$_GET[kode];");
		if($simpan)
		{  
		 echo "0|<div class='notif'>Data berhasil disimpan</div>"; 
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
			url: "siswa_wali_edit.php?"+data,
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
				{pages('siswa_wali_edit.php');}
			}
		});
	});
});
</script>
<form id="formtambah" action="#" method="get">
<input type="hidden" name="kode" value="<?php echo $arr_edit['0'];?>"/>
<?php
if($_GET['tab']=="")
{?>
<div id="tab">
<div id="taba" onclick="pg('siswa_wali_edit.php?id=<?php echo $id;?>');" style=" background:#028DD0">Orang Tua</div>
<div id="tabb" onclick="pg('siswa_wali_edit.php?id=<?php echo $id;?>&tab=tes');" >Orang Lain</div>	
</div>
<table id="form">
  <tr>
  	<td style="width:165px">Nama Ayah</td>
    <td><input type="text" name='nama_ayah' id="input" required value="<?php echo $arr_edit['nama_ayah'];?>"/></td>
  </tr>
  <tr>
  	<td>Pendidikan Ayah</td>
    <td>
    	<select name="pendidikan_ayah" required id="select">
        	<option></option>
            <?php
		if($arr_edit['pendidikan_ayah']=="")
		{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
		<?php }
		else
		{

            if($arr_edit['pendidikan_ayah']=="SD")
			{?>
        	<option value="SD" selected>SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ayah']=="SLTP")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP" selected>SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ayah']=="SLTA")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA" selected>SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ayah']=="D1")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1" selected>D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ayah']=="D2")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2" selected>D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ayah']=="D3")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3" selected>D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ayah']=="D4")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4" selected>D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ayah']=="S1")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1" selected>S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ayah']=="S2")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2" selected>S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ayah']=="S3")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3" selected>S3</option>            
			<?php }
		}?>
        </select>
    </td>
  </tr>
  <tr>
  	<td>Pekerjaan Ayah</td>
    <td><input type="text" name='pekerjaan_ayah' required id="input" value="<?php echo $arr_edit['pekerjaan_ayah'];?>"/></td>
  </tr>
  <tr>
  	<td style="width:165px">Nama Ibu</td>
    <td><input type="text" name='nama_ibu' id="input" required value="<?php echo $arr_edit['nama_ibu'];?>"/></td>
  </tr>
  <tr>
  	<td>Pendidikan Ibu</td>
    <td>
    	<select name="pendidikan_ibu" required id="select">
        	<option></option>
            <?php
		if($arr_edit['pendidikan_ibu']=="")
		{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
		<?php }
		else
		{

            if($arr_edit['pendidikan_ibu']=="SD")
			{?>
        	<option value="SD" selected>SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ibu']=="SLTP")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP" selected>SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ibu']=="SLTA")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA" selected>SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ibu']=="D1")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1" selected>D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ibu']=="D2")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2" selected>D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ibu']=="D3")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3" selected>D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ibu']=="D4")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4" selected>D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ibu']=="S1")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1" selected>S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ibu']=="S2")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2" selected>S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_ibu']=="S3")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3" selected>S3</option>            
			<?php }
		}?>
        </select>
    </td>
  </tr>
  <tr>
  	<td>Pekerjaan Ibu</td>
    <td><input type="text" name='pekerjaan_ibu' required id="input" value="<?php echo $arr_edit['pekerjaan_ibu'];?>"/></td>
  </tr>
  <tr>
  	<td>Alamat</td>
    <td><input type="text" name='alamat' required id="input" value="<?php if($arr_edit['pekerjaan_wali']==""){echo $arr_edit['alamat'];}?>"/></td>
  </tr>
  <tr>
  	<td>Telpon</td>
    <td><input type="text" name='telpon' required id="input"  pattern="\-?\d+(\.\d{0,})?" maxlength="12" value="<?php if($arr_edit['pekerjaan_wali']==""){echo $arr_edit['telpon'];}?>"/></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  	<td>
      <input type='submit' id='simpan' value='Edit' class="btn2"/> 
      <input type='reset' name='reset' id="reset" value='Hapus' class="btn2"/>
      <input type='button' id='kem' value='Kembali' class="btn2" onclick="pg('siswa_asal_edit.php?id=<?php echo $id;?>');"/> 
      <input type='button' id='lanjut' value='Lewati' class="btn2" onclick="pg('siswa_jurusan_edit.php?id=<?php echo $id;?>');"/> 
    </td>
  </tr>
</table>
<?php }
else
{?>
<div id="tab">
<div id="taba" onclick="pg('siswa_wali_edit.php?id=<?php echo $id;?>');">Orang Tua</div>
<div id="tabb" onclick="pg('siswa_wali_edit.php?id=<?php echo $id;?>&tab=tes');" style=" background:#028DD0" >Orang Lain</div>	
</div>
<table id="form">
  <tr>
  	<td style="width:165px">Nama Wali</td>
    <td><input type="text" name='nama_wali' id="input" required value="<?php echo $arr_edit['nama_wali'];?>"/></td>
  </tr>
  <tr>
  	<td>Pendidikan Wali</td>
    <td>
    	<select name="pendidikan_wali" required id="select">
        	<option></option>
            <?php
		if($arr_edit['pendidikan_wali']=="")
		{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
		<?php }
		else
		{
            if($arr_edit['pendidikan_wali']=="SD")
			{?>
        	<option value="SD" selected>SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_wali']=="SLTP")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP" selected>SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_wali']=="SLTA")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA" selected>SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_wali']=="D1")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1" selected>D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_wali']=="D2")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2" selected>D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_wali']=="D3")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3" selected>D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_wali']=="D4")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4" selected>D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_wali']=="S1")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1" selected>S1</option>
        	<option value="S2">S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_wali']=="S2")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2" selected>S2</option>
        	<option value="S3">S3</option>            
			<?php }
            elseif($arr_edit['pendidikan_wali']=="S3")
			{?>
        	<option value="SD">SD</option>
        	<option value="SLTP">SLTP</option>
        	<option value="SLTA">SLTA</option>
        	<option value="D1">D1</option>
        	<option value="D2">D2</option>
        	<option value="D3">D3</option>
        	<option value="D4">D4</option>
        	<option value="S1">S1</option>
        	<option value="S2">S2</option>
        	<option value="S3" selected>S3</option>            
			<?php }
		}?>
        </select>
    </td>
  </tr>
  <tr>
  	<td>Pekerjaan Wali</td>
    <td><input type="text" name='pekerjaan_wali' required id="input" value="<?php echo $arr_edit['pekerjaan_wali'];?>"/></td>
  </tr>
  <tr>
  	<td>Alamat</td>
    <td><input type="text" name='alamatw' required id="input" value="<?php if($arr_edit['pekerjaan_ayah']==""){echo $arr_edit['alamat'];}?>"/></td>
  </tr>
  <tr>
  	<td>Telpon</td>
    <td><input type="text" name='telponw' required id="input"  pattern="\-?\d+(\.\d{0,})?" maxlength="12" value="<?php if($arr_edit['pekerjaan_ayah']==""){echo $arr_edit['telpon'];}?>"/></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  	<td>
      <input type='submit' id='simpan' value='Edit' class="btn2"/> 
      <input type='reset' name='reset' id="reset" value='Hapus' class="btn2"/>
      <input type='button' id='kem' value='Kembali' class="btn2" onclick="pg('siswa_asal_edit.php?id=<?php echo $id;?>');"/> 
      <input type='button' id='lanjut' value='Lewati' class="btn2" onclick="pg('siswa_jurusan_edit.php?id=<?php echo $id;?>');"/> 
    </td>
  </tr>
</table>
<?php }
?></form><?php
}
?>