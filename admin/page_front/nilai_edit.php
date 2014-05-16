<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/konhu.php";
$qry1=que("select * from tb_nilai where kode_nilai=$_GET[id]");
$arr1=fetch($qry1);
if(isset($_GET['nilai']))
{
	if($_GET['nilai']>100)
	{echo "0|";}
	else
	{
		$oConver = new nh();
		$c = $oConver->conversiAngka($_GET['nilai']);
		$kh = ucwords(strtolower($c));
		$qry2=que("update tb_nilai set nilai_angka='$_GET[nilai]', nilai_huruf='$kh' where kode_nilai='$_GET[id]'");
		if($qry2)
		{echo "1|";}
		else
		{echo "0|";}
	}
}
else
{
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#formtambah").submit(function(event){
		event.preventDefault();
		$('.notif').remove();
		data = $("#formtambah").serialize();
		$("#formtambah *").prop("disabled","disabled");
		$.ajax({
			url: "admin/page_front/nilai_edit.php?"+data,
			success: function(result,status){				
				response = result.split("|");
				if(response[0] != "1")
				{
					$('.notif').remove();
					$("#simpan").focus();
					$("#formtambah *").removeAttr("disabled");
					$("#formtambah").before(response[1]);
				}
				else
				{pg('nilai_p_detail_nilai.php?tahun=<?php echo $_GET['tahun'];?>&kelas=<?php echo $_GET['kelas'];?>&keahlian=<?php echo $_GET['keahlian'];?>&sk=<?php echo $_GET['sk'];?>');}
			}
		});
	});
});
</script>
<form id="formtambah" action="#" method="get">
<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
<table id="form">
  <tr>
    <td><input type="text" name='nilai'  required maxlength='3' pattern="\-?\d+(\.\d{0,})?" id="input" style="width:290px; margin:0px -20px 0px -20px" value="<?php echo $arr1['4'];?>"/></td>
    <td><input type='submit' id='simpan' value='Edit' class="btn2"/></td>
  </tr>
</table>
</form>
<?php
}
?>