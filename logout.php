<?php
session_start();
	require_once("config/koneksi.php");
session_unset();
if (isset($_GET['action']) && $_GET['action'] == "logout") {
    session_destroy();
    header('location: loginus.php');
    exit;
}
?>