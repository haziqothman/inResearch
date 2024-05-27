<?php
session_start();
require_once "database.php";

// Get the user ID from the URL
if (!isset($_GET["id"])) {
    echo "User ID is not set in the URL.";
    exit();
}

$user_id = $_GET["id"];

// Fetch user information from database
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo "Error preparing statement: " . $conn->error;
    exit();
}
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "User not found";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .profile-header {
            text-align: center;
            margin: 20px 0;
        }
        .profile-header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #007bff;
        }
        .profile-header h2 {
            margin-top: 10px;
            font-size: 2rem;
        }
        .profile-header p {
            color: #666;
        }
        .profile-info {
            margin-top: 20px;
        }
        .profile-info h3 {
            margin-bottom: 20px;
        }
        .profile-info .info-item {
            margin-bottom: 15px;
        }
        .card {
            margin-top: 20px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .btn-edit {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-header">
            <img src="./public/img/profile.jpeg" alt="Profile Picture">
            <h2>Hi, <?php echo htmlspecialchars($user['name']); ?></h2>
            <p><?php echo htmlspecialchars($user['role']); ?></p>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Profile Information
                </div>
                <div class="card-body">
                    <div class="info-item mb-3">
                        <strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?>
                    </div>
                    <div class="info-item mb-3">
                        <strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?>
                    </div>
                    <div class="info-item mb-3">
                        <strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?>
                    </div>
                    <div class="info-item mb-3">
                        <strong>Matric Number:</strong> <?php echo htmlspecialchars($user['matric']); ?>
                    </div>
                    <div class="info-item mb-3">
                        <strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?>
                    </div>
                    <div class="info-item mb-3">
                        <strong>Role:</strong> <?php echo htmlspecialchars($user['role']); ?>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <a href="viewAllUser.php" type="button" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function redirectToDashboard() {
        // Get the user's role from PHP
        var role = "<?php echo htmlspecialchars($user['role']); ?>";

        // Define the dashboard URLs based on roles
        var dashboardUrls = {
            "CRMP": "crmp.php",
            "Staff": "staff.php",
            "Mentor": "mentor.php",
            "Platinum": "platinum.php",
            // Add more roles and corresponding dashboard URLs as needed
        };

        // Check if the user's role has a corresponding dashboard URL
        if (dashboardUrls.hasOwnProperty(role)) {
            // Redirect the user to the appropriate dashboard URL
            window.location.href = dashboardUrls[role];
        } else {
            // If the role is not recognized, redirect to a default dashboard or handle it as desired
            window.location.href = "default_dashboard.php";
        }
    }
    </script>
</body>
</html>