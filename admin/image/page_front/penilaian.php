<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/konhu.php";
$qry_user=mysql_query("select * from tb_guru where nip='$_SESSION[pengguna]'");
$user=mysql_fetch_array($qry_user);
	?>
<div id="jud"><span id="judul">Penilaian Peserta Didik</span></div>
<?php
if(isset($_GET['notif'])=="yes")
{echo "<div class='notif'>Penilaian berhasil</div>";}
if(isset($_GET['kode_nilai']))
{
	foreach($_GET['kode_nilai'] as $x)
	{
		foreach($x as $y => $z)
		{	
			$oConver = new nh();
			$c = $oConver->conversiAngka($z);
			$kh = ucwords(strtolower($c));
			if($z=="")
			{}
			else
			{$simpan=que("INSERT INTO tb_nilai VALUES (NULL, '$y', '$_GET[kelas]', '$_GET[sk]', '$z', '$kh');");}
		}
	}
	if($simpan)
	{echo "0|";?>
	<script>pg('penilaian.php?notif=yes&tahun=<?php echo $_GET['tahun'];?>&keahlian=<?php echo $user['kode_keahlian'];?>&semester=<?php echo $_GET['semester'];?>&kelas=<?php echo $_GET['kelas'];?>&sk=<?php echo $_GET['sk'];?>');</script><?php
	}
	else
	{	echo "0|<div class='notif'>Penilaian tidak berhasil</div>"; }		
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
		$(".simpan").val("Menyimpan...");
		$("#cek_form *").prop("disabled","disabled");
		$.ajax({
			url: "admin/page_front/penilaian.php?"+data,
			success: function(result,status){				
				response = result.split("|");
				if(response[0] != "1")
				{
					$('.notif').remove();
					$(".simpan").val("Simpan");
					$(".simpan").focus();
					$("#cek_form *").removeAttr("disabled");
					$("#cek_form").before(response[1]);
				}
				else
				{pages('penilaian.php');}
			}
		});
	});
});
</script>
<form id="cek_form" action="#" method="get" enctype="multipart/form-data">
<table id="form">
<tr>
	<td width="165px">Tahun Ajaran Masuk</td>
	<td>
    <select name="tahun" required id="select" onchange="pg('penilaian.php?tahun='+this.value);">
    <option value=""></option>
    <?php
    $qry1=que("
	select tb_kelas_siswa.tahun_masuk from tb_kelas_siswa, tb_kelas, tb_keahlian, tb_siswa where
	tb_kelas_siswa.kode_kelas=tb_kelas.kode_kelas and 
	tb_kelas_siswa.kode_keahlian=tb_keahlian.kode_keahlian and
	tb_kelas.kode_keahlian=tb_keahlian.kode_keahlian and
	tb_kelas_siswa.kode_keahlian=tb_kelas.kode_keahlian and
	tb_kelas_siswa.kode_siswa=tb_siswa.kode_siswa and
	tb_siswa.kode_keahlian=tb_keahlian.kode_keahlian
	group by tb_kelas_siswa.tahun_masuk
	order by tb_kelas_siswa.tahun_masuk, tb_keahlian.nama_keahlian, tb_kelas.nama_kelas asc
	");
	while($arr1=fetch($qry1))
	{if($_GET['tahun']==$arr1['0']){echo "<option value='$arr1[0]' selected>".$arr1['0']."/".($arr1['0']+1)."</option>";}else{echo "<option value='$arr1[0]'>".$arr1['0']."/".($arr1['0']+1)."</option>";}}
	?>
    </select>    	
    </td>
</tr>
<tr>
	<td width="165px">Semester</td>
	<td>
    <select name="semester" required id="select" onchange="pg('penilaian.php?tahun=<?php echo $_GET['tahun'];?>&keahlian=<?php echo $user['kode_keahlian'];?>&semester='+this.value);">
    <?php
    $qry4=que("select kelas from tb_standar, tb_guru_sk where tb_standar.kode_standar=tb_guru_sk.kode_standar and tb_guru_sk.kode_guru='$user[kode_guru]' and tb_standar.kode_keahlian='$user[kode_keahlian]' group by kelas order by kelas asc");
	if(!$user['kode_keahlian']=="")
	{echo "<option></option>";}
	while($arr4=fetch($qry4))
	{$s="$arr4[0]$arr4[1]"; if($s==$_GET['semester']){ echo "<option value='$arr4[0]' selected>$arr4[0]</option>"; }else{ echo "<option value='$arr4[0]'>$arr4[0]</option>"; }}
	?>
	</select>   	
    </td>
</tr>
<tr>
	<td width="165px">Kelas Pararel</td>
	<td>
    <select name="kelas" required id="select" onchange="pg('penilaian.php?tahun=<?php echo $_GET['tahun'];?>&keahlian=<?php echo $user['kode_keahlian'];?>&semester=<?php echo $_GET['semester'];?>&kelas='+this.value);">
    <?php
    $qry5=que("
		select tb_kelas.kode_kelas,tb_kelas.nama_kelas from tb_kelas_siswa, tb_kelas, tb_keahlian, tb_siswa where
		tb_kelas_siswa.kode_kelas=tb_kelas.kode_kelas and 
		tb_kelas_siswa.kode_keahlian=tb_keahlian.kode_keahlian and
		tb_kelas.kode_keahlian=tb_keahlian.kode_keahlian and
		tb_kelas_siswa.kode_keahlian=tb_kelas.kode_keahlian and
		tb_kelas_siswa.kode_siswa=tb_siswa.kode_siswa and
		tb_siswa.kode_keahlian=tb_keahlian.kode_keahlian and
		tb_kelas_siswa.tahun_masuk='$_GET[tahun]' and
		tb_keahlian.kode_keahlian='$user[kode_keahlian]'
		group by tb_kelas.nama_kelas order by tb_kelas_siswa.tahun_masuk, tb_keahlian.nama_keahlian, tb_kelas.nama_kelas asc
	");
	if(num($qry5)>0)
	{
		echo "<option>	</option>";
		while($arr5=fetch($qry5))
		{if($_GET['kelas']==$arr5['0']){echo "<option value='$arr5[0]' selected>".$arr5['1']."</option>";}else{echo "<option value='$arr5[0]'>".$arr5['1']."</option>";}}
	}
	else
	{}
	?>
    </select>    	
    </td>
</tr>
<tr>
	<td width="165px">Standar Kompetensi</td>
	<td>
    <select name="sk" required id="select" onchange="pg('penilaian.php?tahun=<?php echo $_GET['tahun'];?>&keahlian=<?php echo $user['kode_keahlian'];?>&semester=<?php echo $_GET['semester'];?>&kelas=<?php echo $_GET['kelas'];?>&sk='+this.value);">
    <?php
    $qry6=que("select * from tb_standar, tb_guru_sk where tb_standar.kode_standar=tb_guru_sk.kode_standar and tb_standar.kode_keahlian='$_GET[keahlian]' and tb_guru_sk.kode_guru='$user[kode_guru]' and tb_standar.kelas='$_GET[semester]' order by nama_standar");

	if(num($qry6)>0)
	{
		echo "<option>	</option>";
		while($arr6=fetch($qry6))
		{
			if($_GET['sk']==$arr6['0']){echo "<option value='$arr6[0]' selected>".$arr6['2']."</option>";}else{echo "<option value='$arr6[0]'>".$arr6['2']."</option>";}
		}
	}
	else
	{}
	?>
    </select>    	
    </td>
</tr>
<tr>
	<td></td>
	<td>
      <input type='submit' name="simpan" id='tl' class="simpan" value='Simpan'/> 
      <input type='reset' name='reset' value='Hapus' id="tl" onClick="pg('penilaian.php');"/>
    </td>
</tr>
</table>
<?php
if(isset($_GET['sk'])!="" && isset($_GET['kelas'])!="")
{
?>
<table width="100%" id="data" style="margin-top:10px;">
	<tr>
      <th width='90%' align="left" style="padding-left:20px">Nama</th>
      <th width='10%'>Nilai</th>
    </tr>
	<?php
    $qry_data = que("select tb_siswa.kode_siswa, tb_siswa.nama, tb_kelas.kode_kelas, tb_kelas.kode_keahlian from tb_kelas_siswa, tb_kelas, tb_keahlian, tb_siswa where
				tb_kelas_siswa.kode_kelas=tb_kelas.kode_kelas and 
				tb_kelas_siswa.kode_keahlian=tb_keahlian.kode_keahlian and
				tb_kelas.kode_keahlian=tb_keahlian.kode_keahlian and
				tb_kelas_siswa.kode_keahlian=tb_kelas.kode_keahlian and
				tb_kelas_siswa.kode_siswa=tb_siswa.kode_siswa and
				tb_siswa.kode_keahlian=tb_keahlian.kode_keahlian and
				tb_kelas_siswa.tahun_masuk='$_GET[tahun]' and
				tb_keahlian.kode_keahlian='$user[kode_keahlian]' and
				tb_kelas.kode_kelas='$_GET[kelas]'
				order by tb_kelas_siswa.tahun_masuk, tb_keahlian.nama_keahlian, tb_kelas.nama_kelas asc
				");
        $i=0;
		$qq=0;
		if(num($qry_data)==0)
		{echo "<tr><td colspan='2' align='center'>Data tidak ada</td></tr>";}
        while($out= mysql_fetch_array($qry_data))
        {
            $qrycek = que("select * from tb_nilai where kode_siswa='$out[0]' and kode_kelas='$out[2]' and kode_standar='$_GET[sk]'");
            if(num($qrycek)>0)
            {}
            else
            {
                if($i%2)
                {$bg="#D6DEFE";}
                else
                {$bg="#FFFFFF";}
                echo "
                <tr id='td' bgcolor='$bg'>
                    <td style='padding-left:20px'>$out[1]</td>
                    <td align='center'><input type='text' name='kode_nilai[][$out[0]]' value='' maxlength='2' style='text-align:center;width:27px; padding:2px 0px;'></td>
                </tr>
                ";
                $i++;
				$qq=$qq+1;
			}
        }
		if($qq==0)
		{echo "<tr><td colspan='2' align='center'>Nilai sudah dimasukkan semua</td></tr>";}
echo "</table></form>";
}
else
{}
}
?>