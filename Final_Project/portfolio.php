<?php 
require_once 'config/db.php';
include_once 'includes/header.php';
?>

<div class="container mt-5">
    <h2 class="text-center mb-5 fw-bold text-primary">Portfolio Collection</h2>
    
    <div class="row">
        <?php
        $project_stmt = $pdo->query("SELECT * FROM portfolio ORDER BY id DESC");
        $projects = $project_stmt->fetchAll();

        if (count($projects) > 0):
            foreach ($projects as $project): 
        ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="assets/uploads/<?php echo htmlspecialchars($project['project_image']); ?>" class="card-img-top" alt="Project Image" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column p-4">
                        <h5 class="card-title fw-bold"><?php echo htmlspecialchars($project['title']); ?></h5>
                        <p class="card-text text-muted small mb-4"><?php echo nl2br(htmlspecialchars($project['description'])); ?></p>
                        
                        <a href="assets/projects/<?php echo htmlspecialchars($project['project_file']); ?>" class="btn btn-primary mt-auto w-100" download>
                            &darr; Download Project (.zip)
                        </a>
                    </div>
                </div>
            </div>
        <?php 
            endforeach; 
        else:
        ?>
            <div class="col-12 text-center py-5">
                <p class="text-muted fs-5">No projects have been uploaded to the collection yet.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include_once 'includes/footer.php'; ?>