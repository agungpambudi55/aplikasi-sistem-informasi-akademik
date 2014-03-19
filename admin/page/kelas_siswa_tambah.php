<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
?>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian kelas siswa, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('bidang.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Kelas Siswa</div>
<?php
if(isset($_GET['notif'])=="yes")
{echo "<div class='notif'>Siswa berhasil dimasukkan kelas</div>";}
if(isset($_GET['tahun']) && isset($_GET['kelas']))
{
	if(isset($_GET['kode_cek']))
	{
		$cek = que("SELECT * FROM tb_bidang WHERE kode_bidang='".$_GET['kode']."';");
		if(num($cek)>0)
		{
			echo "0|<div class='notif'>Kode $_GET[kode] telah digunakan, pilih kode lain</div>";
		}
		else
		{
			foreach($_GET['kode_cek'] as $n => $v)
			{
				$simpan = que("INSERT INTO tb_kelas_siswa VALUES(
				NULL,
				'$_GET[keahlian]',
				'$v',
				'$_GET[kelas]',
				'$_GET[tahun]'
				)");	
			}
			if($simpan)
			{echo "0|";?>
				<script>pg('kelas_siswa_tambah.php?notif=yes&keahlian=<?php echo $_GET['keahlian'];?>&tahun=<?php echo $_GET['tahun'];?>');</script><?php
			}
			else
			{	echo "0|<div class='notif'>Siswa gagal dimasukkan kelas</div>"; }		
		}
	}
	else
	{	echo "0|<div class='notif'>Tidak ada siswa yang dimasukkan kelas</div>"; }
}
else
{
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#cek_form").submit(function(event){
		event.preventDefault();
		$('.notif').remove();
		data = $("#cek_form").serialize();
		$("#simpan").val("Menyimpan...");
		$("#cek_form *").prop("disabled","disabled");
		$.ajax({
			url: "kelas_siswa_tambah.php?"+data,
			success: function(result,status){				
				response = result.split("|");
				if(response[0] != "1")
				{
					$('.notif').remove();
					$("#simpan").val("Simpan");
					$("#simpan").focus();
					$("#cek_form *").removeAttr("disabled");
					$("#cek_form").before(response[1]);
				}
				else
				{pages('kelas_siswa_tambah.php');}
			}
		});
	});
});
</script>
<form id="cek_form" action="#" method="get">
<table id="form">
  <tr>
  	<td width="165px">Kompetensi Keahlian</td>
    <td>
    <select name="keahlian" required id="select" onchange="pg('kelas_siswa_tambah.php?keahlian='+this.value);">
    <option value=""></option>
    <?php
    $qry1=que("select * from tb_keahlian order by nama_keahlian asc");
	while($arr1=fetch($qry1))
	{if($_GET['keahlian']==$arr1['0']){echo "<option value='$arr1[0]' selected>$arr1[2]</option>";}else{echo "<option value='$arr1[0]'>$arr1[2]</option>";}}
	?>
    </select>
    </td>
 </tr>
  <tr>
  	<td width="165px">Tahun Masuk Siswa</td>
    <td>
    <?php     
	$qry3=que("select right(tgl_masuk,4) from tb_siswa where kode_keahlian='$_GET[keahlian]' group by right(tgl_masuk,4) order by right(tgl_masuk,4) asc");
	?>
    <select name="tahun" required id="select" onchange="pg('kelas_siswa_tambah.php?keahlian=<?php echo $_GET['keahlian'];?>&tahun='+this.value);">
    <?php
	if(isset($_GET['keahlian'])){if(num($qry3)>0){echo "<option value=''></option>";}}
	while($arr3=fetch($qry3))
	{if($arr3['0']==$_GET['tahun']){echo "<option value='$arr3[0]' selected>$arr3[0]</option>";}else{echo "<option value='$arr3[0]'>$arr3[0]</option>";}}
	?>
    </select>
    <span class="notification">Pilih tahun masuk siswa</span>
    </td>
 </tr>
  <tr>
  	<td width="165px">Kelas</td>
    <td>
    <select name="kelas" required id="select">
    <?php
	if(isset($_GET['keahlian'])){echo "<option value=''></option>";}
    $qry2=que("select * from tb_kelas where kode_keahlian='$_GET[keahlian]' order by nama_kelas asc");
	while($arr2=fetch($qry2))
	{if($arr2==$_GET['kelas']){echo "<option value='$arr2[0]' selected>$arr2[2]</option>";}else{echo "<option value='$arr2[0]'>$arr2[2]</option>";}}
	?>
    </select>
    <span class="notification">Pilih kelas pararel</span>
    </td>
 </tr>
 <tr>
    <td>&nbsp;</td>
  	<td>
    	<input type='submit' id='simpan' value='Simpan' class="btn2"/> 
      <input type='reset' name='reset' value='Hapus' class="btn2" onClick="pg('kelas_siswa_tambah.php');"/>
      <input type="button" value="Kembali" onClick="pages('kelas_siswa.php');" class="btn2"/>      
    </td>
  </tr>
</table>
<?php
if($_GET['tahun']=="")
{}
else
{
?>
<table width="100%" id="data" style="margin-top:10px;">
	<tr>
      <th width='5%'><input type="checkbox" id="cek" onClick="cek_all()" value="All"></th>
      <th width='55%'>Nama</th>
      <th width='40%'>Jenis Kelamin</th>
    </tr>
	<?php
    $qry4 = que("select * from tb_siswa where kode_keahlian='$_GET[keahlian]' and right(tgl_masuk,4)='$_GET[tahun]' order by nama asc");
	$qry6 = que("select * from tb_kelas_siswa where kode_keahlian='$_GET[keahlian]' and tahun_masuk='$_GET[tahun]'");
    if(num($qry4)==0)
    {echo "<tr><td colspan='3' align='center'>Siswa tidak ada</td></tr>";}
	elseif(num($qry4)==num($qry6))
	{echo "<tr><td colspan='3' align='center'>Siswa sudah dimasukkan kelas semua</td></tr>";}
    else
    {
        $i=0;
        while($out= mysql_fetch_array($qry4))
        {
            $qry5 = que("select kode_siswa from tb_kelas_siswa where kode_siswa='$out[0]'");
            if(num($qry5)>0)
            {}
            else
            {
                if($i%2)
                {$bg="#D6DEFE";}
                else
                {$bg="#FFFFFF";}
                echo "
                <tr id='td' bgcolor='$bg'>
                    <td align='center'><input type='checkbox' name='kode_cek[]' value='$out[kode_siswa]'/></td>
                    <td>$out[nama]</td>
                    <td>$out[jenis_kelamin]</td>
                </tr>
                ";
                $i++;
            }
        }
    }
echo "</table>";
}
?>
</form>
<?php
}
?>
