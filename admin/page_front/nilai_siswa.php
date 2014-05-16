<?php
session_start();
require "../config/koneksi.php";
require "../config/fungsi.php";
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
<div id="jud"><span id="judul">Daftar Nilai</span><span id="isi"><?php echo $user['nama'];?></span><div id="tbl"><a href="admin/page_front/laporan_nilai.php">Cetak</a></div></div>
<table border="0" width="100%" id="data">
<tr>
	<th rowspan="2" width="5%">No.</th>
	<th rowspan="2" width="15%">Kelas</th>
	<th rowspan="2" width="45%">Standar Kompetensi</th>
	<th colspan="2" width="35%">Hasil Penilaian</th>
</tr>
<tr>
	<th>Nilai Angka</th>
	<th>Nilai Huruf</th>
</tr>
<?php 
$no=1;
$i=0;
if(num($qry)==0)
{echo "<tr><td colspan='5' align='center'>Data tidak ada</td></td>";}
else
{
	while($arr=mysql_fetch_array($qry))
	{
			if($i%2)
			{$bg="#F3F3F3";}
			else
			{$bg="#FFFFFF";}
			echo"
	  <tr bgcolor='$bg' id='th'>
		<td style='vertical-align:middle' align='center'>$no</td>
		<td style='vertical-align:middle' align='center'>$arr[0]</td>
		<td>$arr[1]</td>
		<td style='vertical-align:middle' align='center'>$arr[2]</td>
		<td style='vertical-align:middle'>$arr[3]</td>
	  </tr>	
		";
		$no++;
		$i++;
	}
}
?>
</table>