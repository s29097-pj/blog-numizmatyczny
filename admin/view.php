<?php
include("templates/header.php");
?>

<!-- Przycisk hamburgera -->
<button class="menu-toggle btn btn-dark d-block d-lg-none" onclick="toggleSidebar()">
    <i class="fas fa-bars"></i>
</button>

<div class="post w-100 bg-light p-5">
    <?php
    $id = $_GET["id"];
    if ($id) {
        include("../connect.php");
        $sqlSelectPost = "SELECT * FROM posts WHERE id = ?";
        $stmt = $conn->prepare($sqlSelectPost);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($data = $result->fetch_assoc()) {
            // Usunięcie sekwencji \\r\\n z treści
            $content = str_replace("\\\\r\\\\n", "", $data['content']);
            ?>
            <h1><?php echo htmlspecialchars($data['title']); ?></h1>
            <p><?php echo htmlspecialchars($data['date']); ?></p>
            <?php if ($data['image']) { ?>
                <img src="../images/<?php echo htmlspecialchars($data['image']); ?>" alt="Post Image" style="max-width: 100%; height: auto;">
            <?php } ?>
            <p><strong>Summary: </strong> <?php echo htmlspecialchars($data['summary']); ?></p>
            <p><strong>Content: </strong><?php echo nl2br(htmlspecialchars($content)); ?></p>
            <?php
        } else {
            echo "Post Not Found";
        }
        $stmt->close();
    } else {
        echo "Post Not Found";
    }
    ?>
</div>

<!-- sidebar.js -->
<script src="../js/sidebar.js"></script>

<?php
include("templates/footer.php");
?>
