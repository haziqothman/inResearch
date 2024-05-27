<?php
session_start();
require_once "database.php";

// Check if user ID is set in session
if (!isset($_SESSION["id"])) {
    echo "User ID is not set in the session.";
    exit();
}

// Get the user ID from the session
$user_id = $_SESSION["id"];

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

// Check if the form is submitted for updating user information
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $matric = $_POST["matric"];
    $address = $_POST["address"];
    // Update user information in the database
    $sql = "UPDATE users SET name=?, email=?, phone=?, matric=?, address=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }
    $stmt->bind_param("sssssi", $name, $email, $phone, $matric, $address, $user_id);
    $stmt->execute();
    $stmt->execute();
    if ($stmt->error) {
        echo "Error executing SQL query: " . $stmt->error;
        exit();
    }
    // Redirect to the profile page after updating
    header("Location: profile.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 style="margin-top:50px;">Edit Profile</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" maxlength="20">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Matric ID:</label>
                <input type="text" class="form-control" id="matric" name="matric" value="<?php echo htmlspecialchars($user['matric']); ?>">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="update">Save</button>
            <button type="cancel" class="btn btn-secondary" name="update">Cancel</button>
        </form>
    </div>

    <script>
      function toggleDropdown() {
        document.getElementById("profileDropdown").classList.toggle("show");
      }

      // Close the dropdown if the user clicks outside of it
      window.onclick = function(event) {
        if (!event.target.matches('.profile-icon')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
          }
        }
      }
    </script>
</body>
</html>