<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$qqqq=que("select * from tb_berita where kode_berita='$_GET[id]'");
$qqaa=fetch($qqqq);
?>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian berita, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('berita.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Posting Berita</div>
<?php
if(isset($_GET['kode']))
{
		$nama=ucfirst(esc($_GET['isi']));
		$simpan = que("UPDATE tb_berita SET judul='".$_GET['judul']."', isi='".$nama."' WHERE kode_berita='$_GET[kode]';");	
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
			url: "berita_edit.php?"+data,
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
				{pages('berita_edit.php');}
			}
		});
	});
});
</script>
<form id="formtambah" action="#" method="get">
<input type="hidden" name="kode" value="<?php echo $_GET['id'];?>" />
<table id="form">
  <tr>
  	<td style="width:165px">Judul</td>
    <td><input type="text" name='judul' required id="input" value="<?php echo $qqaa['judul'];?>"/></td>
  </tr>
			<tr>
				<td>Isi</td>                        
				<td><textarea name="isi" required="required"><?php echo $qqaa['isi'];?></textarea></td>                        
            </tr>
 	<tr>
    <td>&nbsp;</td>
  	<td>
    	<input type='submit' id='simpan' value='Edit' class="btn2"/> 
      <input type='reset' name='reset' value='Hapus' class="btn2"/>
      <input type="button" value="Kembali" onclick="pages('berita.php');" class="btn2"/>      
    </td>
  </tr>
</table>
</form>
<?php
}
?>