<?php
include '../koneksi/db.php';

    $id = $_GET['id'] ?? null;

    if ($id) {
        $sql = "DELETE FROM program WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    header('Location: index.php');
?>
