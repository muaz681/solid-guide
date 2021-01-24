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
           <h3 class="text-warning">Admin Edit
           </h3>
         </div>
         <div class="card-body">
           <form method="post" action="profile_edit_post.php">
             <div class="form-group">
               <label>Name</label>
               <input type="hidden" class="form-control" value="<?= $select_assoc['email']?>" name="user_email">
               <input type="text" class="form-control" value="<?= $select_assoc['name']?>" name="user_name">
             </div>
             <div class="form-group">
               <label>Phone Number</label>
               <input type="text" class="form-control" value="<?= $select_assoc['phone_number']?>" name="phone_number">
             </div>
             <button type="submit" class="btn btn-success">Save</button>
            </form>

         </div>
       </div>
     </div>
   </div>
 </div>


<?php
  require_once '../footer.php';
 ?>
