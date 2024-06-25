<?php
session_start();
include('views/templates/header_view.php');
?>

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

<section class="container-fluid" id="posts">
    <div class="post-list mt-5">
        <?php
        include("connect.php");
        $sqlSelect = "SELECT * FROM posts ORDER BY date DESC";
        $result = mysqli_query($conn, $sqlSelect);
        while ($data = mysqli_fetch_array($result)) {
            ?>
            <div class="post row mb-4 p-5 bg-light">
                <div class="col-8">
                    <?php echo htmlspecialchars($data["date"]); ?>
                </div>
                <div class="col-8">
                    <h2><?php echo htmlspecialchars($data["title"]); ?></h2>
                </div>
                <div class="col-10">
                    <?php if (!empty($data["image"])) { ?>
                        <img src="/images/<?php echo htmlspecialchars($data["image"]); ?>" alt="Miniatura" class="img-thumbnail">
                    <?php } ?>
                </div>
                <div class="col-8">
                    <?php echo htmlspecialchars($data["summary"]); ?>
                </div>
                <div class="col-1">
                    <a href="post_view.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Pełna treść artykułu</a>
                </div>
            </div>
            <?php
        }
        ?>
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

<?php include('views/templates/footer_view.php'); ?>

