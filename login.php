<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    /* CSS styling for the page layout */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: linear-gradient(135deg, #8AC6D1 0%, #F8B195 100%);
    }

    .container {
      background-color: #fff;
      border-radius: 8px;
      padding: 30px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }

    h2 {
      text-align: center;
    }

    form label {
      display: block;
      font-weight: bold;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 8px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-bottom: 10px;
    }

    button {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 10px;
      color: #333;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    a:hover {
      color: #4CAF50;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <form action="" method="post" autocomplete="off">
      <label for="usernameemail">Username or Email:</label>
      <input type="text" name="usernameemail" id="usernameemail" required value=""> 
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required value=""> 
      <button type="submit" name="submit">Login</button>
    </form>
    <a href="registration.php">Registration</a>
  </div>
</body>
</html>
