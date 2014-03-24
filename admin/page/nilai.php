<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
?>
<div id="tit_page">Nilai</div>
<table width="100%" id="data">
	<tr>
      <th width='95%'>Tahun Ajaran</th>
      <th width='5%' align="center">Aksi</th>
    </tr>
<?php
$qrydata = que("
select tb_kelas_siswa.tahun_masuk
from tb_kelas_siswa, tb_kelas, tb_keahlian, tb_nilai, tb_standar, tb_siswa where
tb_standar.kode_standar=tb_nilai.kode_standar and
tb_nilai.kode_kelas=tb_kelas.kode_kelas and
tb_nilai.kode_siswa=tb_siswa.kode_siswa and
tb_kelas_siswa.kode_kelas=tb_kelas.kode_kelas and 
tb_kelas_siswa.kode_keahlian=tb_keahlian.kode_keahlian and
tb_kelas.kode_keahlian=tb_keahlian.kode_keahlian and
tb_kelas_siswa.kode_keahlian=tb_kelas.kode_keahlian and
tb_kelas_siswa.kode_siswa=tb_siswa.kode_siswa and
tb_siswa.kode_keahlian=tb_keahlian.kode_keahlian
group by tb_kelas_siswa.tahun_masuk
order by tb_kelas_siswa.tahun_masuk asc
");
if(num($qrydata)==0)
{echo "<tr><td colspan='4' align='center'>Data tidak ada</td></tr>";}
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
		<td style='padding-left:10px;'>$out[0]/".($out['0']+1)."</td>
		<td align='center'>
";?>		<div id="masuk_sub" onClick="pg('nilai_p_keahlian.php?tahun=<?php echo $out['0'];?>');"></div> <?php echo "
		</td>
	</tr>
	";
$i++;
}
}
?>
</table>
