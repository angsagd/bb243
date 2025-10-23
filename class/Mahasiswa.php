<?php
class Mahasiswa extends User {
  public $nama;
  public $nim;

  public function __construct($nama) {
    $this->nama = $nama;
    echo "Object Mahasiswa telah dibuat\n";
  }

  public function __destruct() {
    echo "Object Mahasiswa telah dihapus\n";
  }

  public function sayHello() {
    echo "Halo, nama saya $this->nama dengan NIM $this->nim\n";
  }


}