<?php
  session_start();
  unset($_SESSION['user_interpage']);
  header("location: ../login.php");
 ?>
