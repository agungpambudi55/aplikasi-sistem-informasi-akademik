<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$qry_det =mysql_query("select * from tb_siswa, tb_keahlian where tb_siswa.kode_keahlian=tb_keahlian.kode_keahlian and kode_siswa='$_GET[id_detail]'");
$arr_det =mysql_fetch_array($qry_det);
$qry_wali=mysql_query("select * from tb_wali where kode_siswa='$arr_det[0]'");
$arr_wali=mysql_fetch_array($qry_wali);
?>
<script>
$(document).ready(function(){
	$('#wali').hide(0);
	$('#tab2a').click(function(){$('#wali').hide(0);$('#iden').show(0);});
	$('#tab2b').click(function(){$('#wali').show(0);$('#iden').hide(0);});
});
</script>
<div id="kotak_detail">
<div id="photo_detail">
<div id="photo_detail_gandul"></div>
<div id="photo_detail_tali_l"></div>
<div id="photo_detail_tali_r"></div>
<?php
if($arr_det['photo']=="")
{?><img src="../image/siswa/default.png" width="140" height="150"><?php }
else
{?><img src="../image/siswa/<?php echo $arr_det['photo'];?>" width="140" height="150"><?php }
?>
</div>
<div id="tab2">
<div id="tab2a">Identitas</div>
<div id="tab2b">Wali</div>
</div>
<div id="iden">
<b># Nama</b><br>
<p><?php echo $arr_det['nama'];?></p>
<b># NISN</b><br>
<p><?php echo $arr_det['nisn'];?></p>
<b># NIS</b><br>
<p><?php echo $arr_det['nis'];?></p>
<b># Jenis Kelamin</b><br>
<p><?php echo $arr_det['jenis_kelamin'];?></p>
<b># Tempat, Tanggal Lahir</b><br>
<p><?php echo $arr_det['tmp_lahir'].", ".substr($arr_det['tgl_lahir'],0,2)." ".bulan(substr($arr_det['tgl_lahir'],3,2))." ".substr($arr_det['tgl_lahir'],6,4);?></p>
<b># Alamat</b><br>
<p><?php echo $arr_det['alamat'];?></p>
<b># Telpon</b><br>
<p><?php echo $arr_det['telpon'];?></p>
<b># Kompetensi Keahlian</b>
<p><?php echo $arr_det['nama_keahlian'];?></p>
<b># Tanggal Masuk</b>
<p><?php echo substr($arr_det['tgl_masuk'],0,2)." ".bulan(substr($arr_det['tgl_masuk'],3,2))." ".substr($arr_det['tgl_masuk'],6,4);?></p>
</div>

<div id="wali">
<?php
if($arr_wali['nama_wali']=="")
{
?>
<b># Nama Ayah</b><br>
<p><?php echo $arr_wali['nama_ayah'];?></p>
<b># Pendidikan Ayah</b><br>
<p><?php echo $arr_wali['pendidikan_ayah'];?></p>
<b># Pekerjaan Ayah</b><br>
<p><?php echo $arr_wali['pekerjaan_ayah'];?></p>
<b># Nama Ibu</b><br>
<p><?php echo $arr_wali['nama_ibu'];?></p>
<b># Pendidikan Ibu</b><br>
<p><?php echo $arr_wali['pendidikan_ibu'];?></p>
<b># Pekerjaan Ibu</b><br>
<p><?php echo $arr_wali['pekerjaan_ibu'];?></p>
<?php
}
else
{
?>
<b># Nama Wali</b><br>
<p><?php echo $arr_wali['nama_wali'];?></p>
<b># Pendidikan Wali</b><br>
<p><?php echo $arr_wali['pendidikan_wali'];?></p>
<b># Pekerjaan Wali</b><br>
<p><?php echo $arr_wali['pekerjaan_wali'];?></p>
<?php
}?>
<b># Telpon</b><br>
<p><?php echo $arr_wali['telpon'];?></p>
<b># Alamat</b><br>
<p><?php echo $arr_wali['alamat'];?></p>
</div>

</div>