<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog numizmatyczny</title>
    <link rel="icon" type="image/png" href="images/logo_moneta.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="header">
    <a href="#" class="logo"><span>B</span>log <span>N</span>umizmatyczny</a>
    <nav class="navbar">
        <a href="#banner"><i class="fas fa-flag"></i> Top strony</a>
        <a href="#posts"><i class="fas fa-book-open"></i> Artykuły</a>
        <a href="#contact"><i class="fas fa-envelope"></i> Kontakt</a>
        <a href="admin/index.php"><i class="fas fa-shield-alt"></i> Panel Admina</a>
    </nav>
    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
    </div>
    <form action="" class="search-form">
        <input type="search" name="" placeholder="Wpisz tutaj..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
    </form>
</header>

<body>
<header class="p-4 bg-dark text-center">
    <h1><a href="index.php" class="text-light text-decoration-none">Simple Blog</a></h1>
</header>
<div class="post-list mt-5">
    <div class="container">
        <?php
        $id = $_GET['id'];
        if ($id) {
            include("connect.php");
            $sqlSelect = "SELECT * FROM posts WHERE id = $id";
            $result = mysqli_query($conn,$sqlSelect);
            while ($data = mysqli_fetch_array($result)) {
                ?>
                <div class="post bg-light p-4 mt-5">
                    <h1><?php echo $data['title']; ?></h1>
                    <p><?php echo $data['date']; ?> </p>
                    <p><?php echo $data['content']; ?> </p>
                </div>
                <?php
            }
        }else{
            echo "No post found";
        }
        ?>
    </div>
</div>

<footer class="footer">
    <div class="follow">
        <a href="https://www.facebook.com/?locale=pl_PL" class="fab fa-facebook-f" target="_blank"></a>
        <a href="https://github.com/s29097-pj" class="fab fa-github" target="_blank"></a>
        <a href="https://www.youtube.com" class="fab fa-youtube" target="_blank"></a>
        <a href="https://pl.linkedin.com" class="fab fa-linkedin" target="_blank"></a>
    </div>
    <div class="credit">Stworzone przez <span>s29097</span> | projekt WPRG</div>
</footer>

<script src="js/script.js"></script>

</body>
</html>
