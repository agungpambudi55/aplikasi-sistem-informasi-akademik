<?php
require "../config/koneksi.php";
$ttt = mysql_query("SELECT * FROM tb_standar WHERE kode_keahlian=".$_GET['id']." ORDER BY nama_standar ASC");
if((mysql_num_rows($ttt))>0)
{echo "<option value=''></option>";}

	while($m = mysql_fetch_array($ttt))
	{
		echo "<option value='".$m['kode_standar']."'>".$m['nama_standar']."</option>";
	}
?>