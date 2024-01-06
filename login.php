<?php

include 'config.php';
session_start();

if(isset($_POST['submit']))
{

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);
   $logged_in = false;
   
   $select_users = mysqli_query($conn, "SELECT * FROM `user` WHERE username = '$username' LIMIT 1");

   if(mysqli_num_rows($select_users) > 0)
   {

      $row = mysqli_fetch_assoc($select_users);

      if(password_verify($pass, $row['password']))
      {
         $logged_in = true;
         $_SESSION['username'] = $row['username'];
         $_SESSION['role'] = $row['role'];

         if($row['role'] == 1) // ADMIN
         {
            header("Location: admin.php");
         }
         elseif($row['role'] == 2) // COORDINATOR
         {
            header("Location: eventcoordinator.php");
         }
         elseif($row['role'] == 3) // TECH COMMITTEE CHAIR
         {
            header("Location: tech_page.php");
         }
      }
   }
   if( ! $logged_in)
   {
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
       <!-- <select id="userType">
        <option value="admin">Admin</option>
        <option value="user">Event Coordinator</option>
        <option value="admin">Tech Committee Chair</option>
      </select> -->
      <br>
      <input type="submit" name="submit" value="login" class="btn">
    </br>
    </form>
 </div>
</body>
</html>