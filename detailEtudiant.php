<?php
require 'connection.php';


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('HTTP/1.1 400 Bad Request');
    die("ID invalide");
} 

$id = $_GET['id'];

try {
    $sql = "SELECT * FROM student WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
    if (!$etudiant) {
        header('HTTP/1.1 404 Not Found');
        die("Étudiant non trouvé");
    }
} catch (PDOException $e) {
    header('HTTP/1.1 500 Internal Server Error');
    die("Erreur de base de données: " . $e->getMessage());
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