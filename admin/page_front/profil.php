<?php
session_start();
require "../config/koneksi.php";
require "../config/fungsi.php";
$qry_user=que("SELECT * FROM tb_siswa, tb_wali, tb_keahlian WHERE tb_keahlian.kode_keahlian=tb_siswa.kode_keahlian and tb_wali.kode_siswa = tb_siswa.kode_siswa AND tb_siswa.nis = '$_SESSION[pengguna]'");
$arr_user=mysql_fetch_array($qry_user);
?>
<div id="jud"><span id="judul">Identitas Peserta Didik</span></div>
<table width="100%" border="0" id="detail1">
  <tr>
    <th width="20%" colspan="2">Identitas</th>
  </tr>
  <tr>
    <td width="20%">Nama</td>
    <td width="80%">: <?php echo $arr_user['nama'];?></td>
  </tr>
  <tr>
    <td width="20%">NISN</td>
    <td width="80%">: <?php echo $arr_user['nisn'];?></td>
  </tr>
  <tr>
    <td width="20%">NIS</td>
    <td width="80%">: <?php echo $arr_user['nis'];?></td>
  </tr>
  <tr>
    <td width="20%">Alamat</td>
    <td width="80%">: <?php echo $arr_user['alamat'];?></td>
  </tr>
  <tr>
    <td width="20%">Tempat, Tanggal Lahir</td>
    <td width="80%">: <?php echo $arr_user['tmp_lahir'].", ".substr($arr_user['tgl_lahir'],0,2)." ".bulan(substr($arr_user['tgl_lahir'],3,2))." ".substr($arr_user['tgl_lahir'],6,4);?></td>
  </tr>
  <tr>
    <td width="20%">Jenis Kelamin</td>
    <td width="80%">: <?php echo $arr_user['jenis_kelamin'];?></td>
  </tr>
  <tr>
    <td width="20%">Telpon</td>
    <td width="80%">: <?php echo $arr_user['9'];?></td>
  </tr>
  <tr>
    <th width="20%" colspan="2">Asal Sekolah</th>
  </tr>
  <tr>
    <td width="20%">Nama Sekolah</td>
    <td width="80%">: <?php echo $arr_user['sekolah_nama'];?></td>
  </tr>
  <tr>
    <td width="20%">Alamat Sekolah</td>
    <td width="80%">: <?php echo $arr_user['sekolah_alamat'];?></td>
  </tr>
  <tr>
    <td width="20%">Tahun Lulus</td>
    <td width="80%">: <?php echo $arr_user['ijasah_tahun'];?></td>
  </tr>
  <tr>
    <td width="20%">Ijasah Nomor</td>
    <td width="80%">: <?php echo $arr_user['ijasah_no'];?></td>
  </tr>
  <tr>
    <th width="20%" colspan="2">Wali Siswa</th>
  </tr>
  <?php if($arr_user['nama_wali']==""){?>
  <tr>
    <td width="20%">Nama Ayah</td>
    <td width="80%">: <?php echo $arr_user['nama_ayah'];?></td>
  </tr>
  <tr>
    <td width="20%">Pekerjaan Ayah</td>
    <td width="80%">: <?php echo $arr_user['pekerjaan_ayah'];?></td>
  </tr>
  <tr>
    <td width="20%">Pendidikan Ayah</td>
    <td width="80%">: <?php echo $arr_user['pendidikan_ayah'];?></td>
  </tr>
  <tr>
    <td width="20%">Nama Ibu</td>
    <td width="80%">: <?php echo $arr_user['nama_ayah'];?></td>
  </tr>
  <tr>
    <td width="20%">Pekerjaan Ibu</td>
    <td width="80%">: <?php echo $arr_user['pekerjaan_ayah'];?></td>
  </tr>
  <tr>
    <td width="20%">Pendidikan Ibu</td>
    <td width="80%">: <?php echo $arr_user['pendidikan_ibu'];?></td>
  </tr>
  <?php } else {?>
  <tr>
    <td width="20%">Nama Wali</td>
    <td width="80%">: <?php echo $arr_user['nama_wali'];?></td>
  </tr>
  <tr>
    <td width="20%">Pekerjaan Wali</td>
    <td width="80%">: <?php echo $arr_user['pekerjaan_wali'];?></td>
  </tr>
  <tr>
    <td width="20%">Pendidikan Wali</td>
    <td width="80%">: <?php echo $arr_user['pendidikan_wali'];?></td>
  </tr>
  <?php }?>
  <tr>
    <td width="20%">Telpon</td>
    <td width="80%">: <?php echo $arr_user['telpon'];?></td>
  </tr>
  <tr>
    <th width="20%" colspan="2">Kompetensi Keahlian</th>
  </tr>
  <tr>
    <td width="20%">Kompetensi Keahlian</td>
    <td width="80%">: <?php echo $arr_user['nama_keahlian'];?></td>
  </tr>
  <tr>
    <td width="20%">Tanggal Masuk</td>
    <td width="80%">: <?php echo substr($arr_user['tgl_masuk'],0,2)." ".bulan(substr($arr_user['tgl_masuk'],3,2))." ".substr($arr_user['tgl_masuk'],6,4);?></td>
  </tr>
  <tr>
    <th width="20%" colspan="2">Photo</th>
  </tr>
  <tr>
    <td width="20%" colspan="2"><img src="admin/image/siswa/<?php echo $arr_user['photo'];?>" id="photo"/></td>
  </tr>
</table>
