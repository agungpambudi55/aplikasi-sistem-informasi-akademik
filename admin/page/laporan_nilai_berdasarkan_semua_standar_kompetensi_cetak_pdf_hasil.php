<style type="text/css">*{ font-size:12px; border-collapse:collapse;} th{ padding:6px 0px;}</style>
<?php
session_start();
require "../config/koneksi.php";
require "../config/fungsi.php";
require "../config/ceklogin.php";
$qry=que("select 
tb_siswa.nama, 
tb_siswa.nis, 
tb_bidang.nama_bidang,
tb_prodi.nama_prodi,
tb_keahlian.nama_keahlian, 
tb_kelas_siswa.tahun_masuk, 
tb_standar.kelas,
tb_standar.nama_standar,
tb_nilai.nilai_angka,
tb_nilai.nilai_huruf
from tb_nilai, tb_kelas, tb_kelas_siswa, tb_siswa,tb_standar, tb_keahlian, tb_bidang, tb_prodi where
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
tb_kelas_siswa.tahun_masuk='$_GET[tahun]' and
tb_keahlian.kode_keahlian='$_GET[keahlian]' and
tb_kelas.kode_kelas='$_GET[kelas]' and
tb_nilai.kode_siswa='$_GET[siswa]' 
order by tb_standar.kelas, tb_standar.nama_standar asc
");
			$data=fetch($qry);
?>
<table border="0" width="100%">
  <tr>
    <td width="140">Nama Peserta Didik</td>
    <td width="215">: <?php echo $data['0'];?></td>    
    <td width="140">Bidang Studi Keahlian</td>
    <td width="230">: <?php echo $data['2'];?></td>
  </tr>
  <tr>
    <td>Nomor Induk Siswa</td>
    <td>: <?php echo $data['1'];?></td>
    <td>Program Studi Keahlian</td>
    <td>: <?php echo $data['3'];?></td>
  </tr>
  <tr>
    <td>Tahun Pelajaran</td>
    <td>: <?php echo $_GET['tahun']."/".($_GET['tahun']+1);?></td>
    <td>Kompetensi Keahlian</td>
    <td>: <?php echo $data['4'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<table border="1" width="100%">
<tr>
	<th rowspan="2" align="center" width="30">No.</th>
	<th rowspan="2" align="center" width="125">Kelas</th>
	<th rowspan="2" align="center" width="352">Mata Pelajaran</th>
	<th colspan="2" align="center" width="235">Hasil Penilaian</th>
</tr>
<tr>
	<th align="center" width="80">Nilai Angka</th>
	<th align="center" width="150">Nilai Huruf</th>
</tr>
<?php 
$no=1;
while($arr=mysql_fetch_array($qry))
{
	echo "
  <tr>
	<td style='vertical-align:middle;text-align:center'>$no</td>
    <td style='vertical-align:middle;'>$arr[6]</td>
    <td>$arr[7]</td>
    <td style='vertical-align:middle;text-align:center'>$arr[8]</td>
    <td style='vertical-align:middle;'>$arr[9]</td>
  </tr>	
	";
	$no++;
}
?>
</table>