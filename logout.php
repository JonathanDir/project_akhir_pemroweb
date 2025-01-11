<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logout Berhasil</title>
  <link rel="stylesheet" href="/style/css/style.css"> <!-- Link ke file CSS jika ada -->
  <style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }

  .logout-message {
    background: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
  }

  .logout-message h1 {
    color: #333;
  }

  .logout-message p {
    color: #666;
  }

  .logout-message a {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
  }

  .logout-message a:hover {
    background: #0056b3;
  }
  </style>
</head>

<body>
  <div class="logout-message">
    <h1>Logout Berhasil</h1>
    <p>Anda telah berhasil keluar dari akun Anda.</p>
    <a href="login.php">Kembali ke Halaman Login</a>
  </div>
</body>

</html>