<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
if(isset($_GET['hapus']))
{
	que("delete from tb_user where kode='$_GET[hapus]'");
	echo "<script>pg('user_siswa.php?i=h');</script>";
}
elseif(isset($_GET['aktif']))
{
	que("update tb_user set status='1' where kode='$_GET[aktif]'");
	echo "<script>pg('user_siswa.php?i=a');</script>";
}
elseif(isset($_GET['blokir']))
{
	que("update tb_user set status='2' where kode='$_GET[blokir]'");
	echo "<script>pg('user_siswa.php?i=b');</script>";
}
elseif(isset($_GET['konfirmasi']))
{
	que("update tb_user set status='1' where kode='$_GET[konfirmasi]'");
	echo "<script>pg('user_siswa.php?i=c');</script>";
}
else
{
?>
<div id="tit_page">Pengguna Siswa</div>
<?php
if(isset($_GET['i']))
{
	if($_GET['i']=="h")
	{echo "<div class='notif'>Pengguna siswa berhasil dihapus</div>";}
	elseif($_GET['i']=="a")
	{echo "<div class='notif'>Pengguna siswa berhasil diaktifkan</div>";}
	elseif($_GET['i']=="b")
	{echo "<div class='notif'>Pengguna siswa berhasil diblokir</div>";}
	elseif($_GET['i']=="c")
	{echo "<div class='notif'>Pengguna siswa berhasil dikonfirmasi</div>";}
}
?>
<div id="paging">
<?php
$p=que("select ket1 from tb_aksesoris where nama='paging'");
$page		= fetch($p);
$perpage	= $page['0']; 
$querytotal	= que("SELECT * FROM tb_user where akses='2'");
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
{?><p onClick="pg('user_siswa.php?page=<?php echo $curpage+1; ?>')" id="next_a"></p> <?php }	
else
{echo "<p  id='next_d'></p>";}	
?><select name='halaman' onchange="pg('user_siswa.php?page='+this.value)"><?php
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
{?><p onClick="pg('user_siswa.php?page=<?php echo $curpage-1; ?>')" id="back_a"></p> <?php }
else
{echo "<p  id='back_d'></p>";}	
echo "<div id='pg_tot'>Jumlah Data : <b style='font-size:15px;'>$pagetotal</b></div>";
echo "</div>";
?>
<table width="100%" id="data">
	<tr>
      <th width='5%'>No</th>
      <th width='70%'>Nama [kode pengguna]</th>
      <th width='20%' colspan="2" align="center" style="padding-left:45px;">Status</th>
      <th width='5%' align="center">Aksi</th>
    </tr>
<?php
$qry = que("select * from tb_user, tb_siswa where tb_user.kode=tb_siswa.nis and tb_user.akses='2' order by tb_user.status desc, tb_siswa.nama asc ".$limit);
if(num($qry)==0)
{echo "<tr><td colspan='5' align='center'>Tidak ada pengguna siswa</td></tr>";}
else
{
$i=($curpage*$perpage)-9;
while($out= mysql_fetch_array($qry))
{
	if($out['status'] == "1"){$status = "Aktif";}elseif($out['status'] == "2"){$status = "Blokir";}else{$status = "Belum dikonfirmasi";}
	if($i%2)
	{$bg="#D6DEFE";}
	else
	{$bg="#FFFFFF";}
	echo "
	<tr id='td' bgcolor='$bg'>
		<td align='center'>".$i."</td>
		<td>$out[nama] <b>[$out[kode]]</b></td>
		<td align='center' width='16%'>$status</td><td width='4%'>";
		if($out['status'] == "1")
		{?><img src='../style/image/blokir.png' width='26' height='17' style='cursor:pointer' onClick="pg('user_siswa.php?blokir=<?php echo $out['kode'];?>')"><?php }
		elseif($out['status'] == "2")
		{?><img src='../style/image/aktif.png' width='26' height='17' style='cursor:pointer' onClick="pg('user_siswa.php?aktif=<?php echo $out['kode'];?>')"><?php }
		elseif($out['status'] == "3")
		{?><img src='../style/image/konfirmasi.png' width='22' height='17' style='cursor:pointer; margin-left:2px' onClick="pg('user_siswa.php?konfirmasi=<?php echo $out['kode'];?>')"><?php }
echo "	</td>
		</td>
		<td align='center'>
";?>		<div id="hapus" style=" float:right; margin-right:15px" onClick="konfirm('menghapus <?php echo $out['nama'];?>','user_siswa.php?hapus=<?php echo $out['kode'];?>');"></div> <?php echo "
		</td>
	</tr>
	";
$i++;
}
}
?>
</table>
<?php }?>