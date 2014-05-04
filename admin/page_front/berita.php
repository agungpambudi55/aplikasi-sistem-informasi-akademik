<div id="jud"><span id="judul">Berita</span></div>
<?php
require "../config/koneksi.php";
require "../config/fungsi.php";
$qry1=mysql_query("select * from tb_berita order by tgl desc limit 5");
while($arr1=mysql_fetch_array($qry1))
{
?>	
<div id="berita_box">
<div id="judul_berita" onclick="pages('berita_detail.php?id=<?php echo $arr1['0'];?>');"><?php echo $arr1['judul'];?></div>
<div id="tgl_pos">Ditulis oleh  <?php echo $arr1['kode'].", ".substr($arr1['tgl'],8,2)." ".bulan(substr($arr1['tgl'],5,2))." ".substr($arr1['tgl'],0,4)." - ".substr($arr1['tgl'],11,8);?></div>
<div id="berita"><?php echo substr($arr1['isi'],0,400);?>...</div>
</div>
<?php }?>

<div id="pag">
Halaman &nbsp;&nbsp;&nbsp; <span onclick="pages('berita.php');">1</span>
</div>