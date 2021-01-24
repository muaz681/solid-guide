<?php
session_start();
  require_once 'db.php';

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone_number = $_POST['phone_number'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  $sanitize_email = filter_var($email, FILTER_SANITIZE_EMAIL);

  $if_password_capital = preg_match("@[A-Z]@", $password);
  $if_password_small = preg_match("@[a-z]@", $password);
  $if_password_char = preg_match("@[0-9]@", $password);
  // print_r();

  if (!filter_var($sanitize_email, FILTER_VALIDATE_EMAIL)) {

      $_SESSION['email_error_msg'] = "Invalid email";
      header("location: register.php");
  }
  else {
      if ($if_password_capital == 1 && $if_password_small == 1 && $if_password_char == 1 && strlen($password) >= 8) {

          if ($password == $confirm_password) {
            $encrepted_password =  md5($password);

            $select_query = "SELECT COUNT(*) AS total_count FROM users WHERE email='$sanitize_email'";
            $select_mysqli_query = mysqli_query($db_connect, $select_query);
            $after_assoc = mysqli_fetch_assoc($select_mysqli_query);
            if ($after_assoc['total_count'] == 0) {
              $insert_query = "INSERT INTO users (name, email, phone_number, password) VALUES ('$name', '$email', '$phone_number', '$encrepted_password')";
              mysqli_query($db_connect, $insert_query);
              $_SESSION['success_msg'] = "Your register Successfully";
              header("location: register.php");
            }
            else {
              $_SESSION['email_error_msg'] = "email already exist";
              header("location: register.php");
            }


          }
          else {
            $_SESSION['confirm_password_error'] = "Confirm Password is wrong";
            header("location: register.php");
          }


      }
      else {
        $_SESSION['password_error'] = "Please type one capital letter one small letter one character and must be eight digits";
        header("location: register.php");
      }


  }






 ?>
