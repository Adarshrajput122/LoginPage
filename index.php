<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
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
      text-align: center;
    }

    h1 {
      font-size: 28px;
      margin-bottom: 20px;
      color: #333;
      text-transform: uppercase;
    }

    a {
      display: block;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 4px;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    a:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Welcome <?php echo $row["name"]; ?></h1>
    <a href="logout.php">Logout</a>
  </div>
</body>
</html>
