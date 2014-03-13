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
<div id="progres_data">Wali</div><div id="progres_panah_d"></div>
<div id="progres_data_e">Jurusan</div><div id="progres_panah_a"></div>
<div id="progres_data">Photo</div><div id="progres_panah"></div>
</div>
<?php
if(isset($_GET['keahlian']))
{
		$simpan = que("UPDATE tb_siswa SET kode_keahlian = '$_GET[keahlian]',tgl_masuk='$_GET[keahlian]', tgl_masuk='$_GET[tgl_masuk]-$_GET[bln_masuk]-$_GET[thn_masuk]' WHERE kode_siswa = '$_GET[id]';");
		if($simpan)
		{  
		 echo "0|<div class='notif'>Data berhasil disimpan</div>"; 
?><script>$(document).ready(function(){$('#lanjut').show(0);$("#lanjut").focus();$('#simpan').hide(0);$('#reset').hide(0);});</script><?php 		
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
			url: "siswa_jurusan_tambah.php?"+data,
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
				{pages('siswa_jurusan_tambah.php');}
			}
		});
	});
});
</script>
<form id="formtambah" action="#" method="get">
<input type="hidden" name="id" value="<?php echo $id;?>"/>
<table id="form">
  <tr>
  	<td style="width:165px">Kompetensi Keahlian</td>
    <td>
    <select name="keahlian" required id="select">
    <option value=""></option>
    <?php
    $qry1=que("select * from tb_keahlian order by nama_keahlian asc");
	while($arr1=fetch($qry1))
	{echo "<option value='$arr1[0]'>$arr1[2]</option>";}
	?>
    </select>
    <span class="notification">Pilih sesuai kompetensi keahlian yang diambil</span>
    </td>
    </tr>
  <tr>
  <td>Tanggal Ajaran Masuk</td>
  <td>
    <select name="tgl_masuk" required id="select1">
    <option value=""></option>
    <?php
    for($tgl=1;$tgl<=31;$tgl++)
	{ if($tgl<10){$tgl="0".$tgl;}; echo "<option value='$tgl'>$tgl</option>";}
	?>
    </select>
    <select name="bln_masuk" required id="select2">
    <option value=""></option>
    <?php
    for($bln=1;$bln<=12;$bln++)
	{
		if($bln<10){$bln="0".$bln;};
		echo "<option value='$bln'>".bulan($bln)."</option>";}
	?>
    </select>
    <select name="thn_masuk" required id="select3">
    <option value=""></option>
    <?php
    for($th=2000;$th<=2020;$th++)
	{echo "<option value='$th'>$th</option>";}
	?>
    </select>
    </td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  	<td>
      <input type='submit' id='simpan' value='Simpan' class="btn2"/> 
      <input type='button' id='lanjut' value='Lanjut' class="btn2" style="display:none" onclick="pg('siswa_photo.php?id=<?php echo $id;?>');"/> 
      <input type='reset' name='reset' id="reset" value='Hapus' class="btn2"/>
    </td>
  </tr>
</table>
</form>
<?php
}
?>