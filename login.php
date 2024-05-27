<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<style>
    .form-label {
        font-size: 1.2rem;
        margin-top: 10px;
        color: #333;
    }
    
    select {
        padding: 10px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 100%;
        max-width: 700px;
        color: #666;
    }
    
    select:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        outline: none;
        color: #333;
    }
    
    select option {
        color: #333;
    }
</style>
<body>
    <div class="container">
    <?php
        session_start();
        if (isset($_SESSION["user"])) {
            header("Location: index.php");
         exit();
        }

    if (isset($_POST["login"])) {
         $email = trim($_POST["email"]);
         $password = trim($_POST["password"]);
         $role = trim($_POST["role"]);

    require_once "database.php";
         $sql = "SELECT * FROM users WHERE email = ?";
         $stmt = $conn->prepare($sql);
         $stmt->bind_param("s", $email);
         $stmt->execute();
         $result = $stmt->get_result();
         $user = $result->fetch_assoc();

    if ($user) {
        if ($password === $user["password"] && strtolower($role) === strtolower($user["role"])) { // Ensure role matches
            $_SESSION["user"] = "yes";
            $_SESSION["name"] = $user["name"];
            $_SESSION["role"] = $user["role"]; // Store role in session
            $_SESSION["id"] = $user["id"]; 
            
            // Redirect based on role
            switch (strtolower($user["role"])) {
                case 'staff':
                    header("Location: index.php");
                    break;
                case 'platinum':
                    header("Location: platinum.php");
                    break;
                case 'crmp':
                    header("Location: crmp.php");
                    break;
                case 'mentor':
                    header("Location: mentor.php");
                    break;
                default:
                    header("Location: index.php");
                    break;
            }
            exit();
        } else {
            echo "<div class='alert alert-danger'>Password or role does not match</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Email does not match</div>";
    }
}
    ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <h1 style="text-align: center">Welcome!</h1>
                <label for="email" class="col-form-label">Email</label>
                <input type="email" placeholder="Enter Your Email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password" class="col-form-label">Password</label>
                <input type="password" placeholder="Enter Your Password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="" disabled selected>Select Your Role</option>
                    <option value="crmp">CRMP</option>
                    <option value="platinum">Platinum</option>
                    <option value="staff">Staff</option>
                    <option value="mentor">Mentor</option>
                </select>
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary" style="width: 100%; margin-top:30px">
            </div>
            <div class="row mb-4">
                <div class="col">
                    <a href="#!">Forgot password?</a>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="form-check">
                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" />
                    </div>
                </div>
            </div>
        </form>
        <div><p>Not registered yet? <a href="registration.php">Register Here</a></p></div>
    </div>
</body>
</html>