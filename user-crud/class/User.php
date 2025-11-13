<?php

class User {

  // public properties
  public $username;
  public $fullname;
  public $city;
  public $createdAt;

  // protected properties
  protected $id;
  protected $password;
  protected $db;

  // constructor
  public function __construct()
  {
    $this->db = new Database;
  }

  // Authenticate user credentials

  // Get all users
  public function getAll() {
    $sql = "SELECT * FROM users ORDER BY id ASC";
    $stmt = $this->db->query($sql);
    // return $stmt->fetch_all(MYSQLI_ASSOC);

    //* Cara PDO
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Set user properties by ID
  public function setById($id) {
    // $sql = "SELECT * FROM users WHERE id = $id LIMIT 1";
    $sql = "SELECT * FROM users WHERE id = :id LIMIT 1";
    $stmt = $this->db->query($sql, ['id' => $id]);
    // $user = $stmt->fetch_assoc();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
      $this->id = $user['id'];
      $this->username = $user['username'];
      $this->fullname = $user['fullname'];
      $this->city = $user['city'];
      $this->createdAt = $user['created_at'];
      $this->password = $user['password'];
      return true;
    }
    return false;
  }

  // Get ID
  public function getId() {
    return $this->id;
  }

  // Get password
  public function getPassword() {
    return $this->password;
  }

  // Set password (hashed)
  public function setPassword($password) {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }

  // Save user (insert or update)
  
  // Remove user
  
}