// Wyświetla pełną treść artykułu wraz z komentarzami i formularzem do dodawania komentarzy.

<?php
session_start();
include('views/templates/header_view.php');
?>

<main>
    <header class="p-4 bg-dark text-center">
        <h1><a href="index.php" class="text-light text-decoration-none">Blog</a></h1>
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
                        echo "<p>Brak komentarzy.</p>";
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
                echo "<p>Brak artykułów</p>";
            }
        } else {
            echo "<p>Brak postu o określonym ID</p>";
        }
        mysqli_close($conn);
        ?>
    </div>
</main>

<?php include('views/templates/footer_view.php'); ?>
