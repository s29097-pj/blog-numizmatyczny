<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog numizmatyczny</title>
    <link rel="icon" type="image/png" href="images/logo_moneta.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="header">
    <a href="#" class="logo"><span>B</span>log <span>N</span>umizmatyczny</a>
    <nav class="navbar">
        <a href="index.php"><i class="fas fa-flag"></i> Strona główna</a>
        <a href="index.php#posts"><i class="fas fa-book-open"></i> Artykuły</a>
        <a href="index.php#contact"><i class="fas fa-envelope"></i> Kontakt</a>
        <a href="admin/index.php"><i class="fas fa-shield-alt"></i> Panel Admina</a>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<a href="users/logout.php"><i class="fas fa-sign-out-alt"></i> Wyloguj</a>';
            echo "Welcome, User!";
        } else {
            echo '<a href="users/login.php"><i class="fas fa-sign-in-alt"></i> Zaloguj</a>';
            echo '<a href="users/register.php"><i class="fas fa-user-plus"></i> Rejestracja</a>';
            echo "Welcome, Guest!";
        }
        ?>
    </nav>
    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
    </div>
    <form action="" class="search-form">
        <input type="search" placeholder="Wpisz tutaj..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
    </form>
</header>