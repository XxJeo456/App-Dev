<?php 
require_once 'config/db.php';
include_once 'includes/header.php';

$stmt = $pdo->prepare("SELECT * FROM cms_pages WHERE page_name = 'about'");
$stmt->execute();
$page = $stmt->fetch();
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-4 border-0">
                <h2 class="text-success border-bottom pb-2 fw-bold"><?php echo htmlspecialchars($page['section_title'] ?? 'Professional Background Biography'); ?></h2>
                <p class="mt-3 text-secondary style-body fs-5" style="line-height: 1.8;">
                    <?php echo nl2br(htmlspecialchars($page['content'] ?? 'Developer bio text values...')); ?>
                </p>
            </div>
        </div>
    </div>
</div>
<?php include_once 'includes/footer.php'; ?>