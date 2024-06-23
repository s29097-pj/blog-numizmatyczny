<?php
include("admin/templates/header.php");

if (isset($_POST["add_comment"])) {
    include("connect.php");
    $post_id = mysqli_real_escape_string($conn, $_POST["post_id"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    $date = date("Y-m-d H:i:s");

    $sqlInsertComment = "INSERT INTO comments (post_id, author, content, date) VALUES ('$post_id', '$author', '$content', '$date')";
    if (mysqli_query($conn, $sqlInsertComment)) {
        echo "Comment added successfully";
    } else {
        die("Comment is not added!");
    }
}

$id = $_GET["id"];
if ($id) {
    include("connect.php");
    $sqlSelectPost = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($conn, $sqlSelectPost);
    if ($data = mysqli_fetch_array($result)) {
        ?>
        <div class="post w-100 bg-light p-5">
            <h1><?php echo htmlspecialchars($data['title']); ?></h1>
            <p><?php echo htmlspecialchars($data['date']); ?></p>
            <?php if ($data['image']) { ?>
                <img src="images/<?php echo htmlspecialchars($data['image']); ?>" alt="Post Image" style="max-width: 100%; height: auto;">
            <?php } ?>
            <p><?php echo nl2br(htmlspecialchars($data['content'])); ?></p>
        </div>

        <div class="comments w-100 bg-light p-5">
            <h2>Comments</h2>
            <?php
            $sqlSelectComments = "SELECT * FROM comments WHERE post_id = $id ORDER BY date DESC";
            $resultComments = mysqli_query($conn, $sqlSelectComments);
            while ($comment = mysqli_fetch_array($resultComments)) {
                ?>
                <div class="comment mb-4">
                    <p><strong><?php echo htmlspecialchars($comment['author']); ?>:</strong></p>
                    <p><?php echo nl2br(htmlspecialchars($comment['content'])); ?></p>
                    <p><small><?php echo htmlspecialchars($comment['date']); ?></small></p>
                </div>
            <?php } ?>
            <form action="comments.php?id=<?php echo $id; ?>" method="post">
                <div class="form-field mb-4">
                    <input type="text" class="form-control" name="author" placeholder="Your Name">
                </div>
                <div class="form-field mb-4">
                    <textarea name="content" class="form-control" cols="30" rows="5" placeholder="Enter Comment"></textarea>
                </div>
                <input type="hidden" name="post_id" value="<?php echo $id; ?>">
                <div class="form-field">
                    <input type="submit" class="btn btn-primary" value="Submit" name="add_comment">
                </div>
            </form>
        </div>

        <?php
    } else {
        echo "Post Not Found";
    }
} else {
    echo "Post Not Found";
}
include("admin/templates/footer.php");
?>
