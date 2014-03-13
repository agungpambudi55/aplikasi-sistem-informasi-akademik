<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$qqqq=que("select * from tb_bidang where kode_bidang='$_GET[id]'");
$qqaa=fetch($qqqq);
?>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian bidang studi, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('bidang.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Bidang Studi Keahlian</div>
<?php
if(isset($_GET['kode']))
{
		$nama=ucwords(esc($_GET['nama']));
		$simpan = que("UPDATE tb_bidang SET kode_bidang='".$_GET['kode']."', nama_bidang='".$nama."' WHERE kode_bidang='$_GET[kode]';");	
		if($simpan)
		{   echo "0|<div class='notif'>Data berhasil diedit</div>"; }
		else
		{	echo "0|<div class='notif'>Data gagal diedit</div>"; }
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
			url: "bidang_edit.php?"+data,
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
				{pages('bidang_tambah.php');}
			}
		});
	});
});
</script>
<form id="formtambah" action="#" method="get">
<table id="form">
  <tr>
  	<td style="width:165px">Kode</td>
    <td><input type="text" name='kode' readonly maxlength='4' pattern="\-?\d+(\.\d{0,})?" id="input_readonly" value="<?php echo $qqaa['0'];?>"/></td>
  </tr>
  <tr>
  	<td>Nama</td>
    <td><input type="text" name='nama' required id="input" value="<?php echo $qqaa['1'];?>"/></td>
  </tr>
 	<tr>
    <td>&nbsp;</td>
  	<td>
    	<input type='submit' id='simpan' value='Edit' class="btn2"/> 
      <input type='reset' name='reset' value='Hapus' class="btn2"/>
      <input type="button" value="Kembali" onclick="pages('bidang.php');" class="btn2"/>      
    </td>
  </tr>
</table>
</form>
<?php
}
?>