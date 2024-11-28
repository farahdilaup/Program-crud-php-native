<?php
include '../koneksi/db.php';
include '../includes/header.php';

$stmt = $pdo->query("SELECT * FROM program");
$programs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h4 class="text-center mb-4">Program List</h4>
    <a href="create.php" class="btn btn-secondary mb-3">+ Add New Program</a>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($programs as $index => $program): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $program['code'] ?></td>
                    <td><?= $program['name'] ?></td>
                    <td><?= $program['description'] ?></td>
                    <td><?= $program['duration'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $program['id'] ?>" class="btn btn-info btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $program['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>
