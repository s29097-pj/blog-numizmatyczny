<?php
session_start();
include("../connect.php");

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Ustaw ciasteczko z identyfikatorem sesji
            setcookie("session_id", session_id(), time() + (86400 * 30), "/"); // 86400 = 1 dzień

            header("Location: ../index.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Invalid username.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5" style="max-width:600px">
    <div class="login-form">
        <h2>Logowanie</h2>
        <form action="login.php" method="post">
            <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
            <div class="form-field mb-4">
                <input class="form-control" type="text" name="username" placeholder="Wpisz login" required>
            </div>
            <div class="form-field mb-4">
                <input class="form-control" type="password" name="password" placeholder="Wpisz hasło" required>
            </div>
            <div class="form-field mb-4">
                <input class="btn btn-primary" type="submit" value="Zaloguj się" name="login">
            </div>
        </form>
    </div>
</div>
</body>
</html>