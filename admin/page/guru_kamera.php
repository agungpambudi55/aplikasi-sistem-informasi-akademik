<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/ceklogin.php";
?>
<script src="../js/webcam.js"></script>
<script src="../js/photo_guru.js"></script>
<style type="text/css">
.btn2{
	margin-bottom:10px;
}
</style>
<div id="head2">
<input type="text" name="cari" id="cari" value="" placeholder="Pencarian guru, ketik disini..." autocomplete="off"/><div id="t_cari" onClick="cari('guru.php',$('#cari').val())"></div>
</div>
<div id="tit_page">Guru</div>
<div id="progres">
<div id="progres_data_b">Identitas</div><div id="progres_panah_b"></div>
<div id="progres_data_c">Photo</div><div id="progres_panah_c"></div>
</div>
<div id="camera">
    <div id="buttons">
    	<div class="buttonPane">
        	<p id="shootButton" class="btn2">Ambil</p>
        </div>
        <div class="buttonPane" style="display:none">
        	<p id="cancelButton" class="btn2">Batal</p> <p id="uploadButton" class="btn2">Unggah</p>
        </div>
	    <p id="settings" class="btn2">Atur</p>
	    <p onclick="pages('guru_photo.php');" class="btn2" id="kembali">Kembali</p>
    </div>    
    <div id="screen"></div>
</div>
