<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$qqqq=que("select tb_guru_sk.kode_guru_sk, tb_keahlian.kode_keahlian, tb_standar.kode_standar, tb_guru.kode_guru from tb_guru_sk, tb_standar, tb_keahlian, tb_guru where tb_guru_sk.kode_guru=tb_guru.kode_guru and tb_guru_sk.kode_standar=tb_standar.kode_standar and tb_keahlian.kode_keahlian=tb_standar.kode_keahlian and tb_guru_sk.kode_guru_sk='$_GET[id]'");
$qqaa=fetch($qqqq);
?>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian guru sk, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('guru_sk.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Guru Standar Kompetensi</div>
<?php
if(isset($_GET['sk']))
{
	$cek 		= que("SELECT * FROM tb_guru_sk WHERE kode_standar='".$_GET['sk']."' AND kode_guru='".$_GET['guru']."';");
	if(num($cek)>0)
	{
		echo "0|<div class='notif'>Data sudah ada</div>";
	}
	else
	{
		$simpan = que("UPDATE db_akademik.tb_guru_sk SET kode_standar = '$_GET[sk]', kode_guru = '$_GET[guru]' WHERE tb_guru_sk.kode_guru_sk ='$_GET[id]';");	
		if($simpan)
		{   echo "0|<div class='notif'>Data berhasil diedit</div>"; }
		else
		{	echo "0|<div class='notif'>Data gagal diedit</div>"; }
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
			url: "guru_sk_edit.php?"+data,
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
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
<table id="form">
  <tr>
  	<td style="width:165px">Kompetensi Keahlian</td>
    <td>
    <select name="keahlian" required id="select" onchange="$('.guru_sk').load('guru_sk_load.php?id='+this.value);$('.sk').load('guru_sk_ne_load.php?id='+this.value);">
    <option value=""></option>
    <?php
    $qry1=que("select * from tb_keahlian order by nama_keahlian asc");
	while($arr1=fetch($qry1))
	{ if($arr1['0']==$qqaa['1']){echo "<option value='$arr1[0]' selected>$arr1[2]</option>";}else{echo "<option value='$arr1[0]'>$arr1[2]</option>";}}
	?>
    </select>
    <span class="notification">Pilih sesuai kompetensi keahlian guru</span>
    </td>
  </tr>
  <tr>
    <td>Guru</td>
    <td>
    <select name="guru" required id="select" class="guru_sk">
    <?php
    $qry2=que("select * from tb_guru where kode_keahlian='$qqaa[1]' order by nama_guru asc");
	while($arr2=fetch($qry2))
	{ 
		if($arr2['0']==$qqaa['3']){echo "<option value='$arr2[0]' selected>$arr2[2]</option>";}else{echo "<option value='$arr2[0]'>$arr2[2]</option>";}
	}
	?>
    </select>
    </td>
  </tr>  
  <tr>
    <td>Standar Kompetensi</td>
    <td>
    <select name="sk" required id="select" class="sk">
    <?php
    $qry3=que("select * from tb_standar where kode_keahlian='$qqaa[1]' order by nama_standar asc");
	while($arr3=fetch($qry3))
	{ 
		if($arr3['0']==$qqaa['2']){echo "<option value='$arr3[0]' selected>$arr3[2]</option>";}else{echo "<option value='$arr3[0]'>$arr3[2]</option>";}
	}
	?>
    </select>
    </td>
  </tr>  
 	<tr>
    <td>&nbsp;</td>
  	<td>
    	<input type='submit' id='simpan' value='Edit' class="btn2"/> 
      <input type='reset' name='reset' value='Hapus' class="btn2"  onclick="pages('guru_sk_edit.php?id=<?php echo $_GET['id'];?>');"/>
      <input type="button" value="Kembali" onclick="pages('guru_sk.php');" class="btn2"/>      
    </td>
  </tr>
</table>
</form>
<?php
}
?>