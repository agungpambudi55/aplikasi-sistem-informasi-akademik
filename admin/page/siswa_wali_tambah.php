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
<div id="progres_data">Asal</div><div id="progres_panah_d"></div>
<div id="progres_data_e">Wali</div><div id="progres_panah_a"></div>
<div id="progres_data">Jurusan</div><div id="progres_panah_d"></div>
<div id="progres_data">Photo</div><div id="progres_panah"></div>
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
		$simpan = que("INSERT INTO tb_wali VALUES (NULL, '$id', '$na', '$_GET[pendidikan_ayah]', '$pa', '$ni', '$_GET[pendidikan_ayah]', '$pi', '$nw', '$_GET[pendidikan_wali]', '$pw', '$_GET[telpon]$_GET[telponw]', '$alamat$alamatw');");
		if($simpan)
		{  
		 echo "0|<div class='notif'>Data berhasil disimpan</div>"; 
?><script>$(document).ready(function(){$('#lanjut').show(0);$("#lanjut").focus();$('#simpan').hide(0);$('#reset').hide(0);$('#tab').hide(0);});</script><?php 		
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
			url: "siswa_wali_tambah.php?"+data,
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
				{pages('siswa_wali_tambah.php');}
			}
		});
	});
});
</script>
<form id="formtambah" action="#" method="get">
<input type="hidden" name="id" value="<?php echo $id;?>"/>
<?php
if($_GET['tab']=="")
{?>
<div id="tab">
<div id="taba" onclick="pg('siswa_wali_tambah.php?id=<?php echo $id;?>');" style=" background:#028DD0">Orang Tua</div>
<div id="tabb" onclick="pg('siswa_wali_tambah.php?id=<?php echo $id;?>&tab=tes');" >Orang Lain</div>	
</div>
<table id="form">
  <tr>
  	<td style="width:165px">Nama Ayah</td>
    <td><input type="text" name='nama_ayah' id="input" required/></td>
  </tr>
  <tr>
  	<td>Pendidikan Ayah</td>
    <td>
    	<select name="pendidikan_ayah" required id="select">
        	<option></option>
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
        </select>
    </td>
  </tr>
  <tr>
  	<td>Pekerjaan Ayah</td>
    <td><input type="text" name='pekerjaan_ayah' required id="input"/></td>
  </tr>
  <tr>
  	<td style="width:165px">Nama Ibu</td>
    <td><input type="text" name='nama_ibu' id="input" required/></td>
  </tr>
  <tr>
  	<td>Pendidikan Ibu</td>
    <td>
    	<select name="pendidikan_Ibu" required id="select">
        	<option></option>
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
        </select>
    </td>
  </tr>
  <tr>
  	<td>Pekerjaan Ibu</td>
    <td><input type="text" name='pekerjaan_ibu' required id="input"/></td>
  </tr>
  <tr>
  	<td>Alamat</td>
    <td><input type="text" name='alamat' required id="input"/></td>
  </tr>
  <tr>
  	<td>Telpon</td>
    <td><input type="text" name='telpon' required id="input"  pattern="\-?\d+(\.\d{0,})?" maxlength="12"/></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  	<td>
      <input type='submit' id='simpan' value='Simpan' class="btn2"/> 
      <input type='button' id='lanjut' value='Lanjut' class="btn2" style="display:none" onclick="pages('siswa_jurusan_tambah.php?id=<?php echo $id;?>');"/> 
      <input type='reset' name='reset' id="reset" value='Hapus' class="btn2"/>
    </td>
  </tr>
</table>
<?php }
else
{?>
<div id="tab">
<div id="taba" onclick="pg('siswa_wali_tambah.php?id=<?php echo $id;?>');">Orang Tua</div>
<div id="tabb" onclick="pg('siswa_wali_tambah.php?id=<?php echo $id;?>&tab=tes');" style=" background:#028DD0" >Orang Lain</div>	
</div>
<table id="form">
  <tr>
  	<td style="width:165px">Nama Wali</td>
    <td><input type="text" name='nama_wali' id="input" required/></td>
  </tr>
  <tr>
  	<td>Pendidikan Wali</td>
    <td>
    	<select name="pendidikan_wali" required id="select">
        	<option></option>
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
        </select>
    </td>
  </tr>
  <tr>
  	<td>Pekerjaan Wali</td>
    <td><input type="text" name='pekerjaan_wali' required id="input"/></td>
  </tr>
  <tr>
  	<td>Alamat</td>
    <td><input type="text" name='alamatw' required id="input"/></td>
  </tr>
  <tr>
  	<td>Telpon</td>
    <td><input type="text" name='telponw' required id="input"  pattern="\-?\d+(\.\d{0,})?" maxlength="12"/></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  	<td>
      <input type='submit' id='simpan' value='Simpan' class="btn2"/> 
      <input type='button' id='lanjut' value='Lanjut' class="btn2" style="display:none" onclick="pg('siswa_jurusan_tambah.php?id=<?php echo $id;?>');"/> 
      <input type='reset' name='reset' id="reset" value='Hapus' class="btn2"/>
    </td>
  </tr>
</table>


<?php }
?></form><?php
}
?>