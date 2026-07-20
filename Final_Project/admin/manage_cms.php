<?php
session_start();
require_once '../config/db.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') { header("Location: ../login.php"); exit; }

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $page_name = $_POST['page_name']; $title = trim($_POST['section_title']); $content = trim($_POST['content']);
    $stmt = $pdo->prepare("UPDATE cms_pages SET section_title = ?, content = ? WHERE page_name = ?");
    if ($stmt->execute([$title, $content, $page_name])) { $message = "Dynamic Content blocks refreshed cleanly!"; }
}
$pages = $pdo->query("SELECT * FROM cms_pages")->fetchAll(PDO::FETCH_UNIQUE);
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Manage App Content</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-light">
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4"><h2>CMS Content Processing Nodes</h2><a href="dashboard.php" class="btn btn-secondary">Exit Panel</a></div>
        <?php if(!empty($message)): ?> <div class="alert alert-success"><?php echo $message; ?></div> <?php endif; ?>
        <div class="row">
            <div class="col-md-6 mb-4"><div class="card shadow-sm"><div class="card-header bg-dark text-white">Homepage Context Form</div><div class="card-body"><form action="manage_cms.php" method="POST"><input type="hidden" name="page_name" value="home"><div class="mb-3"><label class="form-label">Hero Title Node</label><input type="text" name="section_title" class="form-control" value="<?php echo htmlspecialchars($pages['home']['section_title'] ?? ''); ?>" required></div><div class="mb-3"><label class="form-label">Content Layout Body</label><textarea name="content" class="form-control" rows="5" required><?php echo htmlspecialchars($pages['home']['content'] ?? ''); ?></textarea></div><button type="submit" class="btn btn-primary w-100">Publish Changes</button></form></div></div></div>
            <div class="col-md-6 mb-4"><div class="card shadow-sm"><div class="card-header bg-dark text-white">About Section Context Form</div><div class="card-body"><form action="manage_cms.php" method="POST"><input type="hidden" name="page_name" value="about"><div class="mb-3"><label class="form-label">Biography Header Node</label><input type="text" name="section_title" class="form-control" value="<?php echo htmlspecialchars($pages['about']['section_title'] ?? ''); ?>" required></div><div class="mb-3"><label class="form-label">Biography Text Block</label><textarea name="content" class="form-control" rows="5" required><?php echo htmlspecialchars($pages['about']['content'] ?? ''); ?></textarea></div><button type="submit" class="btn btn-success w-100">Publish Changes</button></form></div></div></div>
        </div>
    </div>
</body>
</html>