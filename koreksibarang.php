<!DOCTYPE html>
<html lang="en">
<head>
  <title>Koreksi Rekord Barang Baru</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php $koneksi=new mysqli("localhost","root","","tokolaptoptrend");
if (isset($_GET['kodebarang'])) {
 $kodebarangdicari=$_GET['kodebarang'];
 $sql="SELECT * FROM `barang` WHERE `kodebarang` = '".$kodebarangdicari."'";
 $q=$koneksi->query($sql);
 $r=$q->fetch_array();
 if (empty($r)) {
	 echo "<h2>Rekord yang dicari tidak ditemukan !</h2>";
	 exit();
 }
} 
?>
<div class="container">
  <h2>Koreksi Rekord Barang Baru</h2>
  <form method="post">
    <div class="form-group">
      <label for="kodebarang">Kode Barang:</label>
      <input type="text" class="form-control" id="kodebarang" placeholder="Ketik Kode Barang" name="kodebarang" value="<?php echo $r['kodebarang'];?>" readonly>
    </div>
	<div class="form-group">
      <label for="namabarang">Nama Barang:</label>
      <input type="text" class="form-control" id="namabarang" placeholder="Ketik Nama Barang" name="namabarang" value="<?php echo $r['namabarang'];?>">
    </div>
	<div class="form-group">
      <label for="jumlah">Jumlah Stok Barang:</label>
      <input type="number" class="form-control" id="jumlah" placeholder="Ketik Jumlah Barang" name="jumlah" value="<?php echo $r['jumlah'];?>">
    </div>
	<div class="form-group">
      <label for="satuan">Satuan Barang:</label>
      <input type="text" class="form-control" id="satuan" placeholder="Ketik Satuan Barang" name="satuan" value="<?php echo $r['satuan'];?>">
    </div>
	<div class="form-group">
      <label for="hargasatuan">Harga Satuan Barang:</label>
      <input type="number" class="form-control" id="hargasatuan" placeholder="Ketik Harga Satuan Barang" name="hargasatuan" value="<?php echo $r['hargasatuan'];?>">
    </div>
    <button type="submit" class="btn btn-primary" name="bsimpan">Submit</button>
  </form>
</div>
</body>
</html>
<?php
 if (isset($_POST['bsimpan']))	{
	$kodebarang=$_POST['kodebarang'];
	$namabarang=$_POST['namabarang'];
	$jumlah=$_POST['jumlah'];
	$satuan=$_POST['satuan'];
	$hargasatuan=$_POST['hargasatuan'];
	
	 
	$sql="Update `barang` set `namabarang`='".$namabarang."', `jumlah`='".$jumlah."', `satuan`='".$satuan."', `hargasatuan`='".$hargasatuan."' where kodebarang='".$kodebarang."';"; 
	$q=$koneksi->query($sql);
	if ($q) {
	  echo "Rekord barang sudah tersimpan !";
    } else {
	  echo "Rekord barang gagal tersimpan !";
	}
	echo "
	<script>window.location.href='caribarang.php';</script>";
 }
 
?>
