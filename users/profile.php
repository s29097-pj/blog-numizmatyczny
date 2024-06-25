<?php
include("../connect.php");
include("../admin/templates/header.php");

if (!isset($_SESSION['username'])) {
    header("Location: ../admin/login.php");
    exit();
}

$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "UPDATE users SET email = '$new_email', password = '$new_password' WHERE username = '$username'";

    if (mysqli_query($conn, $sql)) {
        echo "<p>Profile updated successfully.</p>";
    } else {
        echo "<p>Update failed: " . mysqli_error($conn) . "</p>";
    }
}

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<div class="profile-form w-100 mx-auto p-4" style="max-width: 500px;">
    <h2>Profile</h2>
    <form action="profile.php" method="post">
        <div class="form-field mb-4">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>" readonly>
        </div>
        <div class="form-field mb-4">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" required>
        </div>
        <div class="form-field mb-4">
            <label for="password">New Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter new password" required>
        </div>
        <div class="form-field">
            <input type="submit" class="btn btn-primary" value="Update">
        </div>
    </form>
</div>

<?php
include("../admin/templates/footer.php");
?>

