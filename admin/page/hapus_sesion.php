<?php
session_start();
unlink("../image/sementara/$_SESSION[photo_guru]");
unset($_SESSION['photo_guru']);
?>