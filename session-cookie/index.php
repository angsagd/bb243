<?php
session_start();

session_regenerate_id();

$status = 'Masukkan nilai Cookie, tekan tombol "Simpan Cookie"';
$latihan = '';
$expired = time()+(24*60*60);

if($_SERVER['REQUEST_METHOD']==='POST') {
  $nilai = $_POST['nama'];

  if($nilai=='') {
    $expired = 0;
  }

  setcookie('latihan', $nilai, $expired);
  $status = 'Cookie sudah disimpan. <a href="">Refresh</a>';
}

if(isset($_COOKIE['latihan'])) {
  $latihan = $_COOKIE['latihan'];
}

$uts = time();
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Session - Cookie</title>
</head>
<body>
  <header>
    <h1>Session dan Cookie</h1>
  </header>
  <main>
    <h2>Cookie</h2>
    <form method="post">
      <div>
        <label for="input-cookie">Latihan:</label>
        <input type="text" name="nama" id="input-cookie">
        <button type="submit">Simpan Cookie</button>
      </div>
    </form>
    <hr>
    <p><?= $status ?></p>
    <p><?php echo 'Cookie "Latihan": ' . $latihan; ?></p>
    <hr>
    <p>Unix Timestamp:<?= $uts ?></p>
  </main>
  
</body>
</html>