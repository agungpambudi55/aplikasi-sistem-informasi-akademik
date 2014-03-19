<table id="data" width="100%" style="margin:10px 0px;">
  <tr>
    <th width="28%" style="padding:9px 0px;">Nama</th>
    <th width="12%" style="padding:9px 0px;">NISN</th>
    <th width="13%" style="padding:9px 0px;">NIS</th>
    <th width="22%" style="padding:9px 0px;">Tempat, Tanggal Lahir</th>
    <th width="14%" style="padding:9px 0px;">Jenis Kelamin</th>
    <th width="11%" style="padding:9px 0px;">Telpon</th>
  </tr>
<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$qry_det =que("
select * from tb_kelas_siswa, tb_kelas, tb_keahlian, tb_siswa where
tb_kelas_siswa.kode_kelas=tb_kelas.kode_kelas and 
tb_kelas_siswa.kode_keahlian=tb_keahlian.kode_keahlian and
tb_kelas.kode_keahlian=tb_keahlian.kode_keahlian and
tb_kelas_siswa.kode_keahlian=tb_kelas.kode_keahlian and
tb_kelas_siswa.kode_siswa=tb_siswa.kode_siswa and
tb_siswa.kode_keahlian=tb_keahlian.kode_keahlian and
tb_kelas_siswa.tahun_masuk='$_GET[tahun]' and
tb_kelas_siswa.kode_keahlian='$_GET[kode_keahlian]' and
tb_kelas_siswa.kode_kelas='$_GET[kode_kelas]'
order by tb_siswa.nama  asc
");
while($arr_det =fetch($qry_det))
{
	echo "
  <tr id='td'>
    <td>$arr_det[nama]</td>
    <td align='center'>$arr_det[nisn]</td>
    <td align='center'>$arr_det[nis]</td>
    <td>$arr_det[tmp_lahir], ".substr($arr_det['tgl_lahir'],0,2)." ".bulan(substr($arr_det['tgl_lahir'],3,2))." ".substr($arr_det['tgl_lahir'],6,4)."</td>
    <td align='center'>$arr_det[jenis_kelamin]</td>
    <td align='center'>$arr_det[telpon]</td>
  </tr>	
	";
}
?>
</table>
