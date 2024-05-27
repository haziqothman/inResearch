<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: ./app/addUser/login.php");
}

include 'database.php';

// Fetch user data
$query = 'SELECT * FROM users';
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .table-wrapper {
            background: #fff;
            padding: 20px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            margin-bottom: 15px;
            color: #fff;
            background: #4070f4;
            padding: 15px;
            border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
            margin: 0;
            font-size: 24px;
        }
        .back-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <h2>User <b>Profile Report</b></h2>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>address</th>
                    <th>Matric ID</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td><?php echo htmlspecialchars($row['role']); ?></td>
                        <td><?php echo htmlspecialchars($row['address']); ?></td>
                        <td><?php echo htmlspecialchars($row['matric']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="back-button">
           <button class="btn btn-primary" onclick="window.print()">Print Report</button>
           <button class="btn btn-secondary" onclick="history.back()"><i class="fa fa-arrow-left"></i>Back</button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
