<?php
session_start();
require "../config/koneksi.php";
require "../config/fungsi.php";
header("Content-type: application/x-msdownload");
header('Content-Disposition: attachment; filename=laporan_nilai.xls');
$qry=que("select 
tb_standar.kelas,
tb_standar.nama_standar,
tb_nilai.nilai_angka,
tb_nilai.nilai_huruf
from tb_user, tb_nilai, tb_kelas, tb_kelas_siswa, tb_siswa,tb_standar, tb_keahlian, tb_bidang, tb_prodi where
tb_nilai.kode_siswa=tb_siswa.kode_siswa and
tb_nilai.kode_standar=tb_standar.kode_standar and 
tb_nilai.kode_kelas=tb_kelas.kode_kelas and
tb_kelas.kode_keahlian=tb_keahlian.kode_keahlian and
tb_kelas_siswa.kode_keahlian=tb_keahlian.kode_keahlian and
tb_kelas_siswa.kode_siswa=tb_siswa.kode_siswa and
tb_kelas_siswa.kode_kelas=tb_kelas.kode_kelas and
tb_siswa.kode_keahlian=tb_keahlian.kode_keahlian and
tb_standar.kode_keahlian=tb_keahlian.kode_keahlian and
tb_keahlian.kode_prodi=tb_prodi.kode_prodi and
tb_prodi.kode_bidang=tb_bidang.kode_bidang and
tb_user.kode=tb_siswa.nis  and
tb_user.kode='$_SESSION[pengguna]'
order by tb_standar.kelas, tb_standar.nama_standar asc
");
$qry_user=que("SELECT * FROM tb_siswa WHERE nis = '$_SESSION[pengguna]'");
$user=mysql_fetch_array($qry_user);
?>
<table border="1">
<tr>
	<th rowspan="2">No.</th>
	<th rowspan="2">Kelas</th>
	<th rowspan="2">Standar Kompetensi</th>
	<th colspan="2">Hasil Penilaian</th>
</tr>
<tr>
	<th>Nilai Angka</th>
	<th>Nilai Huruf</th>
</tr>
<?php 
$no=1;
while($arr=mysql_fetch_array($qry))
{
	
echo"
  <tr>
	<td style='vertical-align:middle' align='center'>$no</td>
    <td style='vertical-align:middle' align='center'>$arr[0]</td>
    <td>$arr[1]</td>
    <td style='vertical-align:middle' align='center'>$arr[2]</td>
    <td style='vertical-align:middle'>$arr[3]</td>
  </tr>	
	";
	$no++;
}
?>
</table>