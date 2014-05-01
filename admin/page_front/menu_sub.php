<?php
require "admin/config/koneksi.php";
require "admin/config/fungsi.php";
$qry1=que("select * from tb_keahlian order by nama_keahlian asc");?>
<div id="menu_tab">
<div id="menu_judul">Standar Kompetensi</div>
<?php
while($arr1=fetch($qry1))
{?><div id='sub_link' onClick="pages('sk.php?id=<?php echo $arr1['0'];?>');"><?php echo $arr1['2'];?></div><?php
}
?>
</div>

<?php $qry2=que("select * from tb_keahlian order by nama_keahlian asc");?>
<div id="menu_tab">
<div id="menu_judul">Guru Pengajar</div>
<?php
while($arr2=fetch($qry2))
{?><div id='sub_link' onClick="pages('guru.php?id=<?php echo $arr2['0'];?>');"><?php echo $arr2['2'];?></div><?php
}
?>
</div>
