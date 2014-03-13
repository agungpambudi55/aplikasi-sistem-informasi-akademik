<?php
session_start();
require "config/koneksi.php";
require "config/fungsi.php";
require "config/ceklogin.php";
if(isset($_SESSION['namapengguna']) OR isset($_COOKIE['namapengguna']))
{header("location: page/index.aspx");}
else
{header("location: page/login.aspx");}
?>