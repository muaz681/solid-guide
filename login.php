<?php
session_start();
  require_once 'header.php';
  if (isset($_SESSION['user_interpage'])) {
    header("location: admin/dashboard.php");
  }
 ?>

 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card">
         <div class="card-header bg-dark">
           <h2 class="text-center text-light">REGISTER FORM</h2>
         </div>
         <div class="card-body">
           <form method="post" action="login_post.php">

             <div class="form-group">
               <label>Email</label>
               <input type="text" class="form-control" name="email">
             </div>

             <div class="form-group">
               <label>Password</label>
               <input type="password" class="form-control" name="password">
             </div>

             <button type="submit" class="btn btn-primary">Login</button>
            </form>
         </div>
        </div>
        <?php if (isset($_SESSION['error_msg'])): ?>


        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php
              echo $_SESSION['error_msg'];
              unset($_SESSION['error_msg']);
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
