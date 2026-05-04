<?php
/**
 * Configuration de la base de données
 * Adassa Prothésiste Ongulaire
 * Adapté pour le déploiement sur Render
 */

// Désactiver le lancer d'exceptions pour mysqli pour gérer les erreurs manuellement
mysqli_report(MYSQLI_REPORT_OFF);

// Utilisation des variables d'environnement pour Render, ou valeurs par défaut pour le local
$servername = getenv('DB_HOST') ?: "localhost";
$username = getenv('DB_USER') ?: "root";
$password = getenv('DB_PASSWORD') ?: "";
$dbname = getenv('DB_NAME') ?: "adassa_ongulaire";
$port = getenv('DB_PORT') ?: "3306";

$conn = null;

try {
    // Créer la connexion
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    // Vérifier la connexion
    if ($conn->connect_error) {
        error_log("Erreur de connexion : " . $conn->connect_error);
        $conn = null;
    } else {
        // Définir le charset UTF-8
        $conn->set_charset("utf8mb4");
    }
} catch (Exception $e) {
    error_log("Exception de connexion : " . $e->getMessage());
    $conn = null;
}

/**
 * Fonction utilitaire pour vérifier si la base de données est disponible
 */
function isDbConnected() {
    global $conn;
    return $conn !== null && $conn->ping();
}

// Inclure le système de secours
require_once 'data_fallback.php';
?>
