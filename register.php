<?php
session_start();
  require_once 'header.php';
 ?>

 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card">
         <div class="card-header bg-dark">
           <h2 class="text-center text-light">REGISTER FORM</h2>
         </div>
         <div class="card-body">
           <form method="post" action="register_post.php">
             <div class="form-group">
               <label>Name</label>
               <input type="text" class="form-control" name="name">
             </div>

             <div class="form-group">
               <label>Email</label>
               <input type="text" class="form-control" name="email">
             </div>
                <?php if (isset($_SESSION['email_error_msg'])): ?>
             <span class="text-danger">
             <?php
                  echo $_SESSION['email_error_msg'];
                  unset($_SESSION['email_error_msg']);
              ?>
            </span>
                <?php endif; ?>

             <div class="form-group">
               <label>Phone Number</label>
               <input type="text" class="form-control" name="phone_number">
             </div>

             <div class="form-group">
               <label>Password</label>
               <input type="password" class="form-control" name="password">
             </div>
             <?php if (isset($_SESSION['password_error'])): ?>
              <span class="text-danger">
              <?php
                   echo $_SESSION['password_error'];
                   unset($_SESSION['password_error']);
               ?>
             </span>
             <?php endif; ?>

             <div class="form-group">
               <label>Confirm Password</label>
               <input type="password" class="form-control" name="confirm_password">
             </div>
             <?php if (isset($_SESSION['confirm_password_error'])): ?>
              <span class="text-danger">
              <?php
                   echo $_SESSION['confirm_password_error'];
                   unset($_SESSION['confirm_password_error']);
               ?>
             </span>
             <?php endif; ?>

              <br>
             <button type="submit" class="btn btn-primary">Submit</button>
             <a href="login.php" class="btn btn-info">Login</a>
            </form>
         </div>
        </div>
        <?php if (isset($_SESSION['success_msg'])): ?>


        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php
              echo $_SESSION['success_msg'];
              unset($_SESSION['success_msg']);
             ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php endif; ?>

     </div>
   </div>
 </div>

 <?php
 require_once 'footer.php';
  ?>
