<?php
session_start();
include "koneksi.php";

// Redirect if already logged in
if (isset($_SESSION['username'])) {
    header("Location: admin.php");
    exit();
}

// Initialize variables
$usernameError = $passwordError = "";
$username = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    if (empty($_POST["username"])) {
        $usernameError = "Please enter your username";
    } else {
        $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    }

    if (empty($_POST["password"])) {
        $passwordError = "Please enter your password";
    }

    // Process login if no errors
    if (empty($usernameError) && empty($passwordError)) {
        $password = md5($_POST['password']); // Consider using more secure hashing

        $stmt = $conn->prepare("SELECT username FROM user WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['username'] = $username;
            header("Location: admin.php");
            exit();
        } else {
            $loginError = "Invalid username or password";
        }
        
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
  .login {
    min-height: 100vh;
  }

  .login-left {
    padding: 30px;
    display: flex;
    align-items: center;
  }

  .login-right {
    background-color: #f8f9fa;
  }

  .carousel-item img {
    object-fit: cover;
    height: 100vh;
  }

  .header {
    margin-bottom: 40px;
    text-align: center;
    /* Center the header content */
  }

  .header h1 {
    font-weight: bold;
    color: #333;
    font-size: 2.5rem;
    margin-bottom: 1rem;
  }

  .header p {
    color: #666;
    font-size: 1.1rem;
  }

  .form-control:focus {
    box-shadow: none;
    border-color: #0d6efd;
  }

  .btn-primary {
    padding: 10px;
    font-weight: 500;
  }
  </style>
</head>

<body>
  <section class="login d-flex">
    <div class="login-left w-50">
      <div class="row justify-content-center w-100">
        <div class="col-lg-8">
          <div class="header">
            <h1>LOGIN</h1>
            <p class="text-secondary">HI! Please login to continue.</p>
          </div>

          <?php if (isset($loginError)): ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $loginError; ?>
          </div>
          <?php endif; ?>

          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-4">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control <?php echo !empty($usernameError) ? 'is-invalid' : ''; ?>"
                id="username" name="username" value="<?php echo htmlspecialchars($username); ?>"
                placeholder="Enter your username">
              <?php if (!empty($usernameError)): ?>
              <div class="invalid-feedback"><?php echo $usernameError; ?></div>
              <?php endif; ?>
            </div>

            <div class="mb-4">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control <?php echo !empty($passwordError) ? 'is-invalid' : ''; ?>"
                id="password" name="password" placeholder="Enter your password">
              <?php if (!empty($passwordError)): ?>
              <div class="invalid-feedback"><?php echo $passwordError; ?></div>
              <?php endif; ?>
            </div>

            <div class="mb-4">
              <a href="#" class="text-decoration-none">Forgot password?</a>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-4">Sign in</button>

            <div class="text-center">
              <span>Don't have an account? <a href="#" class="text-decoration-none">Sign up</a></span>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="login-right w-50">
      <div id="loginCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./gambar/pict1.avif" class="d-block w-100" alt="Login Image">
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>