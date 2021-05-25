<?php
session_start();
include_once '../action/Database/Donasi.php';

$donasi = new Donasi();

$dataDonatur = $donasi->getDonaturDaftar();
$donatur = $donasi->getDonaturDaftar();

echo $donatur['email_donatur'];
echo $dataDonatur['nama_donatur'];