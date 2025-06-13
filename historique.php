<?php
require_once __DIR__ . '/config/db.php';
if (isset($_GET['vider']) && $_GET['vider'] == 1) {
    $pdo->exec("DELETE FROM recherches");
    header("Location: historique.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Historique des recherches météo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="mb-4 text-center">🕘 Historique des recherches météo</h1>
    <a href="public/index.php" class="btn btn-secondary mb-3">⬅️ Retour</a>
    <a href="?vider=1" class="btn btn-danger mb-3 ms-2" onclick="return confirm('Supprimer tout l’historique ?')">🗑️ Vider l’historique</a>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Ville</th>
                <th>Température (°C)</th>
                <th>Description</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $pdo->query("SELECT * FROM recherches ORDER BY date_recherche DESC LIMIT 10");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>" . htmlspecialchars($row['ville']) . "</td>
                        <td>{$row['temperature']}</td>
                        <td>" . htmlspecialchars($row['description']) . "</td>
                        <td>{$row['date_recherche']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
