<?php
session_start();
include("connect.php");

if (isset($_POST['submit'])) {
    $post_id = $_POST['post_id'];
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    $sqlInsert = "INSERT INTO comments (post_id, author, content, created_at) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bind_param('iss', $post_id, $author, $content);

    if ($stmt->execute()) {
        $_SESSION['comment_added'] = "Comment added successfully";
        header("Location: post_view.php?id=$post_id");
    } else {
        die("Error adding comment: " . mysqli_error($conn));
    }
    $stmt->close();
    mysqli_close($conn);
} else {
    header("Location: post_view.php"); // Redirect if accessed directly
}
?>

