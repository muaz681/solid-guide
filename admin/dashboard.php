<?php
session_start();
  require_once '../header.php';
  require_once 'navbar.php';
  require_once '../db.php';
  if (!isset($_SESSION['user_interpage'])) {
    header("location: ../login.php");
  }

  $select_users = "SELECT id, name, email, phone_number FROM users";
  $select_users_query = mysqli_query($db_connect, $select_users);

 ?>
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card mt-4">
         <div class="card-header bg-dark">
           <h3 class="text-center text-light">Admin List</h3>
         </div>
         <div class="card-body">
           <table class="table">
             <thead class="thead-dark">
               <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Phone Number</th>
               </tr>
             </thead>
             <tbody>

               <?php foreach ($select_users_query as $user_value): ?>
               <tr>
                 <th><?= $user_value['id']?></th>
                 <td><?= $user_value['name']?></td>
                 <td><?= $user_value['email']?></td>
                 <td><?= $user_value['phone_number']?></td>
               </tr>
              <?php endforeach; ?>

             </tbody>
            </table>

         </div>
       </div>
     </div>
   </div>
 </div>


<?php
  require_once '../footer.php';
 ?>
