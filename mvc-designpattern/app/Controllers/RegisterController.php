<?php
 
class RegisterController {
  public function show() {
    View::load('user/register');
  }

  public function store() {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $userModel = new User();
    $userModel->register([
      'email' => $email,
      'password_hash' => $hashedPassword
    ]);

    view::load('user/login');
  }
}
