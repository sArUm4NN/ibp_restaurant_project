<?php
$Page="logout";
include ("inc/head.php");
session_start();

// Tüm oturum değişkenlerini temizle
$_SESSION = array();

// Oturumu sonlandır
session_destroy();

// Kullanıcıyı çıkış sayfasına yönlendir
header("Location: login.php");
exit();