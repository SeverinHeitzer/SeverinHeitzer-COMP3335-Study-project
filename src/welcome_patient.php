<?php
session_start();

// Ensure the user is logged in and has the correct role
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['role'] !== 'patient') {
    header("Location: unauthorized.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Dashboard - MedTestLab</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .welcome-container {
            margin-top: 50px;
        }
        .welcome-message {
            margin-bottom: 30px;
            text-align: center;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logout-link {
            margin-top: 20px;
            text-align: center;
        }
        .logout-link a {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container welcome-container">
        <div class="welcome-message">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['userName']); ?></h1>
            <p>MedTestLab Patient Page</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <form action="views_patient.php" method="post">

                        <div class="form-group">
                            <label for="task">Task:</label>
                            <select id="task" name="task" class="form-control" required>
                                <option value="view_orders" selected>View My Orders</option>
                                <option value="view_results">View My Results</option>
                                <option value="view_bills">View My Bills</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Execute</button>
                    </form>
                </div>
                <div class="logout-link">
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies (optional for future enhancements) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>