<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php"); exit;
}

$userCount = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$portfolioCount = $pdo->query("SELECT COUNT(*) FROM portfolio")->fetchColumn();
$messageCount = $pdo->query("SELECT COUNT(*) FROM contact_messages")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Core Admin Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark sticky-top p-3 shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-warning" href="#">Administrator Centralized Dashboard</a>
            <div class="d-flex"><a href="../index.php" class="btn btn-outline-info btn-sm me-2">View Live Site</a><a href="../logout.php" class="btn btn-danger btn-sm">Sign Out</a></div>
        </div>
    </nav>
    <div class="container my-5">
        <div class="row g-4 mb-5">
            <div class="col-md-4"><div class="card text-white bg-primary h-100 shadow border-0"><div class="card-body text-center p-4"><h3 class="display-4 fw-bold"><?php echo $userCount; ?></h3><p class="mb-0 small">Registered Profiles Matrix</p></div></div></div>
            <div class="col-md-4"><div class="card text-white bg-success h-100 shadow border-0"><div class="card-body text-center p-4"><h3 class="display-4 fw-bold"><?php echo $portfolioCount; ?></h3><p class="mb-0 small">Active Showcase Items</p></div></div></div>
            <div class="col-md-4"><div class="card text-white bg-danger h-100 shadow border-0"><div class="card-body text-center p-4"><h3 class="display-4 fw-bold"><?php echo $messageCount; ?></h3><p class="mb-0 small">Communication Inquiry Logs</p></div></div></div>
        </div>
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 fw-bold">Operations Hub Navigation Panel</div>
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-4"><a href="manage_cms.php" class="btn btn-outline-dark w-100 p-3 fw-semibold">Modify CMS Content Nodes</a></div>
                    <div class="col-md-4"><a href="manage_portfolio.php" class="btn btn-outline-dark w-100 p-3 fw-semibold">Process Portfolio CRUD</a></div>
                    <div class="col-md-4"><a href="manage_users.php" class="btn btn-outline-dark w-100 p-3 fw-semibold">Access System User Matrices</a></div>
                </div>
            </div>
        </div>
        
    <div class="p-3 bg-white rounded border d-flex justify-content-between align-items-center shadow-sm">
        <div>
            <h5 class="mb-1 fw-bold text-dark">Core Project Source Code</h5>
            <p class="mb-0 text-muted small">Extract the live binary system archive directly from the local asset storage node.</p>
        </div>
        <a href="../assets/Final_Project.zip" class="btn btn-outline-danger font-monospace px-4" download>Download Source ZIP</a>
    </div>
    </div>
</body>
</html>