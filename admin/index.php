<?php
include("templates/header.php");
?>

    <!-- Przycisk hamburgera -->
    <button class="menu-toggle btn btn-dark d-block d-lg-none" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

<div class="posts-list w-100 p-5">
<?php
        if (isset($_SESSION["create"])) {
        ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION["create"];
            ?>
        </div>
        <?php
        unset($_SESSION["create"]);
        }
        ?>
         <?php
        if (isset($_SESSION["update"])) {
        ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION["update"];
            ?>
        </div>
        <?php
        unset($_SESSION["update"]);
        }
        ?>
        <?php
        if (isset($_SESSION["delete"])) {
        ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION["delete"];
            ?>
        </div>
        <?php
        unset($_SESSION["delete"]);
        }
  ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width:15%;">Data publikacji</th>
                <th style="width:15%;">Tytuł</th>
                <th style="width:45%;">Artykuł</th>
                <th style="width:25%;">Akcja</th>
            </tr>
        </thead>
        <tbody>

            <?php
            include('../connect.php');
            $sqlSelect = "SELECT * FROM posts";
            $result = mysqli_query($conn,$sqlSelect);
            while($data = mysqli_fetch_array($result)){
            ?>
            <tr>
            <td><?php echo $data["date"]?></td>
            <td><?php echo $data["title"]?></td>
            <td><?php echo $data["summary"]?></td>
            <td>
                <a class="btn btn-info" href="view.php?id=<?php echo $data["id"]?>">
                    <i class="fas fa-eye"></i> Podgląd
                </a>
                <a class="btn btn-warning" href="edit.php?id=<?php echo $data["id"]?>">
                    <i class="fas fa-edit"></i> Edycja
                </a>
                <a class="btn btn-danger" href="delete.php?id=<?php echo $data["id"]?>">
                    <i class="fas fa-trash-alt"></i> Usuń
                </a>

            </td>
            </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>

<!-- sidebar.js -->
<script src="../js/sidebar.js"></script>

<?php
include("templates/footer.php");
?>
