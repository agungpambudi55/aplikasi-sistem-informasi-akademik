<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$qry_det =mysql_query("select * from tb_guru, tb_keahlian where tb_guru.kode_keahlian=tb_keahlian.kode_keahlian and kode_guru='$_GET[id_detail]'");
$arr_det =mysql_fetch_array($qry_det);
?>
<div id="kotak_detail">
<div id="photo_detail">
<div id="photo_detail_gandul"></div>
<div id="photo_detail_tali_l"></div>
<div id="photo_detail_tali_r"></div>
<?php
if($arr_det['photo']=="")
{?><img src="../image/guru/default.png" width="140" height="150"><?php }
else
{?><img src="../image/guru/<?php echo $arr_det['photo'];?>" width="140" height="150"><?php }
?>
</div>
<b># NIP</b><br>
<p><?php echo $arr_det['nip'];?></p>
<b># Nama</b><br>
<p><?php echo $arr_det['nama_guru'];?></p>
<b># Jenis Kelamin</b><br>
<p><?php echo $arr_det['jenis_kelamin'];?></p>
<b># Tempat, Tanggal Lahir</b><br>
<p><?php echo $arr_det['tmp_lahir'].", ".substr($arr_det['tgl_lahir'],0,2)." ".bulan(substr($arr_det['tgl_lahir'],3,2))." ".substr($arr_det['tgl_lahir'],6,4);?></p>
<b># Alamat</b><br>
<p><?php echo $arr_det['alamat'];?></p>
<b># Telpon</b><br>
<p><?php echo $arr_det['telpon'];?></p>
<b># Agama</b><br>
<p><?php echo $arr_det['agama'];?></p>
<b># Mengajar Kompetensi Keahlian</b>
<p><?php echo $arr_det['nama_keahlian'];?></p>
<b># Pendidikan Terakhir</b><br>
<p><?php echo $arr_det['pendidikan'];?></p>
<b># Status</b><br>
<p><?php echo $arr_det['status'];?></p>
</div>