<?php
include 'db.php'; // Database connection
session_start();

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname    = mysqli_real_escape_string($conn, $_POST['uname']); // Username OR Email
    $password = mysqli_real_escape_string($conn, $_POST['pswrd']);

    if (empty($uname) || empty($password)) {
        $msg = "<div class='alert alert-danger'>Both fields are required.</div>";
    } else {
        // Check if user exists (by username OR email)
        $query = "SELECT * FROM users WHERE email='$uname' OR username='$uname' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Verify password
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id']   = $row['id'];
                $_SESSION['username']  = $row['username'];
                $_SESSION['email']     = $row['email'];
                $_SESSION['role']      = $row['role'];

                // Redirect to dashboard
                header("Location: dashboard.php");
                exit();
            } else {
                $msg = "<div class='alert alert-danger'>Invalid password.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>No account found with this Username/Email.</div>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #1e1e2d, #e77918);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      overflow: hidden;
    }

    .card {
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(12px);
      box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.3);
      color: #fff;
      animation: fadeInUp 1s ease;
    }

    .card h3 {
      font-weight: 700;
      color: #fff;
    }

    .form-control {
      border-radius: 10px;
      border: 1px solid #ccc;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: #e77918;
      box-shadow: 0px 0px 8px #e77918;
    }

    .btn-custom {
      background: linear-gradient(135deg, #e77918, #ff9800);
      border: none;
      color: #fff;
      font-weight: 600;
      border-radius: 30px;
      padding: 10px;
      transition: all 0.3s ease;
    }

    .btn-custom:hover {
      transform: translateY(-3px) scale(1.03);
      background: linear-gradient(135deg, #cf670e, #e77918);
    }

    .form-check-label {
      font-size: 14px;
    }

    .text-center a {
      color: #ff9800;
      font-weight: 500;
      transition: 0.3s;
    }

    .text-center a:hover {
      color: #fff;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(50px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-11 col-sm-8 col-md-6 col-lg-4">
        <div class="card p-4">
          <h3 class="text-center mb-4">🔒 Login</h3>
           <?php if (!empty($msg)) echo $msg; ?>
          <form action="" method="POST">

            <!-- Username -->
            <div class="mb-3">
              <label for="uname" class="form-label">Username OR Email</label>
              <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Username" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
              <label for="pswrd" class="form-label">Password</label>
              <input type="password" class="form-control" id="pswrd" name="pswrd" placeholder="Enter Password" required>
            </div>

            <!-- Remember me -->
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="remember" name="remember">
              <label class="form-check-label" for="remember">Remember Me</label>
            </div>

            <!-- Submit -->
            <div class="d-grid">
              <button type="submit" class="btn btn-custom">Log in</button>
            </div>
          </form>

          <!-- Register link -->
          <p class="text-center mt-3">
            Don’t have an account? <a href="Registration.php" class="text-decoration-none">Register Here</a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
