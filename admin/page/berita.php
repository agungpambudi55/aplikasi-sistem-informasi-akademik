<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
?>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian berita, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('berita.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Posting Berita</div>
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
    <div id="btn1" onClick="pages('berita_tambah.php');"></div>
    <p onclick="tanya('berita');" id="hapus_semua"></p>
<?php 
}
$p=que("select ket1 from tb_aksesoris where nama='paging'");
$page		= fetch($p);
$perpage	= $page['0']; 
$querytotal	= que("SELECT * FROM tb_berita");
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
{?><p onClick="pg('berita.php?page=<?php echo $curpage+1; ?>')" id="next_a"></p> <?php }	
else
{echo "<p  id='next_d'></p>";}	
?><select name='halaman' onchange="pg('berita.php?page='+this.value)"><?php
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
{?><p onClick="pg('berita.php?page=<?php echo $curpage-1; ?>')" id="back_a"></p> <?php }
else
{echo "<p  id='back_d'></p>";}	
echo "<div id='pg_tot'>Jumlah Data : <b style='font-size:15px;'>$pagetotal</b></div>";
echo "</div>";
?>
<table width="100%" id="data">
	<tr>
<?php if($user['akses']=="1"){?><th width='5%'><input type="checkbox" id="cek" onClick="cek_all()" value="All"></th><?php }?>
      <th width='70%'>Judul</th>
      <th width='20%'>Tanggal Waktu</th>
<?php if($user['akses']=="1"){?><th width='5%' align="center">Aksi</th><?php }?>
    </tr>
<?php
$qry = que("SELECT * FROM tb_berita ORDER BY tgl desc ".$limit);
if(num($qry)==0)
{echo "<tr><td colspan='4' align='center'>Data tidak ada</td></tr>";}
else
{
$i=0;
while($out= mysql_fetch_array($qry))
{
	if($i%2)
	{$bg="#D6DEFE";}
	else
	{$bg="#FFFFFF";}
	echo "
	<tr id='td' bgcolor='$bg'>";
 if($user['akses']=="1"){echo "<td align='center'><input type='checkbox' name='kode_cek[]' value='$out[0]'/></td>";}
 echo"
		<td>$out[judul]</td>
		<td align='center'>".substr($out['tgl'],8,2)." ".bulan(substr($out['tgl'],5,2))." ".substr($out['tgl'],0,4)." - ".substr($out['tgl'],11,8)."</td>";
if($user['akses']=="1")
{
echo "	<td align='center'>
";?>		<div id="edit" onClick="pages('berita_edit.php?id=<?php echo $out['0'];?>')"></div> <?php echo "
";?>		<div id="hapus" onClick="konfirm('menghapus <?php echo $out['1'];?>','berita_hapus.php?id=<?php echo $out['0'];?>');"></div> <?php echo "
		</td>";
}
echo "
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
{?><script>pages('berita.php?notif=ta');</script><?php }
else
{
	?>
	<div id="paging">
	<p onClick="pages('berita.php')" id="back"></p>
<?php if($user['akses']=="1")
{?><p onclick="tanya('berita');" id="hapus_semua"></p><?php  }?>
	</div>
	<table width="100%" id="data">
	<tr>
<?php if($user['akses']=="1"){?><th width='5%'><input type="checkbox" id="cek" onClick="cek_all()" value="All"></th><?php }?>
      <th width='70%'>Judul</th>
      <th width='20%'>Tanggal Waktu</th>
<?php if($user['akses']=="1"){?><th width='5%' align="center">Aksi</th><?php }?>
    </tr>
	<?php
	$qrycr = que("SELECT * FROM tb_berita WHERE judul LIKE '%$_GET[cr]%' OR isi LIKE '%$_GET[cr]%' ORDER BY judul asc");
	if(num($qrycr)==0)
	{echo "<tr><td colspan='4' align='center'>Tidak ditemukan</td></tr>";}
	else
	{
	$i=0;
	while($cr= mysql_fetch_array($qrycr))
	{
		if($i%2)
		{$bg="#D6DEFE";}
		else
		{$bg="#FFFFFF";}
	echo "
	<tr id='td' bgcolor='$bg'>";
 if($user['akses']=="1"){echo "<td align='center'><input type='checkbox' name='kode_cek[]' value='$out[0]'/></td>";}
 echo"
		<td>$cr[judul]</td>
		<td align='center'>".substr($cr['tgl'],8,2)." ".bulan(substr($cr['tgl'],5,2))." ".substr($cr['tgl'],0,4)." - ".substr($cr['tgl'],11,8)."</td>";
if($user['akses']=="1")
{
echo "	<td align='center'>
";?>		<div id="edit" onClick="pages('berita_edit.php?id=<?php echo $cr['0'];?>')"></div> <?php echo "
";?>		<div id="hapus" onClick="konfirm('menghapus <?php echo $cr['1'];?>','berita_hapus.php?id=<?php echo $cr['0'];?>');"></div> <?php echo "
		</td>";
}
echo "
	</tr>";
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
