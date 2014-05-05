<?php
require "../config/koneksi.php";
require "../config/fungsi.php";
$qry2=mysql_query("select * from tb_keahlian where kode_keahlian='$_GET[id]'");
$arr_detail=mysql_fetch_array($qry2);
?>
<div id="jud"><span id="judul">Standar Kompetensi</span><span id="isi"><?php echo $arr_detail['nama_keahlian'];?></span></div>
<table width="100%" border="0" id="data">
  <tr>
    <th width="5%">No.</th>
    <th width="15%">Kelas</th>
    <th width="80%">Standar Kompetensi</th>
  </tr>
<?php
$qry=que("select * from tb_standar, tb_keahlian where tb_keahlian.kode_keahlian=tb_standar.kode_keahlian and tb_keahlian.kode_keahlian='$_GET[id]' order by tb_standar.kelas, tb_standar.nama_standar asc");
if(num($qry)==0)
{echo "<tr><td colspan='3' align='center'>Data tidak ada</td></td>";}
else
{
	$i=0;
	$no=1;
	while($arr=fetch($qry))
	{
		if($i%2)
		{$bg="#F3F3F3";}
		else
		{$bg="#FFFFFF";}
		echo"
	  <tr bgcolor='$bg' id='th'>
		<td style='vertical-align:middle' align='center'>$no</td>
		<td align='center'>$arr[kelas]</td>
		<td>$arr[nama_standar]</td>
	  </tr>";
	  $i++;
	  $no++;
	}
}
?>
</table>
