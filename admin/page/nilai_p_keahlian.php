<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
?>
<div id="tit_page"><span id='tit_page_link' onclick="pg('nilai.php');">Nilai</span> - Tahun Ajaran <?php echo $_GET['tahun']."/".($_GET['tahun']+1);?></div>
<table width="100%" id="data">
	<tr>
      <th width='75%'>Kompetensi Keahlian</th>
      <th width='20%'>Kelas Pararel</th>
      <th width='5%' align="center">Aksi</th>
    </tr>
<?php
$qrydata = que("
select tb_keahlian.kode_keahlian, tb_keahlian.nama_keahlian, tb_kelas.kode_kelas, tb_kelas.nama_kelas
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
tb_kelas_siswa.tahun_masuk='$_GET[tahun]'
group by tb_keahlian.kode_keahlian, tb_kelas.kode_kelas
order by tb_keahlian.nama_keahlian,tb_kelas.nama_kelas asc
");
if(num($qrydata)==0)
{echo "<tr><td colspan='2' align='center'>Data tidak ada</td></tr>";}
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
		<td style='padding-left:10px;'>$out[1]</td>
		<td align='center'>$out[3]</td>
		<td align='center'>
";?>		<div id="masuk_sub" onClick="pg('nilai_p_standar.php?kelas=<?php echo $out['2'];?>&tahun=<?php echo $_GET['tahun'];?>&keahlian=<?php echo $out['0'];?>');"></div> <?php echo "
		</td>
	</tr>
	";
$i++;
}
}
?>
</table>
