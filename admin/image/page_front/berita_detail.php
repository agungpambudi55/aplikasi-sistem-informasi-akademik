<?php
require "../config/koneksi.php";
require "../config/fungsi.php";
$qry1=mysql_query("select * from tb_berita where kode_berita='$_GET[id]'");
$arr1=mysql_fetch_array($qry1);
?>
<div id="jud"><span id="judul">Berita</span><span id="isi">Ditulis oleh  <?php echo $arr1['kode'].", ".substr($arr1['tgl'],8,2)." ".bulan(substr($arr1['tgl'],5,2))." ".substr($arr1['tgl'],0,4)." - ".substr($arr1['tgl'],11,8);?></span></div>
<div id="tgl_posting"><?php echo $arr1['judul'];?></div>
<div id="berita_isi">
<img src="admin/image/slide/<?php echo $arr1['photo'];?>" id="berita_photo"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $arr1['isi'];?>
</div>