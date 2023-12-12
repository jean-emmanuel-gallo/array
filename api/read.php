<?php
include 'config.php';

$stmt = $conn->prepare('SELECT * FROM events');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
?>
