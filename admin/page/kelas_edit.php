<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$qry=que("select * from tb_kelas where kode_kelas='$_GET[id]'");
$arr=fetch($qry);
?>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian kelas, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('siswa.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Kelas</div>
<?php
if(isset($_GET['nama']))
{
			$nama=ucwords(esc($_GET['nama']));
			$simpan = que("update tb_kelas set kode_keahlian='$_GET[keahlian]', nama_kelas='".$nama."' where kode_kelas=$_GET[id]");	
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
			url: "kelas_edit.php?"+data,
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
				{pages('siswa_tambah.php');}
			}
		});
	});
});
</script>
<form id="formtambah" action="#" method="get">
<input type="hidden" name="id" value="<?php echo $arr['0']?>" />
<table id="form">
  <tr>
  	<td>Kompetensi Keahlian</td>
    <td>
    <select name="keahlian" required id="select">
    <option value=""></option>
    <?php
    $qry1=que("select * from tb_keahlian order by nama_keahlian asc");
	while($arr1=fetch($qry1))
	{ if($arr1['0']==$arr['1']){echo "<option value='$arr1[0]' selected>$arr1[2]</option>";}else{echo "<option value='$arr1[0]'>$arr1[2]</option>";}}
	?>
    </select>    
    </td>
  </tr>
  <tr>
  	<td style="width:165px">Nama</td>
    <td><input type="text" name='nama' required maxlength='1'  id="input" value="<?php echo $arr['2'];?>"/></td>
  </tr>
 	<tr>
    <td>&nbsp;</td>
  	<td>
    	<input type='submit' id='simpan' value='Simpan' class="btn2"/> 
      <input type='reset' name='reset' value='Hapus' class="btn2"/>
      <input type="button" value="Kembali" onclick="pages('kelas.php');" class="btn2"/>      
    </td>
  </tr>
</table>
</form>
<?php
}
?>