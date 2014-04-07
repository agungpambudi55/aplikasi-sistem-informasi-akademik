<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
//echo "tahun ".$_GET['tahun']."<br>keahlian ".$_GET['keahlian']."<br>semester ".$_GET['semester']."<br>kelas ".$_GET['kelas']."<br>standar ".$_GET['standar'];
?>
<div id="tit_page" onclick="pages('laporan.php');" style="cursor:pointer">Laporan Peringkat Berdasarkan Per Kelas</div>
<?php
if(isset($_GET['kelas']))
{?>
<a href="laporan_peringkat_berdasarkan_perkelas_cetak_csv.php?tahun=<?php echo $_GET['tahun'];?>&keahlian=<?php echo $_GET['keahlian'];?>&semester=<?php echo $_GET['semester'];?>&kelas=<?php echo $_GET['kelas'];?>&standar=<?php echo $_GET['standar']?>" id="cetak_csv"></a>
<div onclick="pg('laporan_peringkat_berdasarkan_perkelas_cetak_pdf.php?tahun=<?php echo $_GET['tahun'];?>&keahlian=<?php echo $_GET['keahlian'];?>&semester=<?php echo $_GET['semester'];?>&kelas=<?php echo $_GET['kelas'];?>&standar=<?php echo $_GET['standar']?>');" id="cetak_pdf"></div>
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
    <select name="tahun" required id="select" onchange="pg('laporan_peringkat_berdasarkan_perkelas.php?tahun='+this.value);">
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
    <select name="keahlian" required id="select" onchange="pg('laporan_peringkat_berdasarkan_perkelas.php?tahun=<?php echo $_GET['tahun'];?>&keahlian='+this.value);">
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
	<td width="165px">Kelas > Semester</td>
	<td>
    <select name="semester" required id="select" onchange="pg('laporan_peringkat_berdasarkan_perkelas.php?tahun=<?php echo $_GET['tahun'];?>&keahlian=<?php echo $_GET['keahlian'];?>&semester='+this.value);">
    <?php
	if(!$_GET['keahlian']==""){echo "<option></option>";}
    $qry3=que("
select tb_standar.kelas
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
group by tb_standar.kelas order by tb_standar.kelas asc");
	while($arr3=fetch($qry3))
	{if($_GET['semester']==$arr3['0']){echo "<option value='$arr3[0]' selected>".$arr3['0']."</option>";}else{echo "<option value='$arr3[0]'>".$arr3['0']."</option>";}}
	?>
    </select>    	
    </td>
</tr>
<tr>
	<td width="165px">Standar Kompetensi</td>
	<td>
    <select name="standar" required id="select" onchange="pg('laporan_peringkat_berdasarkan_perkelas.php?tahun=<?php echo $_GET['tahun'];?>&keahlian=<?php echo $_GET['keahlian'];?>&semester=<?php echo $_GET['semester'];?>&standar='+this.value);">
    <?php
	if(!$_GET['semester']==""){echo "<option></option>";}
    $qry5=que("
select tb_standar.kode_standar, tb_standar.nama_standar
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
tb_keahlian.kode_keahlian='$_GET[keahlian]'and 
tb_standar.kelas='$_GET[semester]'
group by tb_standar.nama_standar order by tb_standar.nama_standar asc
");
	while($arr5=fetch($qry5))
	{if($_GET['standar']==$arr5['0']){echo "<option value='$arr5[0]' selected>".$arr5['1']."</option>";}else{echo "<option value='$arr5[0]'>".$arr5['1']."</option>";}}
	?>
    </select>    	
    </td>
</tr>
<tr>
	<td width="165px">Kelas Pararel</td>
	<td>
    <select name="kelas" required id="select" onchange="pg('laporan_peringkat_berdasarkan_perkelas.php?tahun=<?php echo $_GET['tahun'];?>&keahlian=<?php echo $_GET['keahlian'];?>&standar=<?php echo $_GET['standar'];?>&semester=<?php echo $_GET['semester'];?>&kelas='+this.value);">
    <?php
	if(!$_GET['standar']==""){echo "<option></option>";}
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
tb_keahlian.kode_keahlian='$_GET[keahlian]'and 
tb_standar.kelas='$_GET[semester]' and
tb_standar.kode_standar='$_GET[standar]'
group by tb_kelas.nama_kelas order by tb_kelas.nama_kelas asc
");
	while($arr4=fetch($qry4))
	{if($_GET['kelas']==$arr4['0']){echo "<option value='$arr4[0]' selected>".$arr4['1']."</option>";}else{echo "<option value='$arr4[0]'>".$arr4['1']."</option>";}}
	?>
    </select>    	
    </td>
</tr>
</table>
