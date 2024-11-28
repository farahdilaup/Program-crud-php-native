<?php
include '../koneksi/db.php';
include '../includes/header.php';

$id = $_GET['id'] ?? null;

if ($id && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];

    if ($name && $description && $duration) {
        $stmt = $pdo->prepare("UPDATE program SET name = ?, description = ?, duration = ? WHERE id = ?");
        $stmt->execute([$name, $description, $duration, $id]);
        header('Location: index.php');
        exit;
    } else {
        echo '<p>All fields are required!</p>';
    }
} else {
    $stmt = $pdo->prepare("SELECT * FROM program WHERE id = ?");
    $stmt->execute([$id]);
    $program = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Update Program</h2>

    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Program Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $program['name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $program['description']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="text" class="form-control" id="duration" name="duration" value="<?php echo $program['duration']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Program</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
