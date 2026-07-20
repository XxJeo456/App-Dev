<?php 
require_once 'config/db.php';
include_once 'includes/header.php';

$msg = ''; $class = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $msg = "Error! Ensure all required input spaces contain text entries.";
        $class = "alert-danger";
    } else {
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$name, $email, $subject, $message])) {
            $msg = "Success! Communication forms processed successfully.";
            $class = "alert-success";
        }
    }
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-4">
                <h3 class="fw-bold mb-3 text-center">Get in Touch</h3>
                <?php if (!empty($msg)): ?> <div class="alert <?php echo $class; ?>"><?php echo $msg; ?></div> <?php endif; ?>
                <form action="contact.php" method="POST">
                    <div class="mb-3"><label class="form-label">Full Name</label><input type="text" name="name" class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">Email Address</label><input type="email" name="email" class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">Subject Topic</label><input type="text" name="subject" class="form-control" required></div>
                    <div class="mb-3"><label class="form-label">Message Details</label><textarea name="message" class="form-control" rows="4" required></textarea></div>
                    <button type="submit" class="btn btn-success w-100 shadow-sm">Submit Inquiries</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once 'includes/footer.php'; ?>