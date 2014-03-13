<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
?>
<div id="tit_page">Pengguna Dashboard</div>
<?php
if(isset($_GET['i']))
{
	if($_GET['i']=="h")
	{echo "<div class='notif'>Pengguna berhasil dihapus</div>";}
	elseif($_GET['i']=="n")
	{echo "<div class='notif'>Pengguna berhasil dinaikkan menjadi administrator</div>";}
	elseif($_GET['i']=="t")
	{echo "<div class='notif'>Pengguna berhasil diturunkan menjadi operator</div>";}
	elseif($_GET['i']=="a")
	{echo "<div class='notif'>Pengguna berhasil diaktifkan</div>";}
	elseif($_GET['i']=="b")
	{echo "<div class='notif'>Pengguna berhasil diblokir</div>";}
}

if(isset($_GET['hapus']))
{
	que("delete from tb_pengguna where kode='$_GET[hapus]'");
	echo "<script>pg('pengguna.php?i=h');</script>";
}
elseif(isset($_GET['akses_ke_ad']))
{
	que("update tb_pengguna set akses='1' where kode='$_GET[akses_ke_ad]'");
	echo "<script>pg('pengguna.php?i=n');</script>";
}
elseif(isset($_GET['akses_ke_ope']))
{
	que("update tb_pengguna set akses='2' where kode='$_GET[akses_ke_ope]'");
	echo "<script>pg('pengguna.php?i=t');</script>";
}
elseif(isset($_GET['aktif']))
{
	que("update tb_pengguna set status='1' where kode='$_GET[aktif]'");
	echo "<script>pg('pengguna.php?i=a');</script>";
}
elseif(isset($_GET['blokir']))
{
	que("update tb_pengguna set status='2' where kode='$_GET[blokir]'");
	echo "<script>pg('pengguna.php?i=b');</script>";
}
else
{	
?>
<div id="paging">
<div id="btn1" onClick="pages('pengguna_tambah.php');"></div>
</div>
<table width="100%" id="data">
	<tr>
      <th width='5%'>No</th>
      <th width='53%'>Nama [nama pengguna]</th>
      <th width='16%' colspan="2">Hak Akses</th>
      <th width='16%' colspan="2" align="left" style="padding-left:45px;">Status</th>
      <th width='5%' align="center">Aksi</th>
    </tr>
<?php
$qry = que("select * from tb_pengguna where kode!='admin' order by nama asc");
if(num($qry)==0)
{echo "<tr><td colspan='5' align='center'>Tidak ada pengguna lain</td></tr>";}
else
{
$i=0;
while($out= mysql_fetch_array($qry))
{
	if($out['akses'] == "1"){$akses = "Administrator";}else{$akses = "Operator";}			
	if($out['status'] == "1"){$status = "Aktif";}else{$status = "Blokir";}
	if($i%2)
	{$bg="#D6DEFE";}
	else
	{$bg="#FFFFFF";}
	echo "
	<tr id='td' bgcolor='$bg'>
		<td align='center'>".($i+1)."</td>
		<td>$out[1] <b>[$out[0]]</b></td>
		<td align='center' width='12%'>$akses</td><td width='4%'>";
		if($out['akses'] == "1")
		{?><img src='../style/image/down.png' width='20' height='17' style='cursor:pointer' onClick="pg('pengguna.php?akses_ke_ope=<?php echo $out['0'];?>')"><?php }
		else
		{?><img src='../style/image/up.png' width='20' height='17' style='cursor:pointer' onClick="pg('pengguna.php?akses_ke_ad=<?php echo $out['0'];?>')"><?php }
echo "	</td>
		<td align='center' width='8%'>$status</td><td width='8%'>";
		if($out['status'] == "1")
		{?><img src='../style/image/blokir.png' width='26' height='17' style='cursor:pointer' onClick="pg('pengguna.php?blokir=<?php echo $out['0'];?>')"><?php }
		else
		{?><img src='../style/image/aktif.png' width='26' height='17' style='cursor:pointer' onClick="pg('pengguna.php?aktif=<?php echo $out['0'];?>')"><?php }
echo "	</td>
		</td>
		<td align='center'>
";?>		<div id="hapus" style="margin-right:14px;" onClick="konfirm('menghapus <?php echo $out['1'];?>','pengguna.php?hapus=<?php echo $out['0'];?>');"></div> <?php echo "
		</td>
	</tr>
	";
$i++;
}
}
?>
</table>
<?php }?>