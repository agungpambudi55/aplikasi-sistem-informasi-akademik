<?php
session_start();
if(isset($_SESSION['photo_guru']))
{echo "<img src='../image/sementara/$_SESSION[photo_guru]' id='photo_upload'/>";}
?>
