<?php 
class LoginController {
  public function show() {
    View::load('user/login');
  }

  public function authenticate() {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conn=new User();
    $user = $conn->findByEmail($email);
   // var_dump($user);
   // print_r($user);
    if ($user && User::verifyPassword($password, $user['password_hash'])) {
      session_start();
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_email'] = $user['email'];
      header('Location: /login/dash');
    } else {
      //  print_r($user);
       // die("??");
      View::load('user/login', ['error' => 'Invalid credentials']);
    }
  }

  public function dash(){
    view::load('user/dashboard');
  }

  public function logout() {
    session_start();
    session_destroy();
    header('Location: /');
  }

  public function deleteAccount() {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('Location: login/show');
        exit;
    }

    $user = new User();
    $user->deleteUser($_SESSION['user_id']);

    session_destroy();
    header('Location: /' );
    exit;
    }

    public function editAccount() {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('Location: login/show');
        exit;
    }

    $user = new User();
    $userData = $user->getRow($_SESSION['user_id']);
    View::load('user/edit', ['user' => $userData]);
    }

    public function updateAccount() {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('Location: ' . url('login/show'));
        exit;
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = ['email' => $email];
    if (!empty($password)) {
        $data['password_hash'] = password_hash($password, PASSWORD_DEFAULT);
    }

    $user = new User();
    $user->updateUser($_SESSION['user_id'], $data);

    $_SESSION['user_email'] = $email; // update session email

    header('Location: /login/dash');
    exit;
}


}
