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
        <input type="search" placeholder="Wpisz tutaj..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
    </form>
</header>

<section class="banner" id="banner">
    <div class="content">
        <h3>Blog numizmatyczny</h3>
        <p>Odkryj fascynujący świat monet z różnych epok i krajów.
            Nasz blog to miejsce, gdzie każda moneta ma swoją niepowtarzalną historię do opowiedzenia.
            Przygotuj się na pasjonującą podróż przez numizmatykę – od starożytnych monet po najnowsze numizmatyczne odkrycia.
            Znajdziesz tutaj nie tylko ciekawe artykuły i galerie zdjęć, ale również porady dotyczące kolekcjonowania
            oraz aktualności ze świata numizmatyki. Dołącz do naszej społeczności i odkrywaj tajemnice monet z całego świata!</p>
    </div>
</section>

<header class="p-4 bg-dark text-center">
    <h1><a href="index.php" class="text-light text-decoration-none">Artykuły</a></h1>
</header>

<section class="container" id="posts">
    <div class="post-list mt-5">
        <div class="container">
            <?php
            include("connect.php");
            $sqlSelect = "SELECT * FROM posts";
            $result = mysqli_query($conn, $sqlSelect);
            while ($data = mysqli_fetch_array($result)) {
                ?>
                <div class="row mb-4 p-5 bg-light">
                    <div class="col-sm-2">
                        <?php echo $data["date"]; ?>
                    </div>
                    <div class="col-sm-3">
                        <h2><?php echo $data["title"]; ?></h2>
                    </div>
                    <div class="col-sm-3">
                        <?php if (!empty($data["image"])) { ?>
                            <img src="images/<?php echo $data["image"]; ?>" alt="Miniatura" class="img-thumbnail">
                        <?php } ?>
                    </div>
                    <div class="col-sm-5">
                        <?php echo $data["summary"]; ?>
                    </div>
                    <div class="col-sm-2">
                        <a href="post_view.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Pełna treść artykułu</a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<header class="p-4 bg-dark text-center">
    <h1><a href="index.php" class="text-light text-decoration-none">Kontakt</a></h1>
</header>

<section class="contact" id="contact">
    <form class="form container" id="contactForm" method="post" action="send_script.php">
        <h3 class="text-center">Formularz kontaktowy</h3>
        <div class="mb-3">
            <input class="form-control" type="text" placeholder="Imię" required id="name" name="name">
        </div>
        <div class="mb-3">
            <input class="form-control" type="email" placeholder="Email" required id="email" name="email">
        </div>
        <div class="mb-3">
            <input class="form-control" type="text" placeholder="Temat" required id="subject" name="subject">
        </div>
        <div class="mb-3">
            <textarea name="message" class="form-control" placeholder="Treść wiadomości" id="message" cols="30" rows="10"></textarea>
        </div>
        <input type="submit" value="Wyślij wiadomość" class="btn btn-primary">
    </form>
</section>

<section class="footer">
    <div class="follow">
        <a href="https://www.facebook.com/?locale=pl_PL" class="fab fa-facebook-f" target="_blank"></a>
        <a href="https://github.com/s29097-pj" class="fab fa-github" target="_blank"></a>
        <a href="https://www.youtube.com" class="fab fa-youtube" target="_blank"></a>
        <a href="https://pl.linkedin.com" class="fab fa-linkedin" target="_blank"></a>
    </div>
    <div class="credit">Stworzone przez <span>s29097</span> | projekt WPRG</div>
</section>

<script src="js/script.js"></script>

</body>
</html>
