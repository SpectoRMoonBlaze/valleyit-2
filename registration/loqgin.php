
<?php
require "libs/databse.php";

$data = $_POST;
if( isset($data['login']) )
{
  $user = R::findOne('users', 'login = ?', array($data['login']));
  if( $user )
  {

    if(password_verify($data['password'], $user->password))
    {

    }else{
       $errors = 'неверный пароль ';
    }



  }else{
    $errors = 'пользователь не найден';
  }

  if( ! empty($errors))
  {
     echo '<div style="color:red;">'.array_shift($errors).'</div>';
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

<form class="box" action="index.html" method="POST">
  <h1>Login</h1>
  <input type="text" name="login" placeholder="Username">
  <input type="password" name="password" placeholder="Password">
  <input type="submit" name="login" value="Login">
</form>


  </body>
</html>
