<?php
include("templates/header.php");
?>

<!-- Przycisk hamburgera -->
<button class="menu-toggle btn btn-dark d-block d-lg-none" onclick="toggleSidebar()">
    <i class="fas fa-bars"></i>
</button>

<div class="create-form w-100 mx-auto p-4" style="max-width:700px;">
    <form action="process.php" method="post" enctype="multipart/form-data">
        <div class="form-field mb-4">
            <input type="text" class="form-control" name="title" id="" placeholder="Wpisz tytuł:" required>
        </div>
        <div class="form-field mb-4">
            <textarea name="summary" class="form-control" id="" cols="30" rows="10" placeholder="Wpisz wprowadzenie:" required></textarea>
        </div>
        <div class="form-field mb-4">
            <textarea name="content" class="form-control" id="" cols="30" rows="10" placeholder="Wpisz treść artykułu:" required></textarea>
        </div>
        <div class="form-field mb-4">
            <input type="file" class="form-control" name="image" accept="image/*">
        </div>
        <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>">
        <div class="form-field">
            <input type="submit" class="btn btn-primary" value="Prześlij" name="create">
        </div>
    </form>
</div>

<!-- sidebar.js -->
<script src="../js/sidebar.js"></script>

<?php
include("templates/footer.php");
?>
