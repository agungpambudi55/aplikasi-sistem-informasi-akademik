<?php
session_start();
unset($_SESSION['pengguna']);
echo "<script>window.setTimeout('window.location=\"index.aspx\"; ',1000);</script>";
?>