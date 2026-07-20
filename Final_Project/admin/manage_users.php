<?php
session_start();
require_once '../config/db.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') { header("Location: ../login.php"); exit; }

if (isset($_GET['toggle_status'])) {
    $id = (int)$_GET['toggle_status'];
    $stmt = $pdo->prepare("UPDATE users SET is_active = NOT is_active WHERE id = ? AND id != ?");
    $stmt->execute([$id, $_SESSION['user_id']]); header("Location: manage_users.php"); exit;
}
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ? AND id != ?");
    $stmt->execute([$id, $_SESSION['user_id']]); header("Location: manage_users.php"); exit;
}
$users = $pdo->query("SELECT id, username, email, role, is_active FROM users ORDER BY id ASC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Manage User Registry Matrix</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-light">
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4"><h2>User Profiles Ledger Control</h2><a href="dashboard.php" class="btn btn-secondary">Exit Panel</a></div>
        <div class="card shadow-sm border-0"><table class="table table-hover align-middle mb-0"><thead class="table-dark"><tr><th>ID</th><th>Username</th><th>Email Address</th><th>Privilege</th><th>Status Block</th><th>Operation Options</th></tr></thead><tbody>
            <?php foreach($users as $u): ?><tr>
                <td><?php echo $u['id']; ?></td><td class="fw-semibold"><?php echo htmlspecialchars($u['username']); ?></td><td><?php echo htmlspecialchars($u['email']); ?></td>
                <td><span class="badge <?php echo $u['role'] === 'admin' ? 'bg-danger' : 'bg-secondary'; ?>"><?php echo $u['role']; ?></span></td>
                <td><span class="badge <?php echo $u['is_active'] == 1 ? 'bg-success' : 'bg-warning'; ?>"><?php echo $u['is_active'] == 1 ? 'Active Profile' : 'Deactivated'; ?></span></td>
                <td><?php if ($u['id'] != $_SESSION['user_id']): ?><a href="manage_users.php?toggle_status=<?php echo $u['id']; ?>" class="btn btn-sm btn-outline-warning me-1">Toggle Status</a><a href="manage_users.php?delete=<?php echo $u['id']; ?>" class="btn btn-sm btn-danger shadow-sm" onclick="return confirm('Purge data account permanently?');">Delete</a><?php else: ?><span class="text-muted small italic">Active Instance Profile</span><?php endif; ?></td>
            </tr><?php endforeach; ?>
        </tbody></table></div>
    </div>
</body>
</html>