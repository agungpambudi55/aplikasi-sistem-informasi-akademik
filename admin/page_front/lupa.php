<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
if(isset($_GET['kode']))
{
			echo "0|<div class='notif'>Maaf belum bisa mencari, masih ada perbaikan sistem</div>";
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
			url: "admin/page_front/lupa.php?"+data,
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
				{pages('admin/page_front/beranda.php');}
			}
		});
	});
});
</script>
<div id="jud"><span id="judul">Dapatkan Kata Sandi Kembali</span></div>
<form id="formtambah" action="#" method="get">
<table id="form" width="500">
  <tr>
  	<td width="40%">Kode</td>
    <td width="60%"><input type="text" name='kode'  required maxlength='20' id="input"/><span class="notification">Jika siswa masukkan NIS, jika guru masukkan NIP</span>	</td>
  </tr>
  <tr>
  	<td width="40%">Nama Lengkap</td>
    <td width="60%"><input type="text" name='kode'  required maxlength='20' id="input"/></td>
  </tr>
  <tr>
  	<td width="40%">Alamat</td>
    <td width="60%"><input type="text" name='kode'  required maxlength='20' id="input"/></td>
  </tr>
 	<tr>
    <td>&nbsp;</td>
  	<td>
    	<input type="submit" id="tl" value="Dapatkan"/> 
    </td>
  </tr>
</table>
</form>
<?php
}
?>