<?php
include '../koneksi/db.php';
include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];

    if ($name && $description && $duration) {

        $newCode = 'PR' . str_pad((int)substr($pdo->query("SELECT code FROM program ORDER BY code DESC LIMIT 1")
        ->fetchColumn(), 2) + 1, 3, '0', STR_PAD_LEFT);

        $sql = "INSERT INTO program (code, name, description, duration) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$newCode, $name, $description, $duration]);

        header('Location: index.php');
        exit;
    } else {
        echo '<p>All fields are required!</p>';
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">New Program</h2>

    <form action="create.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label"><b>Program Name : </b></label>
            <input type="text" class="form-control" placeholder="ex: UI/UX Design" id="name" name="name" required >
        </div>
        <div class="mb-3">
            <label for="description" class="form-label"><b>Description : </b></label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label"><b>Duration : </b></label>
            <input type="text" class="form-control" placeholder="in days (ex: 3)" id="duration" name="duration" required>
        </div>
        <button type="submit" class="btn btn-primary">Save Program</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
