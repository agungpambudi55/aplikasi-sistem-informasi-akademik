<?php
require "../config/koneksi.php";
$xxx = mysql_query("SELECT * FROM tb_guru WHERE kode_keahlian=".$_GET['id']." ORDER BY nama_guru ASC");
if((mysql_num_rows($xxx))>0)
{echo "<option value=''></option>";}
while($x = mysql_fetch_array($xxx))
{
	echo "<option value='".$x['kode_guru']."'>".$x['nama_guru']."</option>";
}
?>