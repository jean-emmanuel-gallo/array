<?php
include 'config.php';

// Récupération de l'identifiant envoyé depuis React (à adapter selon votre structure)
$id = json_decode(file_get_contents("php://input"));

// Exemple de suppression dans la base de données (vous devrez adapter cela en fonction de vos besoins)
$stmt = $conn->prepare("DELETE FROM events WHERE id = :id");
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    echo json_encode(array('message' => 'Données supprimées avec succès'));
} else {
    echo json_encode(array('message' => 'Erreur lors de la suppression des données'));
}
?>
