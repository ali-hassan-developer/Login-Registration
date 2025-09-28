<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
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
    }

    .dashboard-card {
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(15px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.3);
      color: #fff;
      animation: fadeInUp 1s ease;
      max-width: 450px;
      width: 100%;
    }

    .dashboard-card h3 {
      font-weight: 700;
      color: #fff;
    }

    .dashboard-card p {
      font-size: 16px;
      margin-bottom: 8px;
    }

    .btn-custom {
      background: linear-gradient(135deg, #e77918, #ff9800);
      border: none;
      color: #fff;
      font-weight: 600;
      border-radius: 30px;
      padding: 10px 20px;
      transition: all 0.3s ease;
    }

    .btn-custom:hover {
      transform: translateY(-3px) scale(1.05);
      background: linear-gradient(135deg, #cf670e, #e77918);
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

<div class="container justify-content-center align-items-center d-flex">
  <div class="dashboard-card card p-4 text-center">
    <h3 class="mb-3">🎉 Welcome, <?php echo $_SESSION['username']; ?>!</h3>
    <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
    <p><strong>Role:</strong> <?php echo ucfirst($_SESSION['role']); ?></p>
    <a href="logout.php" class="btn btn-custom mt-3">Logout</a>
  </div>
</div>

</body>
</html>
