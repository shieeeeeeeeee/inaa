<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username', password = '$pass' AND role = '$role'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['role'] == 'admin'){

         $_SESSION['admin_username'] = $row['username'];
         $_SESSION['admin_password'] = $row['password'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin.php');

      }elseif($row['role'] == 'eventcoordinator'){

         $_SESSION['eventcoor_username'] = $row['username'];
         $_SESSION['eventcoor_password'] = $row['password'];
         $_SESSION['eventcoor_id'] = $row['id'];
         header('location:eventcoordinator.php');

      }elseif($row['role'] == 'tech committe chair'){

         $_SESSION['tech_username'] = $row['username'];
         $_SESSION['tech_password'] = $row['password'];
         $_SESSION['tech_id'] = $row['id'];
         header('location:tech_page.php');

   }else{
      $message[] = 'incorrect username or password!';
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>
   <link rel="stylesheet" href="mystyle.css">
</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<div class="form-container">

    <form action="" method="post">
       <h3>Login</h3>
       <input type="text" name="username" placeholder="Username" required class="box">
       <input type="password" name="password" placeholder="Password" required class="box">
       <select id="userType">
        <option value="admin">Admin</option>
        <option value="user">Event Coordinator</option>
        <option value="admin">Tech Committee Chair</option>
      </select>
      <br>
      <input type="submit" name="submit" value="login" class="btn">
    </br>
    </form>
 </div>
</body>
</html>
