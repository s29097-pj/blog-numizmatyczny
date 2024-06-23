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
        <a href="index.php"><i class="fas fa-flag"></i> Strona główna</a>
        <a href="index.php#posts"><i class="fas fa-book-open"></i> Artykuły</a>
        <a href="index.php#contact"><i class="fas fa-envelope"></i> Kontakt</a>
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

<main>
    <header class="p-4 bg-dark text-center">
        <h1><a href="index.php" class="text-light text-decoration-none">Simple Blog</a></h1>
    </header>

    <div class="container mt-5">
        <?php
        $id = $_GET['id'];
        if ($id) {
            include("connect.php");
            $sqlSelect = "SELECT * FROM posts WHERE id = $id";
            $result = mysqli_query($conn, $sqlSelect);

            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);
                ?>
                <div class="post bg-light p-4 mt-5">
                    <h1><?php echo htmlspecialchars($data['title']); ?></h1>
                    <p><?php echo htmlspecialchars($data['date']); ?> </p>
                    <?php if ($data['image']): ?>
                        <img src="images/<?php echo htmlspecialchars($data['image']); ?>" alt="Post Image" class="img-fluid">
                    <?php endif; ?>
                    <p><?php echo nl2br(htmlspecialchars($data['content'])); ?> </p>
                </div>

                <!-- Comment Section -->
                <div class="comment-section mt-4">
                    <h2>Komentarze</h2>
                    <?php
                    $sqlSelectComments = "SELECT * FROM comments WHERE post_id = ?";
                    $stmt = $conn->prepare($sqlSelectComments);
                    $stmt->bind_param('i', $id);
                    $stmt->execute();
                    $resultComments = $stmt->get_result();

                    if ($resultComments->num_rows > 0) {
                        while ($comment = $resultComments->fetch_assoc()) {
                            ?>
                            <div class="comment bg-light p-3 my-3">
                                <p><strong><?php echo htmlspecialchars($comment['author']); ?>:</strong> <?php echo nl2br(htmlspecialchars($comment['content'])); ?></p>
                                <small><?php echo htmlspecialchars($comment['created_at']); ?></small>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<p>No comments yet.</p>";
                    }
                    $stmt->close();
                    ?>

                    <!-- Comment Form -->
                    <div class="comment-form mt-4">
                        <h3>Dodaj komentarz</h3>
                        <form action="add_comment.php" method="post">
                            <input type="hidden" name="post_id" value="<?php echo $id; ?>">
                            <div class="mb-3">
                                <label for="author" class="form-label">Twoje imię</label>
                                <input type="text" class="form-control" id="author" name="author" required>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Twój komentarz</label>
                                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Dodaj komentarz</button>
                        </form>
                    </div>
                </div>
                <?php
            } else {
                echo "<p>No post found</p>";
            }
        } else {
            echo "<p>No post ID specified</p>";
        }
        mysqli_close($conn);
        ?>
    </div>
</main>

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
