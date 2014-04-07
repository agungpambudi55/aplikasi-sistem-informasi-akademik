<style type="text/css">*{ font-size:12px; border-collapse:collapse;} th{ padding:6px 0px;}</style>
<?php
session_start();
require "../config/koneksi.php";
require "../config/fungsi.php";
require "../config/ceklogin.php";
$qry=que("select 
tb_siswa.kode_siswa, 
tb_siswa.nama, 
tb_bidang.nama_bidang,
tb_prodi.nama_prodi,
tb_keahlian.nama_keahlian, 
tb_kelas_siswa.tahun_masuk,
tb_kelas.nama_kelas,
tb_siswa.nis
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
tb_standar.kelas='$_GET[semester]'
group by tb_siswa.kode_siswa
order by tb_siswa.nama
");
$data=fetch($qry);

			if($_GET['semester']=="10 Semester Ganjil"){$tahun=$_GET['tahun']."/".($_GET['tahun']+1);}
			elseif($_GET['semester']=="10 Semester Genap"){$tahun=$_GET['tahun']."/".($_GET['tahun']+1);}
			elseif($_GET['semester']=="11 Semester Ganjil"){$tahun=($_GET['tahun']+1)."/".($_GET['tahun']+2);}
			elseif($_GET['semester']=="11 Semester Genap"){$tahun=($_GET['tahun']+1)."/".($_GET['tahun']+2);}
			elseif($_GET['semester']=="12 Semester Ganjil"){$tahun=($_GET['tahun']+2)."/".($_GET['tahun']+3);}
			elseif($_GET['semester']=="12 Semester Genap"){$tahun=($_GET['tahun']+2)."/".($_GET['tahun']+3);}

?>
		<table border="0">
          <tr>
            <td width="140">Bidang Studi Keahlian</td>
            <td width="230">: <?php echo $data['2'];?></td>
            <td width="140">Tahun Pelajaran</td>
            <td width="210">: <?php echo $tahun;?></td>
          </tr>
          <tr>
            <td>Program Studi Keahlian</td>
            <td>: <?php echo $data['3'];?></td>
            <td>Kelas</td>
            <td>:
            <?php 
			if(substr($_GET['semester'],0,2)=="10"){echo "X";}
			elseif(substr($_GET['semester'],0,2)=="11"){echo "XI";}
			elseif(substr($_GET['semester'],0,2)=="12"){echo "XII";}
			echo " ".$data['4']." ".$data['6'];
			?>
            </td>
          </tr>
          <tr>
            <td>Kompetensi Keahlian</td>
            <td>: <?php echo $data['4'];?></td>
            <td>Semester</td>
            <td>: 
			<?php 
			if($_GET['semester']=="10 Semester Ganjil"){echo "1";}
			elseif($_GET['semester']=="10 Semester Genap"){echo "2";}
			elseif($_GET['semester']=="11 Semester Ganjil"){echo "3";}
			elseif($_GET['semester']=="11 Semester Genap"){echo "4";}
			elseif($_GET['semester']=="12 Semester Ganjil"){echo "5";}
			elseif($_GET['semester']=="12 Semester Genap"){echo "6";}
		  ?>
           </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
		</table>


<table border="1">
<tr>
	<th width="35" align="center">No.</th>
	<th width="110" align="center">NIS</th>
	<th width="375" align="center">Nama</th>
	<th width="100" align="center">Jumlah</th>
	<th width="100" align="center">Rata-rata</th>
</tr>
<?php 
$no=1;
while($arr=mysql_fetch_array($qry))
{
	$det=mysql_query("select
sum(tb_nilai.nilai_angka), count(tb_nilai.nilai_angka)
from tb_nilai, tb_siswa, tb_kelas_siswa, tb_standar 
where 
tb_standar.kode_standar=tb_nilai.kode_standar and 
tb_kelas_siswa.kode_siswa=tb_siswa.kode_siswa and 
tb_nilai.kode_siswa=tb_siswa.kode_siswa and tb_siswa.kode_keahlian='$_GET[keahlian]' and 
tb_nilai.kode_kelas='$_GET[kelas]' and
tb_kelas_siswa.tahun_masuk='$_GET[tahun]' and 
tb_standar.kelas='$_GET[semester]' and
tb_siswa.kode_siswa='$arr[0]'");
$arrdet=mysql_fetch_array($det);

	echo "
  <tr>
	<td style='vertical-align:middle; text-align:center'>$no</td>
    <td>$arr[7]</td>
    <td>$arr[1]</td>
    <td style='vertical-align:middle; text-align:center'>$arrdet[0]</td>
	<td style='vertical-align:middle; text-align:center'>".substr(($arrdet['0']/$arrdet['1']),0,4)."</td>
  </tr>	
	";
	$no++;
}
?>
</table>