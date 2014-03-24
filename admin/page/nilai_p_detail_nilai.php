<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$qry_link=mysql_query("select * from tb_keahlian, tb_kelas where tb_keahlian.kode_keahlian=tb_kelas.kode_keahlian and tb_keahlian.kode_keahlian='$_GET[keahlian]' and tb_kelas.kode_kelas='$_GET[kelas]'");
$arr_link=mysql_fetch_array($qry_link);
?>
<script>
function detail(x)
{
	page = x;
	$.ajax({
		url: page,
		success:function(result,status){
		$("#box_edit_nilai_bg").html(result);
		$("#box_edit_nilai_bg").delay(100).fadeIn(500);
		}
	});
}
$("#box_edit_nilai_bg").mouseleave(function(){$("#box_edit_nilai_bg").fadeOut(300);});

</script>										
<div id="box_edit_nilai_bg" style="display:none">

</div>
<div id="tit_page">
    <span id='tit_page_link' onclick="pg('nilai.php');">Nilai</span> - 
    <span id='tit_page_link' onclick="pg('nilai_p_keahlian.php?tahun=<?php echo $_GET['tahun'];?>');">Tahun Ajaran <?php echo $_GET['tahun']."/".($_GET['tahun']+1);?></span> - 
    <span id='tit_page_link' onclick="pg('nilai_p_standar.php?tahun=<?php echo $_GET['tahun'];?>&kelas=<?php echo $_GET['kelas'];?>&keahlian=<?php echo $_GET['keahlian'];?>');">Kompetensi Keahlian <?php echo $arr_link['nama_keahlian']." (".$arr_link['nama_kelas'].")";?></span>
</div>
<table width="100%" id="data">
	<tr>
      <th width='40%'>Nama</th>
      <th width='30%'>Nilai Angka</th>
      <th width='25%'>Nilai Huruf</th>
<?php if($user['akses']=="1"){?><th width='5%' align="center">Aksi</th><?php }?>
    </tr>
<?php
$qrydata = que("
select tb_nilai.kode_nilai, tb_siswa.nama, tb_nilai.nilai_angka, tb_nilai.nilai_huruf from tb_nilai, tb_siswa, tb_kelas_siswa
where
tb_nilai.kode_siswa=tb_siswa.kode_siswa and
tb_nilai.kode_standar='$_GET[sk]' and
tb_siswa.kode_siswa=tb_kelas_siswa.kode_siswa and
tb_nilai.kode_kelas='$_GET[kelas]' and
tb_kelas_siswa.tahun_masuk='$_GET[tahun]'
order by tb_siswa.nama asc
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
		<td style='padding-left:10px'>$out[1]</td>
		<td align='center'>$out[2]</td>
		<td>$out[3]</td>";
if($user['akses']=="1")
{?>		<td>
		<div id="edit" style="margin-left:18px;" onClick="detail('nilai_edit.php?id=<?php echo $out['0'];?>&tahun=<?php echo $_GET['tahun'];?>&kelas=<?php echo $_GET['kelas'];?>&keahlian=<?php echo $_GET['keahlian'];?>&sk=<?php echo $_GET['sk'];?>');"></div> <?php echo "
		</td>";
} echo "
	</tr>
	";
$i++;
}
}
?>
</table>