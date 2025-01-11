<?php
session_start();

include "koneksi.php";  

//check jika belum ada user yang login arahkan ke halaman login
if (!isset($_SESSION['username'])) { 
	header("location:login.php"); 
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin</title>
  <link rel="icon" href="./gambar/logoIntel.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
  <!-- nav begin -->
  <nav class="navbar navbar-expand-sm bg-body-tertiary sticky-top bg-danger-subtle">
    <div class="container">
      <a class="navbar-brand" href="." style="color: blue; font-size: 24px;"><b>Intel</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
          <li class="nav-item">
            <a class="nav-link" href="admin.php?page=dashboard">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin.php?page=article">Article</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin.php?page=gallery">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin.php?page=user">User</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-danger fw-bold" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <?= $_SESSION['username']?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- nav end -->


  <!-- content begin -->
  <section id="content" class="p-5">
    <div class="container">
      <?php
        if(isset($_GET['page'])){
        ?>
      <h4 class="lead display-6 pb-2 border-bottom border-danger-subtle"><?= ucfirst($_GET['page'])?></h4>
      <?php
            include($_GET['page'].".php");
        }else{
        ?>
      <h4 class="lead display-6 pb-2 border-bottom border-danger-subtle">Dashboard</h4>
      <?php
            include("dashboard.php");
        }
        ?>
    </div>
  </section>
  <!-- content end -->


  <!-- Footer -->
  <footer><br><br><br>
    <div class="container text-center">
      <p>&copy; 2025 Source of <a href="https://www.intel.com/content/www/us/en/homepage.html" class="text-dark"
          target="_blank">Intel</a></p>
      <p>Developed by <a href="https://jonathannsite.blogspot.com/" class="text-dark"
          target="_blank"><b>Jonathan</b></a></p>
      <div class="social-icons">
        <a href="https://www.youtube.com/@JonathanNaufalFarrel" target="_blank"><i class="bi bi-youtube"></i></a>
        <a href="https://github.com/JonathanDir" target="_blank"><i class="bi bi-github"></i></a>
        <a href="https:// www.instagram.com/jonathan_nr2/" target="_blank"><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com/in/jonathannaufalfarrel/" target="_blank"><i class="bi bi-linkedin"></i></a>


      </div><br><br><br>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>