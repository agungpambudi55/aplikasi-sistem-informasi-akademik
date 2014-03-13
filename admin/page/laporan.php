<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
?>
<div id="tit_page">Laporan Nilai</div>
<table id="data" width="100%">
<tr>
	<th width="95%">Jenis Laporan</th>
	<th width="5%">Aksi</th>
</tr>
  <tr>
    <td>Nilai Berdasarkan Siswa Per Semester</td>
    <td align="center">
<div id="print" onclick="pages('laporan_nilai_berdasarkan_siswa.php');"></div>
    </td>
  </tr>
  <tr>
    <td>Nilai Berdasarkan Standar Kompetensi Per Kelas</td>
    <td align="center">
<div id="print" onclick="pages('laporan_nilai_berdasarkan_standar_kompetensi.php');"></div>
    </td>
  </tr>
  <tr>
    <td>Nilai Berdasarkan Semua Standar Kompetensi Per Siswa</td>
    <td align="center">
<div id="print" onclick="pages('laporan_nilai_berdasarkan_semua_standar_kompetensi.php');"></div>
    </td>
  </tr>
  <tr>
    <td>Laporan Peringkat Berdasarkan Per Kelas</td>
    <td align="center">
<div id="print" onclick="pages('laporan_peringkat_berdasarkan_perkelas.php');"></div>
    </td>
  </tr>
</table>

