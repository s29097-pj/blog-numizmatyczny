<?php
session_start();
include("../connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Sprawdzenie, czy użytkownik o podanej nazwie już istnieje
    $sqlCheck = "SELECT * FROM users WHERE username = '$username'";
    $resultCheck = mysqli_query($conn, $sqlCheck);
    if (mysqli_num_rows($resultCheck) > 0) {
        echo "<p>Nazwa użytkownika o podanym loginie już znajduje się w bazie danych, wybierz inną nazwę!</p>";
    } else {
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

        if (mysqli_query($conn, $sql)) {
            echo "<p>Registration successful. <a href='login.php'>Login here</a></p>";
        } else {
            echo "<p>Registration failed: " . mysqli_error($conn) . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="register-form w-100 mx-auto p-4" style="max-width: 500px;">
    <h2>Rejestracja</h2>
    <form action="register.php" method="post">
        <div class="form-field mb-4">
            <input type="text" class="form-control" name="username" placeholder="Wpisz imię" required>
        </div>
        <div class="form-field mb-4">
            <input type="password" class="form-control" name="password" placeholder="Wpisz hasło" required>
        </div>
        <div class="form-field mb-4">
            <input type="email" class="form-control" name="email" placeholder="Wpisz Email" required>
        </div>
        <div class="form-field">
            <input type="submit" class="btn btn-primary" value="Zarejestruj się">
        </div>
    </form>
</div>
</body>
</html>