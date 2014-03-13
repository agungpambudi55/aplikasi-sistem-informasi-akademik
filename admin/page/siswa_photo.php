<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
$id=$_GET['id'];
?>
<script src="../js/webcam.js"></script>
<script src="../js/photo_siswa.js"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<script type="text/javascript" >
$(document).ready(function() { 
            $('#photoimg').live('change', function()			{ 
			$("#preview").html('');
			$("#imageform").ajaxForm({
						target: '#preview'
			}).submit();		
			});
});
function unggah(id)
{
	
	$("#form *").prop("disabled","disabled");
	$("#kembali*").removeAttr("disabled");
		$.ajax({
			url: "siswa_unggah.php?id="+id,
			success: function(result,status){				
				response = result.split("|");
				if(response[0] != "1")
				{
					$('.notif').remove();
					$("#simpan").focus();
					$("#form *").removeAttr("disabled");
					$("#form").before(response[1]);
				}
				else
				{$('#loader').show(0);$("#simpan").hide(0);$('#loader').delay(500).hide(0);$("#form").before(response[1]);}
			}
		});
} 
</script>
<div id='preview' style="display:none">
</div>

			<div id="kamera">
			<div id="l_k"></div>
			<div id="camera">
			  <div id="kamera_judul">Kamera<div id="t_kamera" onClick="$('#camera').hide(0);$('#kamera').fadeOut(1000);"></div></div>
				<div id="screen"></div>
				<div id="buttons">
				  <div class="buttonPane">
						<p id="shootButton" class="btn2" style="float:left;margin-left:25px; width:50px;">Photo</p>
				  </div>
					<div class="buttonPane" style="display:none">
					  <p id="cancelButton" class="btn2" style="float:left;margin-left:25px;width:50px;">Hapus</p> 
					  <p id="uploadButton" class="btn2" style="float:left;margin-left:75px;width:50px;" onclick="hapus_photo();pages('siswa_photo.php?id=<?php echo $id?>&aksi=<?php echo $aksi?>');">Ambil</p>
					</div>
				  <p id="settings" class="btn2"  style="float:right; margin-right:25px;width:50px;">Atur</p>
				</div>    
			</div>
			</div>
			
			<div id="head2">
			<input type="text" name="cari" id="cari" value="" placeholder="Pencarian siswa, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('siswa.php',$('#cari').val())"></div>
			</div>
			<div id="tit_page">Siswa</div>
                <div id="progres">
                <div id="progres_data_b" onClick="pg('siswa_edit.php?id=<?php echo $id;?>')" style="cursor:pointer">Identitas</div><div id="progres_panah_d"></div>
                <div id="progres_data" onclick="pg('siswa_asal_edit.php?id=<?php echo $id;?>');" style="cursor:pointer">Asal</div><div id="progres_panah_d"></div>
                <div id="progres_data" onclick="pg('siswa_wali_edit.php?id=<?php echo $id;?>');" style="cursor:pointer">Wali</div><div id="progres_panah_d"></div>
				<div id="progres_data" style="padding:8px 22px 0px 3px;" onclick="pg('siswa_jurusan_edit.php?id=<?php echo $id;?>');" style="cursor:pointer">Jurusan</div><div id="progres_panah_d"></div>
                <div id="progres_data_e">Photo</div><div id="progres_panah_c"></div>
                </div>
			<table id="form">
			  <tr>
				<td style="width:165px">Photo</td>
				<td>
                <form id="imageform" method="post" enctype="multipart/form-data" action='guru_upload_photo.php'>
                <input type="file" name="photoimg" id="photoimg" style="display:none"/>
                </form>

				<input type="button" value="Ambil" style="width:64px" class="btn2" onclick="$('#photoimg').click();hapus_photo();$('#photo_upload').fadeOut(300);">
				<input type="button" value="Kamera" class="btn2" onclick="$('#l_k').show(0);$('#kamera').fadeIn(1000);$('#l_k').delay(1200).hide(0);$('#camera').delay(1500).fadeIn(0);">
				</td>
			  </tr>
			  <tr>
			  <td></td>
			  <td>
				<p style=" font-size:25px; color:#CB150C; margin:-4px 0px 0px 0px; width:10px; position:absolute">*</p>&nbsp;&nbsp;&nbsp;Sertakan Photo Siswa</td>
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
				  <input type='submit' id='simpan' value='Unggah' class="btn2"  onclick="unggah(<?php echo $id;?>);" style="width:65px;"/> 
				  <input type='button' value='Selesai' class="btn2" onclick="hapus_photo();pages('siswa.php');" id="kembali" style=" margin-top:20px; "/>     
				</td>
			  </tr>
			</table>