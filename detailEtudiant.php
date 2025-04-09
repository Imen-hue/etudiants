<?php
require 'connection.php';

// Vérifier si l'ID est présent dans l'URL
if (!isset($_GET['id'])) {
    header('Location: listeEtudiants.php');
    exit();
}

$id = $_GET['id'];

// Récupérer les détails de l'étudiant
$sql = "SELECT * FROM student WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

// Si l'étudiant n'existe pas
if (!$etudiant) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Détails de l'étudiant</title>
</head>
<body>
    <h1>Détails de l'étudiant</h1>
    
    <p><strong>ID:</strong> <?= htmlspecialchars($etudiant['id']) ?></p>
    <p><strong>Nom:</strong> <?= htmlspecialchars($etudiant['nom']) ?></p>
    <p><strong>Date de naissance:</strong> <?= htmlspecialchars($etudiant['birthday']) ?></p>
    
    <a href="index.php">Retour à la liste</a>
</body>
</html>