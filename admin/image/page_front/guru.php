<?php
require "../config/koneksi.php";
require "../config/fungsi.php";
$qry1=mysql_query("select * from tb_guru where kode_keahlian='$_GET[id]'");
$qry2=mysql_fetch_array(mysql_query("select * from tb_keahlian where kode_keahlian='$_GET[id]'"));
echo "<div id='jud'><span id='judul'>Guru</span><span id='isi'>$qry2[nama_keahlian]</span></div>";
if(num($qry1)>1)
{
	while($arr1=mysql_fetch_array($qry1))
	{
	?>
	<div id="photo_guru" style="background:url(admin/image/guru/<?php echo $arr1['photo'];?>) no-repeat; background-position:center; background-size:175px;">
    <div class="detail_guru">	
		<div style=" color:#FFF; font-weight:bold">#Nama</div> <?php echo $arr1['nama_guru'];?>
		<div style=" color:#FFF; font-weight:bold; margin-top:5px;">#Pendidikan</div>  <?php echo $arr1['pendidikan'];?>
		<div style=" color:#FFF; font-weight:bold; margin-top:5px;">#Alamat</div>  <?php echo $arr1['alamat'];?>
		<div style=" color:#FFF; font-weight:bold; margin-top:5px;">#Telpon</div>  <?php echo $arr1['telpon'];?>
    </div>
	</div>
	<?php		
	}
}
else
{echo "<div class='notif' style='margin-top:150px'>Data tidak ada</div>";}
?>
