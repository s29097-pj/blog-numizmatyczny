<?php
session_start();
include("../connect.php");

if (isset($_POST["create"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $summary = mysqli_real_escape_string($conn, $_POST["summary"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    // $date = mysqli_real_escape_string($conn, $_POST["date"]); // Usuwamy linijkę pobierania daty z formularza

    $date = date("Y-m-d"); // Pobieramy bieżącą datę jako alternatywę dla daty z formularza

    $image = '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = basename($_FILES['image']['name']);
        $target = "../images/" . $image;
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            die("Failed to upload image");
        }
    }

    $sqlInsert = "INSERT INTO posts (date, title, summary, content, image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bind_param('sssss', $date, $title, $summary, $content, $image);

    if ($stmt->execute()) {
        $_SESSION["create"] = "Post added successfully";
        header("Location: index.php");
    } else {
        die("Data is not inserted!");
    }
    $stmt->close();
}

if (isset($_POST["update"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $summary = mysqli_real_escape_string($conn, $_POST["summary"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    // $date = mysqli_real_escape_string($conn, $_POST["date"]); // Usuwamy linijkę pobierania daty z formularza
    $date = date("Y-m-d"); // Pobieramy bieżącą datę jako alternatywę dla daty z formularza

    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $image = '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = basename($_FILES['image']['name']);
        $target = "../images/" . $image;
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            die("Failed to upload image");
        }
    }

    if ($image) {
        $sqlUpdate = "UPDATE posts SET title = ?, summary = ?, content = ?, date = ?, image = ? WHERE id = ?";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bind_param('sssssi', $title, $summary, $content, $date, $image, $id);
    } else {
        $sqlUpdate = "UPDATE posts SET title = ?, summary = ?, content = ?, date = ? WHERE id = ?";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bind_param('ssssi', $title, $summary, $content, $date, $id);
    }

    if ($stmt->execute()) {
        $_SESSION["update"] = "Post updated successfully";
        header("Location: index.php");
    } else {
        die("Data is not updated!");
    }
    $stmt->close();
}
?>
