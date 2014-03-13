<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
?>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian guru sk, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('guru_sk.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Guru Standar Kompetensi</div>
<?php
if(isset($_GET['guru']))
{
			$cek 		= que("SELECT * FROM tb_guru_sk WHERE kode_standar='".$_GET['sk']."' AND kode_guru='".$_GET['guru']."';");
			if(num($cek)>0)
			{
				echo "0|<div class='notif'>Data sudah ada</div>";
			}
			else
			{
				$simpan = que("INSERT INTO tb_guru_sk VALUES(
				'NULL',
				'".$_GET['sk']."',
				'".$_GET['guru']."'
				)");	
				if($simpan)
				{   echo "0|<div class='notif'>Data berhasil disimpan</div>"; }
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
			url: "guru_sk_tambah.php?"+data,
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
				{pages('guru_sk_tambah.php');}
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
    <select name="keahlian" required id="select" onchange="$('.guru_sk').load('guru_sk_load.php?id='+this.value);$('.sk').load('guru_sk_ne_load.php?id='+this.value);">
    <option value=""></option>
    <?php
    $qry1=que("select * from tb_keahlian order by nama_keahlian asc");
	while($arr1=fetch($qry1))
	{echo "<option value='$arr1[0]'>$arr1[2]</option>";}
	?>
    </select>
    <span class="notification">Pilih sesuai kompetensi keahlian guru</span>
    </td>
  </tr>
  <tr>
    <td>Guru</td>
    <td>
    <select name="guru" required id="select" class="guru_sk">
    </select>
    </td>
  </tr>  
  <tr>
    <td>Standar Kompetensi</td>
    <td>
    <select name="sk" required id="select" class="sk">
    </select>
    </td>
  </tr>  
 	<tr>
    <td>&nbsp;</td>
  	<td>
    	<input type='submit' id='simpan' value='Simpan' class="btn2"/> 
      <input type='reset' name='reset' value='Hapus' class="btn2"  onclick="pages('guru_sk_tambah.php');"/>
      <input type="button" value="Kembali" onclick="pages('guru_sk.php');" class="btn2"/>      
    </td>
  </tr>
</table>
</form>
<?php
}
?>