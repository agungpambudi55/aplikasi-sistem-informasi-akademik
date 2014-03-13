<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$id=$_GET['id'];
?>
<script src="../js/webcam.js"></script>
<script src="../js/photo_guru.js"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<script type="text/javascript" >
$(document).ready(function() { 
            $('#photoimg').live('change', function()			{ 
			$("#preview").html('');
			$("#imageform").ajaxForm({
						target: '#preview'
			}).submit(function(event){
		event.preventDefault();
		data = $("#imageform").serialize();
		$("#kembali *").removeAttr("disabled");
		$.ajax({
			url: "berita_unggah.php?"+data,
			success: function(result,status){				
				response = result.split("|");
				if(response[0] != "1")
				{
					$('.notif').remove();
					$("#simpan").focus();
					$("#imageform").before(response[1]);
				}
				else
				{$('#loader').show(0);$("#simpan").hide(0);$('#loader').delay(500).hide(0);$("#form").before(response[1]);}
			}
		});
	});		
			});
});


</script>
<div id='preview' style="display:none">
</div>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian berita, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('berita.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Posting Berita</div>
            <form id="imageform" method="post" enctype="multipart/form-data" action='guru_upload_photo.php'>
			<table id="form">
			<tr>
				<td>Judul</td>                        
				<td><input type="text" name="judul" required id="input"/></td>                        
            </tr>
			<tr>
				<td>Isi</td>                        
				<td><textarea name="isi" required="required"></textarea></td>                        
            </tr>
			  <tr>
				<td style="width:165px">Photo</td>
				<td>
                <input type="file" name="photoimg" id="photoimg" style="display:none"/>

				<input type="button" value="Ambil" style="width:64px" class="btn2" onclick="$('#photoimg').click();hapus_photo();$('#photo_upload').fadeOut(300);">
				</td>
			  </tr>
			  <tr>
			  <td></td>
			  <td>
                <div id='preview' style="display:none">
                </div>
                  <div id='photo_load'>
                  <script>auto_photo();</script>
                  </div>
			  </td>
			  </tr>
			  <tr>
				<td></td>
				<td>
            <img src="../style/image/loader.gif" width="130px" height="16px" id="loader" style="position:absolute;display:none;">
				  <input type='submit' id='simpan' value='Terbitkan' class="btn2"  style="width:65px;"/> 
				  <input type='button' value='Selesai' class="btn2" onclick="hapus_photo();pages('berita.php');" id="kembali" style=" margin-top:20px; "/>     
				</td>
			  </tr>
			</table>
                            </form>
