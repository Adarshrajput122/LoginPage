<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
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
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-bottom: 15px;
      transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
      border-color: #66afe9;
      outline: none;
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
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #45a049;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 10px;
      color: #333;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.3s ease;
    }

    a:hover {
      color: #4CAF50;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Registration</h2>
    <form action="" method="post" autocomplete="off">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" required value="">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" required value="">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required value="">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required value="">
      <label for="confirmpassword">Confirm Password:</label>
      <input type="password" name="confirmpassword" id="confirmpassword" required value="">
      <button type="submit" name="submit">Register</button>
    </form>
    <a href="login.php">Login</a>
  </div>
</body>
</html>
