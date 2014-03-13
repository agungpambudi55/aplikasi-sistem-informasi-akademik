<?php
function que($r){return mysql_query($r);}
function fetch($r){return mysql_fetch_array($r);}
function num($r){return mysql_num_rows($r);}
function esc($r){return mysql_real_escape_string($r);}
function bulan($bulan)
{
		switch($bulan)
		{
			case "01";	$bulan = "Januari";		break;
			case "02";	$bulan = "Februari";	break;
			case "03";	$bulan = "Maret";			break;
			case "04";	$bulan = "April";			break;
			case "05";	$bulan = "Mei";			  break;
			case "06";	$bulan = "Juni";			break;
			case "07";	$bulan = "Juli";			break;
			case "08";	$bulan = "Agustus";		break;
			case "09";	$bulan = "September";	break;
			case "10";	$bulan = "Oktober";		break;
			case "11";	$bulan = "November";	break;
			case "12";	$bulan = "Desember";	break;
		}
		return $bulan;
} 
function hari($hari)
  {
    switch($hari)
		{
			case "Sun";	$hari = "Minggu";	break;
			case "Mon";	$hari = "Senin";	break;
			case "Tue";	$hari = "Selasa";	break;
			case "Wed";	$hari = "Rabu";		break;
			case "Thu";	$hari = "Kamis";	break;
			case "Fri";	$hari = "Jumat";	break;
			case "Sat";	$hari = "Sabtu";	break;
		}
    return $hari;
  }
 
?>