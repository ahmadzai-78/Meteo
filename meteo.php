<?php
header("Content-Type: application/json");
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/config/config.php';

if ((isset($_GET['ville']) && !empty($_GET['ville'])) || (isset($_GET['lat']) && isset($_GET['lon']))) {
    if (isset($_GET['ville'])) {
        $ville = htmlspecialchars($_GET['ville']);
        $url = "https://api.openweathermap.org/data/2.5/weather?q=$ville&appid=$apiKey&units=metric&lang=fr";
    } else {
        $lat = $_GET['lat'];
        $lon = $_GET['lon'];
        $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$apiKey&units=metric&lang=fr";
    }

    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if (isset($data['main']['temp'])) {
        $temperature = $data['main']['temp'];
        $description = $data['weather'][0]['description'];
        $icon = $data['weather'][0]['icon'];
        $ville = $data['name'];

        $stmt = $pdo->prepare("INSERT INTO recherches (ville, temperature, description) VALUES (?, ?, ?)");
        $stmt->execute([$ville, $temperature, $description]);

        echo json_encode([
            'temp' => $temperature,
            'description' => $description,
            'icon' => $icon,
            'ville' => $ville
        ]);
    } else {
        echo json_encode(['error' => 'Données non trouvées']);
    }
} else {
    echo json_encode(['error' => 'Aucune donnée fournie']);
}
