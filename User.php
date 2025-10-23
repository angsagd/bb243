<?php
class User {
  public $username;
  public $password;

  public function authenticate($username, $password) {
    if ($username==$this->username 
     && $password==$this->password) {
      echo "Login Berhasil\n";
    } else {
      echo "Login Gagal\n";
    }
  }
}
 