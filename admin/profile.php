<?php
session_start();
  require_once '../header.php';
  require_once 'navbar.php';
  require_once '../db.php';
  if (!isset($_SESSION['user_interpage'])) {
    header("location: ../login.php");
  }
  $email = $_SESSION['user_email'];
  $select_users = "SELECT name, email, phone_number FROM users WHERE email='$email'";
  $select_users_query = mysqli_query($db_connect, $select_users);
  $select_assoc = mysqli_fetch_assoc($select_users_query);


 ?>
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card mt-4">
         <div class="card-header bg-dark">
           <h3 class="text-light">Admin
             <a href="profile_edit.php" class="btn btn-warning">Edit</a>
           </h3>
         </div>
         <div class="card-body">
            <p class="font-weight-bold">Nmae : <?= $select_assoc['name']?></p>
            <p class="font-weight-bold">Email : <?= $select_assoc['email']?></p>
            <p class="font-weight-bold">Phone Number : <?= $select_assoc['phone_number']?></p>

         </div>
       </div>
     </div>
   </div>
 </div>


<?php
  require_once '../footer.php';
 ?>
