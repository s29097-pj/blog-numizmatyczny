<?php
include("templates/header.php");
?>

<!-- Przycisk hamburgera -->
<button class="menu-toggle btn btn-dark d-block d-lg-none" onclick="toggleSidebar()">
    <i class="fas fa-bars"></i>
</button>

<?php
$id = $_GET['id'];
if($id){
    include("../connect.php");
    $sqlEdit = "SELECT * FROM posts WHERE id = ?";
    $stmt = $conn->prepare($sqlEdit);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "No post found";
    exit;
}
?>

<div class="create-form w-100 mx-auto p-4" style="max-width:700px;">
    <form action="process.php" method="post" enctype="multipart/form-data">
        <div class="form-field mb-4">
            <input type="text" class="form-control" name="title" placeholder="Enter Title:" value="<?php echo htmlspecialchars($data['title']); ?>" required>
        </div>
        <div class="form-field mb-4">
            <textarea name="summary" class="form-control" cols="30" rows="10" placeholder="Enter Summary:" required><?php echo htmlspecialchars($data['summary']); ?></textarea>
        </div>
        <div class="form-field mb-4">
            <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Enter Post:" required><?php echo htmlspecialchars($data['content']); ?></textarea>
        </div>
        <div class="form-field mb-4">
            <input type="file" class="form-control" name="image" accept="image/*">
            <?php if ($data['image']): ?>
                <img src="../images/<?php echo htmlspecialchars($data['image']); ?>" alt="Current Image" style="max-width:100%;">
            <?php endif; ?>
        </div>
        <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-field">
            <input type="submit" class="btn btn-primary" value="Update" name="update">
        </div>
    </form>
</div>

<!-- sidebar.js -->
<script src="../js/sidebar.js"></script>

<?php
include("templates/footer.php");
?>
