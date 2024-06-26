<?php
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == "admin" && $password == "pass") {
        $_SESSION["user"] = "admin";
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5" style="max-width:600px">
    <h2 class="mb-4">Panel administratora</h2>
    <div class="login-form">
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
