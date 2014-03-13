<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
?>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian kompetensi keahlian, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('keahlian.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Kompetensi Keahlian</div>
<?php
if(isset($_GET['kode']))
{
	if(strlen($_GET['kode'])<2)
	{
		echo "0|<div class='notif'>Kode harus ada 2, yang anda masukkan hanya ".strlen($_GET['kode'])." kode</div>";		
	}
	else
	{
		$cek 		= que("SELECT * FROM tb_keahlian WHERE kode_keahlian='".$_GET['kode']."';");
		if(num($cek)>0)
		{
			echo "0|<div class='notif'>Kode $_GET[kode] telah digunakan, pilih kode lain</div>";
		}
		else
		{
			$nama=ucwords(esc($_GET['nama']));
			$simpan = que("INSERT INTO tb_keahlian VALUES(
			'".$_GET['kode']."',
			'".$_GET['prodi']."',
			'".$nama."'
			)");	
			if($simpan)
			{   echo "0|<div class='notif'>Data berhasil disimpan</div>"; }
			else
			{	echo "0|<div class='notif'>Data gagal disimpan</div>"; }
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
			url: "keahlian_tambah.php?"+data,
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
				{pages('keahlian_tambah.php');}
			}
		});
	});
});
</script>
<form id="formtambah" action="#" method="get">
<table id="form">
  <tr>
  	<td style="width:165px">Kode</td>
    <td><input type="text" name='kode'  required maxlength='2' pattern="\-?\d+(\.\d{0,})?" id="input"/><span class="notification">Masukkan 2 kode angka</span></td>
  </tr>
  <tr>
  	<td>Program Studi Keahlian</td>
    <td>
    <select name="prodi" required id="select">
    <option value=""></option>
    <?php
    $qry1=que("select * from tb_prodi order by nama_prodi asc");
	while($arr1=fetch($qry1))
	{echo "<option value='$arr1[0]'>$arr1[2]</option>";}
	?>
    </select>
    <span class="notification">Pilih sesuai program studi keahlian</span>
    </td>
  </tr>
  <tr>
  	<td>Nama</td>
    <td><input type="text" name='nama' required id="input"/></td>
  </tr>
 	<tr>
    <td>&nbsp;</td>
  	<td>
    	<input type='submit' id='simpan' value='Simpan' class="btn2"/> 
      <input type='reset' name='reset' value='Hapus' class="btn2"/>
      <input type="button" value="Kembali" onclick="pages('keahlian.php');" class="btn2"/>      
    </td>
  </tr>
</table>
</form>
<?php
}
?>