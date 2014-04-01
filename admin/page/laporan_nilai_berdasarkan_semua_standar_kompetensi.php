<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
//echo "tahun ".$_GET['tahun']."<br>keahlian ".$_GET['keahlian']."<br>semester ".$_GET['semester']."<br>kelas ".$_GET['kelas']."<br>siswa ".$_GET['siswa'];
?>
<div id="tit_page" onclick="pages('laporan.php');" style="cursor:pointer">Laporan Nilai Berdasarkan Semua Standar Kompetensi Per Siswa</div>
<?php
if(isset($_GET['siswa']))
{?>
<a href="laporan_nilai_berdasarkan_semua_standar_kompetensi_cetak_csv.php?tahun=<?php echo $_GET['tahun'];?>&keahlian=<?php echo $_GET['keahlian'];?>&kelas=<?php echo $_GET['kelas'];?>&siswa=<?php echo $_GET['siswa']?>" id="cetak_csv"></a>
<div onclick="pg('laporan_nilai_berdasarkan_semua_standar_kompetensi_cetak_pdf.php?tahun=<?php echo $_GET['tahun'];?>&keahlian=<?php echo $_GET['keahlian'];?>&kelas=<?php echo $_GET['kelas'];?>&siswa=<?php echo $_GET['siswa']?>');" id="cetak_pdf"></div>
<?php
}
else
{?>
<div id="cetak_csv_d"></div>	
<div id="cetak_pdf_d"></div>	
<?php
}
?>
<table id="form">
<tr>
	<td width="165px">Tahun Ajaran Masuk</td>
	<td>
    <select name="tahun" required id="select" onchange="pg('laporan_nilai_berdasarkan_semua_standar_kompetensi.php?tahun='+this.value);">
    <option value=""></option>
    <?php
    $qry1=que("
select tb_kelas_siswa.tahun_masuk
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
tb_prodi.kode_bidang=tb_bidang.kode_bidang
group by tb_kelas_siswa.tahun_masuk order by tb_kelas_siswa.tahun_masuk asc	
	");
	while($arr1=fetch($qry1))
	{if($_GET['tahun']==$arr1['0']){echo "<option value='$arr1[0]' selected>".$arr1['0']."/".($arr1['0']+1)."</option>";}else{echo "<option value='$arr1[0]'>".$arr1['0']."/".($arr1['0']+1)."</option>";}}
	?>
    </select>    	
    </td>
</tr>
<tr>
	<td width="165px">Kompetensi Keahlian</td>
	<td>
    <select name="keahlian" required id="select" onchange="pg('laporan_nilai_berdasarkan_semua_standar_kompetensi.php?tahun=<?php echo $_GET['tahun'];?>&keahlian='+this.value);">
    <?php
	if(!$_GET['tahun']==""){echo "<option></option>";}
    $qry2=que("
select tb_keahlian.kode_keahlian, tb_keahlian.nama_keahlian
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
tb_kelas_siswa.tahun_masuk='$_GET[tahun]'
group by tb_keahlian.nama_keahlian order by tb_keahlian.nama_keahlian asc	
");
	while($arr2=fetch($qry2))
	{if($_GET['keahlian']==$arr2['0']){echo "<option value='$arr2[0]' selected>".$arr2['1']."</option>";}else{echo "<option value='$arr2[0]'>".$arr2['1']."</option>";}}
	?>
    </select>    	
    </td>
</tr>
<tr>
	<td width="165px">Kelas Pararel</td>
	<td>
    <select name="kelas" required id="select" onchange="pg('laporan_nilai_berdasarkan_semua_standar_kompetensi.php?tahun=<?php echo $_GET['tahun'];?>&keahlian=<?php echo $_GET['keahlian'];?>&kelas='+this.value);">
    <?php
	if(!$_GET['keahlian']==""){echo "<option></option>";}
    $qry4=que("
select tb_kelas.kode_kelas, tb_kelas.nama_kelas
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
tb_keahlian.kode_keahlian='$_GET[keahlian]'
group by tb_kelas.nama_kelas order by tb_kelas.nama_kelas asc
");
	while($arr4=fetch($qry4))
	{if($_GET['kelas']==$arr4['0']){echo "<option value='$arr4[0]' selected>".$arr4['1']."</option>";}else{echo "<option value='$arr4[0]'>".$arr4['1']."</option>";}}
	?>
    </select>    	
    </td>
</tr>
<tr>
	<td width="165px">Siswa</td>
	<td>
    <select name="siswa" required id="select" onchange="pg('laporan_nilai_berdasarkan_semua_standar_kompetensi.php?tahun=<?php echo $_GET['tahun'];?>&keahlian=<?php echo $_GET['keahlian'];?>&kelas=<?php echo $_GET['kelas'];?>&siswa='+this.value);">
    <?php
	if(!$_GET['kelas']==""){echo "<option></option>";}
    $qry5=que("
select tb_siswa.kode_siswa,tb_siswa.nama
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
tb_kelas.kode_kelas='$_GET[kelas]'
group by tb_siswa.nama order by tb_siswa.nama");
	while($arr5=fetch($qry5))
	{if($_GET['siswa']==$arr5['0']){echo "<option value='$arr5[0]' selected>".$arr5['1']."</option>";}else{echo "<option value='$arr5[0]'>".$arr5['1']."</option>";}}
	?>
    </select>    	
    </td>
</tr>
</table>
