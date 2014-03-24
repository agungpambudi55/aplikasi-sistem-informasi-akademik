<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$qry_link=mysql_query("select * from tb_keahlian, tb_kelas where tb_keahlian.kode_keahlian=tb_kelas.kode_keahlian and tb_keahlian.kode_keahlian='$_GET[keahlian]' and tb_kelas.kode_kelas='$_GET[kelas]'");
$arr_link=mysql_fetch_array($qry_link);
?>
<div id="tit_page">
    <span id='tit_page_link' onclick="pg('nilai.php');">Nilai</span> - 
    <span id='tit_page_link' onclick="pg('nilai_p_keahlian.php?tahun=<?php echo $_GET['tahun'];?>');">Tahun Ajaran <?php echo $_GET['tahun']."/".($_GET['tahun']+1);?></span> - 
    Kompetensi Keahlian <?php echo $arr_link['nama_keahlian']." (".$arr_link['nama_kelas'].")";?>
</div>
<table width="100%" id="data">
	<tr>
      <th width='13%'>Kelas</th>
      <th width='82%'>Standar Kompetensi</th>
      <th width='5%' align="center">Aksi</th>
    </tr>
<?php
$qrydata = que("
select tb_standar.kelas, tb_standar.nama_standar, tb_keahlian.nama_keahlian, tb_kelas.nama_kelas, tb_standar.kode_standar
from tb_kelas_siswa, tb_kelas, tb_keahlian, tb_nilai, tb_standar, tb_siswa where
tb_standar.kode_standar=tb_nilai.kode_standar and
tb_nilai.kode_kelas=tb_kelas.kode_kelas and
tb_nilai.kode_siswa=tb_siswa.kode_siswa and
tb_kelas_siswa.kode_kelas=tb_kelas.kode_kelas and 
tb_kelas_siswa.kode_keahlian=tb_keahlian.kode_keahlian and
tb_kelas.kode_keahlian=tb_keahlian.kode_keahlian and
tb_kelas_siswa.kode_keahlian=tb_kelas.kode_keahlian and
tb_kelas_siswa.kode_siswa=tb_siswa.kode_siswa and
tb_siswa.kode_keahlian=tb_keahlian.kode_keahlian and
tb_kelas.kode_kelas='$_GET[kelas]' and
tb_keahlian.kode_keahlian='$_GET[keahlian]' and
tb_kelas_siswa.tahun_masuk='$_GET[tahun]'
group by tb_standar.nama_standar
order by tb_standar.kelas,tb_standar.nama_standar asc
");
if(num($qrydata)==0)
{echo "<tr><td colspan='3' align='center'>Data tidak ada</td></tr>";}
else
{
$i=0;
while($out= mysql_fetch_array($qrydata))
{
	if($i%2)
	{$bg="#D6DEFE";}
	else
	{$bg="#FFFFFF";}
	echo "
	<tr id='td' bgcolor='$bg'>
		<td align='center'>$out[0]</td>
		<td style='padding-left:30px'>$out[1]</td>
		<td align='center'>
";?>		<div id="masuk_sub" onClick="pg('nilai_p_detail_nilai.php?tahun=<?php echo $_GET['tahun'];?>&kelas=<?php echo $_GET['kelas'];?>&keahlian=<?php echo $_GET['keahlian'];?>&sk=<?php echo $out['4'];?>');"></div> <?php echo "
		</td>
	</tr>
	";
$i++;
}
}
?>
</table>