<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
?>
<script>
$("#detail").mouseleave(function(){$("#detail").animate({'margin-right':'-=300px'}, 600, 'swing');});
function detail(x)
{
	page = x;
	$.ajax({
		url: page,
		success:function(result,status){
		$("#detail").html(result);
		$("#detail").animate({'margin-right':'+=300px'}, 1000, 'swing');;
		}
	});
}
</script>										
<div id="detail">
</div>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian guru, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('guru.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Guru</div>
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
<div id="btn1" onClick="pages('guru_tambah.php');"></div>
<p onclick="tanya('guru');" id="hapus_semua"></p>
<?php
}
$p=que("select ket1 from tb_aksesoris where nama='paging'");
$page		= fetch($p);
$perpage	= $page['0']; 
$querytotal	= que("SELECT * FROM tb_guru");
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
{?><p onClick="pg('guru.php?page=<?php echo $curpage+1; ?>')" id="next_a"></p> <?php }	
else
{echo "<p  id='next_d'></p>";}	
?><select name='halaman' onchange="pg('guru.php?page='+this.value)"><?php
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
{?><p onClick="pg('guru.php?page=<?php echo $curpage-1; ?>')" id="back_a"></p> <?php }
else
{echo "<p  id='back_d'></p>";}	
echo "<div id='pg_tot'>Jumlah Data : <b style='font-size:15px;'>$pagetotal</b></div>";
echo "</div>";
?>
<table width="100%" id="data">
	<tr>
<?php if($user['akses']=="1"){?><th width='5%'><input type="checkbox" id="cek" onClick="cek_all()" value="All"></th><?php }?>
      <th width='17%'>NIP</th>
      <th width='35%'>Nama</th>
      <th width='25%'>Kompetensi Keahlian</th>
      <th width='10%'>Status</th>
	  <th width='8%' align="center">Aksi</th>
    </tr>
<?php
$qry = que("SELECT * FROM tb_guru, tb_keahlian WHERE tb_guru.kode_keahlian=tb_keahlian.kode_keahlian ORDER BY nama_guru ".$limit);
if(num($qry)==0)
{echo "<tr><td colspan='6' align='center'>Data tidak ada</td></tr>";}
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
		<td>$out[nip]</td>
		<td>$out[nama_guru]</td>
		<td>$out[nama_keahlian]</td>
		<td>$out[status]</td>
     	<td align='center'>
";?>		<div id="detail_t" onclick="detail('guru_detail.php?id_detail=<?php echo $out['0'];?>');"></div>
<?php if($user['akses']=="1"){?>		
			<div id="edit" onClick="pages('guru_edit.php?id=<?php echo $out['0'];?>')"></div>		
 			<div id="hapus" onClick="konfirm('menghapus <?php echo $out['nama_guru'];?>','guru_hapus.php?id=<?php echo $out['0'];?>');"></div> <?php } echo "
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
{?><script>pages('guru.php?notif=ta');</script><?php }
else
{
	?>
	<div id="paging">
	<p onClick="pages('guru.php')" id="back"></p>
<?php if($user['akses']=="1"){?><p onclick="tanya('guru');" id="hapus_semua"></p><?php }?>
	</div>
	<table width="100%" id="data">
		<tr>
    <?php if($user['akses']=="1"){?><th width='5%'><input type="checkbox" id="cek" onClick="cek_all()" value="All"></th><?php }?>
          <th width='17%'>NIP</th>
          <th width='35%'>Nama</th>
          <th width='25%'>Kompetensi Keahlian</th>
          <th width='10%'>Status</th>
    	  <th width='8%' align="center">Aksi</th>
		</tr>
	<?php
	$qrycr = que("SELECT * FROM tb_guru, tb_keahlian WHERE tb_guru.kode_keahlian=tb_keahlian.kode_keahlian AND (tb_guru.nip LIKE '%$_GET[cr]%' OR tb_guru.nama_guru LIKE '%$_GET[cr]%') ORDER BY nama_guru asc");
	if(num($qrycr)==0)
	{echo "<tr><td colspan='6' align='center'>Tidak ditemukan</td></tr>";}
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
echo "		<td>$cr[nip]</td>
			<td>$cr[nama_guru]</td>
			<td>$cr[nama_keahlian]</td>
			<td>$cr[status]</td>
			<td align='center'>
	";?>		<div id="detail_t" onclick="detail('guru_detail.php?id_detail=<?php echo $cr['0'];?>');"></div>
<?php if($user['akses']=="1"){?>    			<div id="edit" onClick="pages('guru_edit.php?id=<?php echo $cr['0'];?>')"></div>
             	<div id="hapus" onClick="konfirm('menghapus <?php echo $cr['nama_guru'];?>','guru_hapus.php?id=<?php echo $cr['0'];?>')"></div> <?php } echo "
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
