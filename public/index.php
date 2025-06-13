<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Météo AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title text-center mb-4">🌤️ Météo AJAX</h1>
            <form id="formMeteo" class="d-flex justify-content-center mb-4">
                <input type="text" id="ville" class="form-control w-50 me-2" placeholder="Entrez une ville" required>
                <button type="submit" class="btn btn-primary">Voir la météo</button>
            </form>
            <div id="resultat" class="text-center"></div>
            <div class="text-center mt-3">
                <a href="../historique.php" class="btn btn-secondary">📜 Voir l'historique</a>
            </div>
        </div>
    </div>
</div>
<script>
function afficherMeteo(data) {
    const resultat = document.getElementById('resultat');
    if (data.error) {
        resultat.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
    } else {
        const iconUrl = `https://openweathermap.org/img/wn/${data.icon}@2x.png`;
        resultat.innerHTML = `
            <div class="alert alert-success">
                <img src="${iconUrl}" alt="Icône météo"><br>
                <strong>${data.description}</strong> à <strong>${data.ville}</strong><br>
                🌡️ <strong>${data.temp}°C</strong>
            </div>
        `;
    }
}

// Requête météo par ville (formulaire)
document.getElementById('formMeteo').addEventListener('submit', function(e) {
    e.preventDefault();
    const ville = document.getElementById('ville').value;
    fetch(`../meteo.php?ville=${encodeURIComponent(ville)}`)
        .then(res => res.json())
        .then(afficherMeteo);
});

// Auto-géolocalisation au chargement
window.addEventListener('load', () => {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;
            fetch(`../meteo.php?lat=${lat}&lon=${lon}`)
                .then(res => res.json())
                .then(afficherMeteo);
        }, () => {
            console.log("Géolocalisation refusée");
        });
    }
});
</script>

</body>
</html>
