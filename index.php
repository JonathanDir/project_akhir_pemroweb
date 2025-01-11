<?php
include "koneksi.php"; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Intel Technology</title>
  <link rel="icon" href="gambar/logoIntel.png" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./style/css/style.css"> <!-- Link ke file CSS eksternal -->
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="." style="color: blue; font-size: 24px;"><b>Intel</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link text-dark" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#article">Article</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#gallery">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Homepage -->
  <section id="hero" class="carousel slide" data-ride="carousel" data-interval="1300">
    <div class="carousel-inner">
      <!-- Gambar 1 -->
      <div class="carousel-item active">
        <img src="https://intelcorp.scene7.com/is/image/intelcorp/deep-link-key-art:1648-927" class="d-block w-100"
          alt="...">
      </div>
      <!-- Gambar 2 -->
      <div class="carousel-item">
        <img
          src="https://www.intel.co.id/content/dam/www/central-libraries/us/en/images/intel-museum-11.jpg.rendition.intel.web.1648.927.jpg"
          class="d-block w-100" alt="...">
      </div>
      <!-- Gambar 3 -->
      <div class="carousel-item">
        <img
          src="https://intelcorp.scene7.com/is/image/intelcorp/intel-arc-photography-office-019:1920-1080?wid=1648&hei=927"
          class="d-block w-100" alt="...">
      </div>
    </div>

    <a class="carousel-control-prev" href="#hero" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#hero" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </section><br><br><br>

  <!-- Article Section -->
  <section id="article" class="section py-5">
    <div class="container">
      <h2 class="text-center display-4">Article</h2><br><br>

      <?php
    // Items per page
    $items_per_page = 3;
    
    // Get current page
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($current_page - 1) * $items_per_page;
    
    // Get total items
    $total_query = "SELECT COUNT(*) as total FROM article";
    $total_result = $conn->query($total_query);
    $total_rows = $total_result->fetch_assoc()['total'];
    $total_pages = ceil($total_rows / $items_per_page);
    
    // Get articles for current page
    $sql = "SELECT * FROM article ORDER BY tanggal DESC LIMIT $offset, $items_per_page";
    $hasil = $conn->query($sql);
    ?>

      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php while($row = $hasil->fetch_assoc()){ ?>
        <div class="col mb-4">
          <div class="card h-100">
            <img src="gambar/<?= htmlspecialchars($row["gambar"]) ?>" class="card-img-top" alt="Article Image" />
            <div class="card-body">
              <h5 class="card-title"><b><?= htmlspecialchars($row["judul"]) ?></b></h5>
              <p class="card-text"><?= htmlspecialchars($row["isi"]) ?></p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary"><?= htmlspecialchars($row["tanggal"]) ?></small><br>
              <p><a>Posted by <?= htmlspecialchars($row["username"]) ?></p></a>

            </div>
          </div>
        </div>
        <?php } ?>
      </div>

      <!-- Pagination -->
      <?php if($total_pages > 1): ?>
      <nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center">
          <!-- Previous button -->
          <li class="page-item <?= ($current_page <= 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $current_page - 1 ?>#article"
              <?= ($current_page <= 1) ? 'tabindex="-1" aria-disabled="true"' : '' ?>>Previous</a>
          </li>

          <!-- Page numbers -->
          <?php for($i =  1; $i <= $total_pages; $i++): ?>
          <li class="page-item <?= ($current_page == $i) ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $i ?>#article"><?= $i ?></a>
          </li>
          <?php endfor; ?>

          <!-- Next button -->
          <li class="page-item <?= ($current_page >= $total_pages) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $current_page + 1 ?>#article"
              <?= ($current_page >= $total_pages) ? 'tabindex="-1" aria-disabled="true"' : '' ?>>Next</a>
          </li>
        </ul>
      </nav>
      <?php endif; ?>
    </div>
  </section>


  <!-- gallery -->
  <section id="gallery" class="section py-5">
    <div class="container">
      <h2 class="text-center display-4">Gallery</h2><br><br>

      <?php
    // Items per page
    $items_per_page = 3;
    
    // Get current page
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($current_page - 1) * $items_per_page;
    
    // Get total items
    $total_query = "SELECT COUNT(*) as total FROM article";
    $total_result = $conn->query($total_query);
    $total_rows = $total_result->fetch_assoc()['total'];
    $total_pages = ceil($total_rows / $items_per_page);
    
    // Get articles for current page
    $sql = "SELECT * FROM gallery ORDER BY tanggal DESC LIMIT $offset, $items_per_page";
    $hasil = $conn->query($sql);
    ?>

      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php while($row = $hasil->fetch_assoc()){ ?>
        <div class="col mb-4">
          <div class="card h-100">
            <img src="gambar/<?= htmlspecialchars($row["gambar"]) ?>" class="card-img-top" alt="Article Image" />
            <div class="card-body">
              <h5 class="card-title"><b><?= htmlspecialchars($row["judul"]) ?></b></h5>
              <p class="card-text"><?= htmlspecialchars($row["deskripsi"]) ?></p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary"><?= htmlspecialchars($row["tanggal"]) ?></small><br>
              <p><a>Posted by <?= htmlspecialchars($row["username"]) ?></p></a>

            </div>
          </div>
        </div>
        <?php } ?>
      </div>

      <!-- Pagination -->
      <?php if($total_pages > 3): ?>
      <nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center">
          <!-- Previous button -->
          <li class="page-item <?= ($current_page <= 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $current_page - 1 ?>#article"
              <?= ($current_page <= 1) ? 'tabindex="-1" aria-disabled="true"' : '' ?>>Previous</a>
          </li>

          <!-- Page numbers -->
          <?php for($i =  1; $i <= $total_pages; $i++): ?>
          <li class="page-item <?= ($current_page == $i) ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $i ?>#article"><?= $i ?></a>
          </li>
          <?php endfor; ?>

          <!-- Next button -->
          <li class="page-item <?= ($current_page >= $total_pages) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $current_page + 1 ?>#article"
              <?= ($current_page >= $total_pages) ? 'tabindex="-1" aria-disabled="true"' : '' ?>>Next</a>
          </li>
        </ul>
      </nav>
      <?php endif; ?>
    </div>
  </section>
  <!-- gallery end -->


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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>