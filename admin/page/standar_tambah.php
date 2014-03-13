<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
?>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian standar kompetensi, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('standar.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Standar Kompetensi</div>
<?php
if(isset($_GET['keahlian']))
{
		$nama=ucfirst(esc($_GET['nama']));
		$simpan = que("INSERT INTO tb_standar VALUES(
		'NULL',
		'".$_GET['keahlian']."',
		'".$nama."',
		'".$_GET['kelas']."'
		)");	
		if($simpan)
		{   echo "0|<div class='notif'>Data berhasil disimpan</div>"; }
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
			url: "standar_tambah.php?"+data,
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
				{pages('standar_tambah.php');}
			}
		});
	});
});
</script>
<form id="formtambah" action="#" method="get">
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
    <span class="notification">Pilih sesuai standar kompetensi</span>
    </td>
  </tr>
  <tr>
  	<td>Kelas</td>
    <td>
    <select name="kelas" required id="select">
    <option value=""></option>
    <option value="10 Semester Ganjil">10 Semester Ganjil</option>
    <option value="10 Semester Genap">10 Semester Genap</option>
    <option value="11 Semester Ganjil">11 Semester Ganjil</option>
    <option value="11 Semester Genap">11 Semester Genap</option>
    <option value="12 Semester Ganjil">12 Semester Ganjil</option>
    <option value="12 Semester Genap">12 Semester Genap</option>
	</select>
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
      <input type="button" value="Kembali" onclick="pages('standar.php');" class="btn2"/>      
    </td>
  </tr>
</table>
</form>
<?php
}
?>