<?php
include('./api/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $operation = $_POST['operation'];

    try {
        $stmt = $db->prepare("UPDATE sp_transaction SET operation = :operation WHERE id = :id");
        $stmt->bindParam(':operation', $operation);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
