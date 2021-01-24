<?php
  session_start();
  require_once 'db.php';

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $select_user = "SELECT COUNT(*) AS user_count FROM users WHERE email='$email' AND password='$password'";
  $select_user_query = mysqli_query($db_connect, $select_user);
  $select_assoc = mysqli_fetch_assoc($select_user_query);

  if ($select_assoc['user_count'] == 1) {
    $_SESSION['user_interpage'] = "yes";
    $_SESSION['user_email'] = $email;
    header("location: admin/dashboard.php");
  }else {
    $_SESSION['error_msg'] = "Please try again";
    header("location: login.php");
  }
 ?>
