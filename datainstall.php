<?php
 $koneksi=new mysqli("localhost","root","");
 $sql="create database tokolaptoptrend";
 $q=$koneksi->query($sql);
 if ($q) {
 	 echo "database sudah dibuat !";
 }  else{
	 echo "database gagal dibuat !";
 }
 $sql2="CREATE TABLE tokolaptoptrend.`barang` (
  `kodebarang` varchar(30) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `jumlah` double(7,2) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `hargasatuan` double(9,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$q2=$koneksi->query($sql2);
 if ($q2) {
 	 echo "Tabel Barang sudah dibuat !";
 }  else{
	 echo "Tabel Barang gagal dibuat !";
 }