<?php
include 'db.php'; // yeh aapka connection file hai

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username =  $_POST['username'];
    $email    =  $_POST['email'];
    $password = $_POST['pswrd'];

    // Validation
    if (empty($username) || empty($email) || empty($password)) {
        $msg = "<div class='alert alert-danger'>All fields are required.</div>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "<div class='alert alert-danger'>Invalid email format.</div>";
    } elseif (strlen($password) < 6) {
        $msg = "<div class='alert alert-danger'>Password must be at least 6 characters.</div>";
    } else {
        // Check if email already exists
        $check = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) > 0) {
            $msg = "<div class='alert alert-danger'>Email already exists.</div>";
        } else {
            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user
            $query = "INSERT INTO users (username, email, password, role, is_active) 
                      VALUES ('$username', '$email', '$hashedPassword', 'user', 1)";

            if (mysqli_query($conn, $query)) {
                $msg = "<div class='alert alert-success'>Registration successful! <a href='login.php'>Login Now</a></div>";
            } else {
                $msg = "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
            backdrop-filter: blur(10px);
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

        .form-text a {
            color: #ff9800;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .form-text a:hover {
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

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-11 col-sm-8 col-md-6 col-lg-4">
                <div class="card p-4">
                    <h3 class="text-center mb-4">✨ Register</h3>

                    <!-- Show PHP messages here -->
                    <?php if (!empty($msg)) echo $msg; ?>

                    <form action="" method="POST">
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                        </div>

                        <!-- Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Choose Username" required>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="pswrd" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="pswrd" name="pswrd" placeholder="Enter Password" required>
                        </div>

                        <!-- Terms -->
                        <p class="form-text text-light">
                            By creating an account, you agree to our <a href="#">Terms & Privacy</a>.
                        </p>

                        <!-- Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-custom">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>