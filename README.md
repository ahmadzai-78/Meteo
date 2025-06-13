# 🌤️ Projet Météo PHP + OpenWeatherMap

Ce projet est une application météo simple et moderne développée en **PHP**, utilisant l’**API OpenWeatherMap**, **AJAX (Fetch API)**, et **Bootstrap** pour le design.

## 🚀 Fonctionnalités

- 🔍 Recherche de la météo par ville
- 📍 Géolocalisation automatique à l'ouverture de la page
- ⚡ Affichage en temps réel sans rechargement (AJAX)
- 🧾 Historique des recherches (enregistré en base MySQL)
- 🗑️ Suppression de l’historique possible
- 🎨 Interface responsive avec Bootstrap 5

## 📸 Capture d'écran

![alt text](<meteo paris.png>)

## ⚙️ Technologies utilisées

- PHP (Back-end)
- MySQL (Base de données)
- JavaScript (AJAX)
- HTML / Bootstrap (Front-end)
- OpenWeatherMap API (Données météo)

## 🔧 Installation locale

1. Clone ce dépôt :
   ```bash
   git clone https://github.com/ahmadzai-78/Meteo.git



Crée une base de données MySQL :

CREATE DATABASE meteo;
USE meteo;
CREATE TABLE recherches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ville VARCHAR(100),
    temperature FLOAT,
    description VARCHAR(255),
    date_recherche DATETIME DEFAULT CURRENT_TIMESTAMP
);


Configure tes fichiers :

config/config.php → ajoute ta clé API OpenWeather

config/db.php → configure l'accès à ta base MySQL

Lance ton serveur local et accède à :

http://localhost/meteo-ajax/public/index.php



Auteur
Niamatullah Ahmadzai – Développeur web PHP & passionné par l'IA 
https://github.com/ahmadzai-78