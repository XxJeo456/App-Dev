<?php 
require_once 'config/db.php';
include_once 'includes/header.php';

$stmt = $pdo->prepare("SELECT * FROM cms_pages WHERE page_name = 'home'");
$stmt->execute();
$page = $stmt->fetch();
?>
<div class="container text-center">
    <div class="p-5 mb-4 bg-white rounded-3 shadow">
        <h1 class="display-5 fw-bold text-primary"><?php echo htmlspecialchars($page['section_title'] ?? 'Welcome Hero Banner Title!'); ?></h1>
        <p class="col-md-8 fs-4 mx-auto text-muted mt-3"><?php echo nl2br(htmlspecialchars($page['content'] ?? 'This is static filler text. Use the admin CMS to update.')); ?></p>
        <a href="portfolio.php" class="btn btn-primary btn-lg mt-3 shadow-sm">Explore Portfolio Collection</a>
    </div>
</div>
<?php include_once 'includes/footer.php'; ?>