<?php

session_start();
$_SESSION = array();
session_destroy();
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
echo "<script type='text/javascript'>alert('ขอบคุณที่ใช้บริการ');window.location='index.html';</script>";
//header("location:index.php");
?>