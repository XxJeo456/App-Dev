<?php
require_once '../config/db.php';

if (!is_dir('../assets/projects')) {
    mkdir('../assets/projects', 0777, true);
}

if (!is_dir('../assets/uploads')) {
    mkdir('../assets/uploads', 0777, true);
}

$message = ''; $class = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    
    $image_name = $_FILES['project_image']['name'];
    $image_tmp = $_FILES['project_image']['tmp_name'];
    $image_ext = pathinfo($image_name, PATHINFO_EXTENSION);
    $new_image_name = time() . '_' . uniqid() . '.' . $image_ext;
    $image_target = "../assets/uploads/" . $new_image_name;

    $file_name = $_FILES['project_file']['name'];
    $file_tmp = $_FILES['project_file']['tmp_name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_file_name = time() . '_project_' . uniqid() . '.' . $file_ext;
    $file_target = "../assets/projects/" . $new_file_name;

    if ($file_ext !== 'zip') {
        $message = "Please upload the project as a .zip file.";
        $class = "alert-danger";
    } else {
        if (move_uploaded_file($image_tmp, $image_target) && move_uploaded_file($file_tmp, $file_target)) {
            $stmt = $pdo->prepare("INSERT INTO portfolio (title, description, project_image, project_file) VALUES (?, ?, ?, ?)");
            if ($stmt->execute([$title, $description, $new_image_name, $new_file_name])) {
                $message = "Project uploaded successfully!";
                $class = "alert-success";
            } else {
                $message = "Database insertion failed.";
                $class = "alert-danger";
            }
        } else {
            $message = "Failed to upload files.";
            $class = "alert-danger";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow col-md-8 mx-auto">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-3">
                <h4 class="mb-0">Upload Final Project File</h4>
                <a href="dashboard.php" class="btn btn-sm btn-outline-light">Exit to Dashboard &rarr;</a>
            </div>
            
            <div class="card-body p-4">
                <?php if(!empty($message)): ?>
                    <div class="alert <?php echo $class; ?>"><?php echo $message; ?></div>
                <?php endif; ?>

                <form action="manage_portfolio.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Project Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Project Image Preview</label>
                        <input type="file" name="project_image" class="form-control" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Project Folder (.zip format only)</label>
                        <input type="file" name="project_file" class="form-control" accept=".zip" required>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 py-2">Upload Project to Portfolio</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>