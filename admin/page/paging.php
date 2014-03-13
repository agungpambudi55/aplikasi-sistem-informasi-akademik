<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$qry1=que("select * from tb_aksesoris where nama='paging'");
$arr1=fetch($qry1);
if(isset($_GET['nilai']))
{
	$qry2=que("update tb_aksesoris set ket1='$_GET[nilai]' where nama='paging'");
	if($qry2)
	{echo "0|<div class='notif'>Berhasil diperbarui</div>";}
	else
	{echo "0|<div class='notif'>Gagal diperbarui</div>";}
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
			url: "paging.php?"+data,
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
				{}
			}
		});
	});
});
</script><div id="tit_page">Paging</div>

<form id="formtambah" action="#" method="get">
<table id="form">
  <tr>
    <td><input type="text" name='nilai'  required maxlength='2' pattern="\-?\d+(\.\d{0,})?" id="input" style="margin-right:8px" value="<?php echo $arr1['1'];?>"/></td>
    <td><input type='submit' id='simpan' value='Edit' class="btn2"/></td>
  </tr>
</table>
</form>
<?php
}
?>