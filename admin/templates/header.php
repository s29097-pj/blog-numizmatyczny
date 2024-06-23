<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .dashboard {
            display: flex;
            height: 100%;
        }
        .sidebar {
            min-width: 250px;
            max-width: 250px;
            height: 100%;
            position: fixed;
            transition: transform 0.3s ease;
        }
        .content {
            margin-left: 250px; /* szerokość panelu bocznego */
            padding: 20px;
            flex-grow: 1;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                visibility: hidden;
            }
            .sidebar.active {
                transform: translateX(0);
                visibility: visible;
            }
            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 1000;
                display: none;
            }
            .sidebar.active + .sidebar-overlay {
                display: block;
            }
            .content {
                margin-left: 0; /* zerujemy margines dla responsywności */
            }
        }
    </style>
</head>
<body>
<div class="dashboard">
    <div class="sidebar bg-dark vh-100">
        <h1 class="bg-primary p-4">
            <a href="./index.php" class="text-light text-decoration-none">Dashboard</a>
        </h1>

        <div class="sidebar-overlay"></div>
            <button class="menu-toggle btn btn-dark d-block d-lg-none" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i> <strong>Schowaj panel</strong>
            </button>
            <!-- Reszta zawartości sidebar -->

        <div class="menues p-4 mt-5">
            <a href="create.php" class="text-light text-decoration-none">
                <i class="fas fa-plus"></i> <strong>Nowy wpis</strong>
            </a>
            <div class="menu mt-5">
                <a href="./index.php" class="text-light text-decoration-none">
                    <i class="fas fa-arrow-left"></i> <strong>Powrót</strong>
                </a>
            </div>
            <div class="menu mt-5">
                <a href="../index.php" class="text-light text-decoration-none">
                    <i class="fas fa-eye"></i> <strong>Podgląd na stronie</strong>
                </a>
            </div>
            <div class="menu mt-5">
                <a href="logout.php" class="btn btn-info">
                    <i class="fas fa-sign-out-alt"></i> <strong>Wyloguj się</strong>
                </a>
            </div>
        </div>
    </div>
    <div class="content">
        <h1>Dashboard</h1>
        <p>Witaj, <?php echo htmlspecialchars($_SESSION["user"]); ?>!</p>
