<?php
include 'config.php';

// Récupération des données envoyées depuis React (à adapter selon votre structure)
$data = json_decode(file_get_contents("php://input"));

// Exemple de mise à jour dans la base de données (vous devrez adapter cela en fonction de vos besoins)
$stmt = $conn->prepare("INSERT INTO events (id, text, startDate, endDate, allDay) VALUES (:id, :text, :startDate, :endDate, :allDay)");
$stmt->bindParam(':id', $data->id);
$stmt->bindParam(':text', $data->text);
$stmt->bindParam(':startDate', $data->startDate);
$stmt->bindParam(':endDate', $data->endDate);
$stmt->bindParam(':allDay', $data->allDay);

if ($stmt->execute()) {
    echo json_encode(array('message' => 'Données mises à jour avec succès'));
} else {
    echo json_encode(array('message' => 'Erreur lors de la mise à jour des données'));
}
?>
