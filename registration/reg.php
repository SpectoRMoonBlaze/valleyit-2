<?php
require "libs/database.php";
  $data = $_POST;
  if( isset($data['login']) )
  {


    $errors = array();
    if( trim($data['login']) == '')
    {
      $errors[] = 'write you login';
     }
    
    if( trim($data['email']) == '')
    {
      $errors[] = 'write you email';
     }
    
    if( trim($data['password']) == '')
    {
      $errors[] = 'write you password';
     }
    
      if( R::count('users', "login = ?," array($data['login'])) > 0)
      {
        $errors[] = 'пользователь уже существует'
      }

      if( R::count('users', "email = ?," array($data['email'])) > 0)
      {
        $errors[] = 'почта уже используется'
      }

     if(empty($errors) )
     {

      $user = R::dispense('user');
      $user->login = $data['login']; 
      $user->email = $data['email']; 
      $user->password = password_hash($data['password'], PASSWORD_DEFAULT); 
      R::store($user);
     }else{
      echo '<div style="color:red;"><p align="center"><font>'.array_shift($errors).'</font</p></div>';
     }
  }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َAnimated Login Form</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

<form class="box" action="reg.php" method="POST">
  <h1>Login</h1>
  <input type="text" name="login" placeholder="Username">
  <input type="text" name="email" placeholder="email">
  <input type="password" name="password" placeholder="Password">
   
  <input type="submit" name="login" value="Login">
</form>


  </body>
</html>
