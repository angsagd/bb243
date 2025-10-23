<?php
// autoload / load Class otomatis
spl_autoload_register(function($className) {
    require_once 'class/' . $className . '.php';
});

// membuat object
$mhs = new Mahasiswa("Budi");

// mengisi property/atribut
$mhs->nim = "190030091";

// ini nanti akan mengambil dari database
$mhs->username = "budi123";
$mhs->password = "rahasia456";

// memanggil method
// $mhs->sayHello();

// data username dan password yg diinput saat login
$username = "budi123";
$password = "rahasia456";

// proses login
$mhs->authenticate($username, $password);
