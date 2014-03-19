<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
?>
<script>
function detail(x)
{
	$('#l_k').fadeIn(300);
	page = x;
	$.ajax({
		url: page,
		success:function(result,status){
		$('#daftar_anggota').fadeIn(600);
		$('#l_k').delay(500).fadeOut(300);
		$('#daftar_box').delay(1300).fadeIn(600);
		$("#daftar_isi").html(result);
		}
	});
}
</script>										
<div id="daftar_anggota">
<div id="l_k" style="display:none"></div>
<div id="daftar_box">
<div id="daftar_tutup" onclick="$('#daftar_box').fadeOut(500);$('#daftar_anggota').delay(300).fadeOut(500);">-</div>
<div id="daftar_judul">Daftar Siswa</div>
<div id="daftar_isi"></div>
</div>
</div>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian kelas siswa, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('kelas_siswa.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Kelas Siswa</div>
<form method="GET" action="#" id="cek_form">
<?php
    if(isset($_GET['notif']))
    {
		if($_GET['notif']=="hy")
		{echo "<div class='notif'>Data berhasil dihapus</div>";}
		elseif($_GET['notif']=="hn")
		{echo "<div class='notif'>Data gagal dihapus</div>";}
		elseif($_GET['notif']=="ck")
		{echo "<div class='notif'>Tidak ada yang dicentang atau dihapus</div>";}
		elseif($_GET['notif']=="ta")
		{echo "<div class='notif'>Tidak ada yang dicari</div>";}
    }
if(!isset($_GET['cr']))
{
?>
<div id="paging">
<?php
if($user['akses']=="1")
{?>
<div id="btn1" onClick="pages('kelas_siswa_tambah.php');"></div>
<p onclick="tanya('kelas_siswa');" id="hapus_semua"></p>
<?php
}
$p=que("select ket1 from tb_aksesoris where nama='paging'");
$page		= fetch($p);
$perpage	= $page['0']; 
$querytotal	= que("select * from tb_kelas_siswa, tb_kelas, tb_keahlian, tb_siswa where
tb_kelas_siswa.kode_kelas=tb_kelas.kode_kelas and 
tb_kelas_siswa.kode_keahlian=tb_keahlian.kode_keahlian and
tb_kelas.kode_keahlian=tb_keahlian.kode_keahlian and
tb_kelas_siswa.kode_keahlian=tb_kelas.kode_keahlian and
tb_kelas_siswa.kode_siswa=tb_siswa.kode_siswa and
tb_siswa.kode_keahlian=tb_keahlian.kode_keahlian 
group by tb_kelas_siswa.tahun_masuk,tb_kelas_siswa.kode_kelas,tb_kelas_siswa.tahun_masuk
order by tb_kelas_siswa.tahun_masuk, tb_keahlian.nama_keahlian, tb_kelas.nama_kelas asc");
$pagetotal	= num($querytotal);
$jumpage		= ceil($pagetotal/$perpage);
if(isset($_GET['page']))
	{
		$limit 	= "LIMIT ".($_GET['page']-1)*$perpage.",".$perpage; 
		$curpage= $_GET['page'];
	}
else
	{ 
		$limit 		= "LIMIT 0,".$perpage; 
		$curpage	= 1;
	}
if($jumpage>1 AND (!isset($_GET['page']) OR @$_GET['page'] < $jumpage))
{?><p onClick="pg('kelas_siswa.php?page=<?php echo $curpage+1; ?>')" id="next_a"></p> <?php }	
else
{echo "<p  id='next_d'></p>";}	
?><select name='halaman' onchange="pg('kelas_siswa.php?page='+this.value)"><?php
for($r=1; $r <= $jumpage ; $r++)
	{	
		if($curpage == $r)
		{
			echo "<option value=".$r." selected>".$r."</a>";
		}
		else
		{
			echo "<option value=".$r.">".$r."</a>";
		}
	}
echo "</select> ";
if(isset($_GET['page']) AND $_GET['page'] > 1)
{?><p onClick="pg('kelas_siswa.php?page=<?php echo $curpage-1; ?>')" id="back_a"></p> <?php }
else
{echo "<p  id='back_d'></p>";}	
echo "<div id='pg_tot'>Jumlah Data : <b style='font-size:15px;'>$pagetotal</b></div>";
echo "</div>";
?>
<table width="100%" id="data">
	<tr>
<?php if($user['akses']=="1"){?><th width='5%'><input type="checkbox" id="cek" onClick="cek_all()" value="All"></th><?php }?>
      <th width='24%'>Tahun Ajaran</th>
      <th width='30.5%'>Kompetensi Keahlian</th>
      <th width='15%'>Pararel Kelas</th>
      <th width='15%'>Jumlah Siswa</th>
		<th width='5%' align="center">Aksi</th>
    </tr>
<?php
$qry = que("select * from tb_kelas_siswa, tb_kelas, tb_keahlian, tb_siswa where
tb_kelas_siswa.kode_kelas=tb_kelas.kode_kelas and 
tb_kelas_siswa.kode_keahlian=tb_keahlian.kode_keahlian and
tb_kelas.kode_keahlian=tb_keahlian.kode_keahlian and
tb_kelas_siswa.kode_keahlian=tb_kelas.kode_keahlian and
tb_kelas_siswa.kode_siswa=tb_siswa.kode_siswa and
tb_siswa.kode_keahlian=tb_keahlian.kode_keahlian 
group by tb_kelas_siswa.tahun_masuk,tb_kelas_siswa.kode_kelas,tb_kelas_siswa.tahun_masuk
order by tb_kelas_siswa.tahun_masuk, tb_keahlian.nama_keahlian, tb_kelas.nama_kelas asc ".$limit);
if(num($qry)==0)
{echo "<tr><td colspan='5' align='center'>Data tidak ada</td></tr>";}
else
{
$i=0;
while($out= mysql_fetch_array($qry))
{
	$jml_siswa=que("select * from tb_kelas_siswa, tb_kelas, tb_keahlian, tb_siswa where
					tb_kelas_siswa.kode_kelas=tb_kelas.kode_kelas and 
					tb_kelas_siswa.kode_keahlian=tb_keahlian.kode_keahlian and
					tb_kelas.kode_keahlian=tb_keahlian.kode_keahlian and
					tb_kelas_siswa.kode_keahlian=tb_kelas.kode_keahlian and
					tb_kelas_siswa.kode_siswa=tb_siswa.kode_siswa and
					tb_siswa.kode_keahlian=tb_keahlian.kode_keahlian and
					tb_keahlian.kode_keahlian='$out[kode_keahlian]' and tb_kelas.kode_kelas='$out[kode_kelas]'
					order by tb_kelas_siswa.tahun_masuk, tb_keahlian.nama_keahlian, tb_kelas.nama_kelas asc");
	$th_ajaran=$out['tahun_masuk']."/".($out['tahun_masuk']+1);
	if($i%2)
	{$bg="#D6DEFE";}
	else
	{$bg="#FFFFFF";}
	echo "
	<tr id='td' bgcolor='$bg'>";
if($user['akses']=="1"){
echo	"<td align='center'>
		"?>
        <input type='checkbox' name='kode1[]' value='<?php echo $out['kode_keahlian'];?>' onClick="$('.xx<?php echo $out['0'];?>').click();"/><?php echo "
		<input type='checkbox' name='kode2[]' value='$out[kode_kelas]' class='xx$out[0]' style='display:none'/>
		<input type='checkbox' name='kode3[]' value='$out[tahun_masuk]' class='xx$out[0]' style='display:none'/>
		</td>";
}echo "
		<td align='center'>$th_ajaran</td>
		<td>$out[nama_keahlian]</td>
		<td align='center'>$out[nama_kelas]</td>
		<td align='center'>".num($jml_siswa)."</td>
		<td align='center'>	
";?>		<div id="detail_a" onClick="detail('kelas_siswa_detail.php?tahun=<?php echo $out['tahun_masuk'];?>&kode_kelas=<?php echo $out['kode_kelas'];?>&kode_keahlian=<?php echo $out['kode_keahlian'];?>');"></div>
<?php 
if($user['akses']=="1"){
?>		<div id="hapus" onClick="konfirm('menghapus kelas <?php echo $out['nama_keahlian']." ".$out['nama_kelas']." tahun ajaran ".$th_ajaran;?>','kelas_siswa_hapus.php?tahun=<?php echo $out['tahun_masuk'];?>&kode_kelas=<?php echo $out['kode_kelas'];?>&kode_keahlian=<?php echo $out['kode_keahlian'];?>');"></div> <?php 
}echo "
		</td>
	</tr>
	";
$i++;
}
}
?>
</table>
<?php
}
else
{
if($_GET['cr']=="")
{?><script>pages('kelas_siswa.php?notif=ta');</script><?php }
else
{
	?>
	<div id="paging">
	<p onClick="pages('kelas_siswa.php')" id="back"></p>
<?php if($user['akses']=="1"){?>	<p onclick="tanya('kelas_siswa');" id="hapus_semua"></p><?php  }?>
	</div>
	<table width="100%" id="data">
		<tr>
<?php if($user['akses']=="1"){?><th width='5%'><input type="checkbox" id="cek" onClick="cek_all()" value="All"></th><?php }?>
          <th width='24%'>Tahun Ajaran</th>
          <th width='30.5%'>Kompetensi Keahlian</th>
          <th width='30%'>Pararel Kelas</th>
          <th width='5.5%' align="center">Aksi</th>
		</tr>
	<?php
	$qrycr = que("
select * from tb_kelas_siswa, tb_kelas, tb_keahlian, tb_siswa where
tb_kelas_siswa.kode_kelas=tb_kelas.kode_kelas and 
tb_kelas_siswa.kode_keahlian=tb_keahlian.kode_keahlian and
tb_kelas.kode_keahlian=tb_keahlian.kode_keahlian and
tb_kelas_siswa.kode_keahlian=tb_kelas.kode_keahlian and
tb_kelas_siswa.kode_siswa=tb_siswa.kode_siswa and
tb_siswa.kode_keahlian=tb_keahlian.kode_keahlian and 
(tb_kelas_siswa.tahun_masuk='$_GET[cr]' or tb_keahlian.nama_keahlian like '%$_GET[cr]%' or tb_siswa.nama like '%$_GET[cr]%')
group by tb_kelas_siswa.tahun_masuk,tb_kelas_siswa.kode_kelas,tb_kelas_siswa.tahun_masuk
order by tb_kelas_siswa.tahun_masuk, tb_keahlian.nama_keahlian, tb_kelas.nama_kelas asc");
	if(num($qrycr)==0)
	{echo "<tr><td colspan='5' align='center'>Tidak ditemukan</td></tr>";}
	else
	{
	$i=0;
	while($cr= mysql_fetch_array($qrycr))
	{
		$th_ajaran=$cr['tahun_masuk']."/".($cr['tahun_masuk']+1);	
		if($i%2)
		{$bg="#D6DEFE";}
		else
		{$bg="#FFFFFF";}
	echo "
	<tr id='td' bgcolor='$bg'>";
if($user['akses']=="1"){
echo	"<td align='center'>
		"?>
        <input type='checkbox' name='kode1[]' value='<?php echo $out['kode_keahlian'];?>' onClick="$('.xx<?php echo $out['0'];?>').click();"/><?php echo "
		<input type='checkbox' name='kode2[]' value='$out[kode_kelas]' class='xx$out[0]' style='display:none'/>
		<input type='checkbox' name='kode3[]' value='$out[tahun_masuk]' class='xx$out[0]' style='display:none'/>
		</td>";
}echo "
			<td align='center'>$th_ajaran</td>
			<td>$cr[nama_keahlian]</td>
			<td align='center'>$cr[nama_kelas]</td>
			<td align='center'>
	";?>		<div id="detail_a" onClick="detail('kelas_siswa_detail.php?tahun=<?php echo $cr['tahun_masuk'];?>&kode_kelas=<?php echo $cr['kode_kelas'];?>&kode_keahlian=<?php echo $cr['kode_keahlian'];?>');"></div> <?php echo "
	";
if($user['akses']=="1"){	
?>		<div id="hapus" onClick="konfirm('menghapus kelas <?php echo $cr['nama_keahlian']." ".$cr['nama_kelas']." tahun ajaran ".$th_ajaran;?>','kelas_siswa_hapus.php?tahun=<?php echo $cr['tahun_masuk'];?>&kode_kelas=<?php echo $cr['kode_kelas'];?>&kode_keahlian=<?php echo $cr['kode_keahlian'];?>');"></div> <?php } echo "
			</td>
		</tr>
		";
	$i++;
	}
}
?>
</table>
<?php	
}
}
?>
</form>
