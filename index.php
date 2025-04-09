<?php
require 'connection.php';

$sql = "SELECT * FROM student";
$stmt = $pdo->query($sql);

// Récupérer les résultats dans un tableau associatif
$donnees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des éléments</title>
</head>
<body>
    <h1>Données de la base</h1>
    <table border="1">
        <tr>
            <th>id</th>
            <th>Nom</th>
            <th>birthday</th>
            <th>Action</th>

        </tr>

        <?php foreach ($donnees as $ligne): ?>
            <tr>
                <td><?= htmlspecialchars($ligne['id']) ?></td>
                <td><?= htmlspecialchars($ligne['nom']) ?></td>
                <td><?= htmlspecialchars($ligne['birthday']) ?></td>
                <td>
                    <a href="detailEtudiant.php?id=<?= $ligne['id'] ?>">Détails</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

