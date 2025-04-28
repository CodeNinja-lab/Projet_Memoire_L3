<?php
session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['login'])) {
    header("Location: Authentification.html");
    exit();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_SESSION['login'];

    // Emplacement où vous souhaitez stocker les photos de profil
    $uploadDir = 'photoProfil/';

    // Chemin complet du fichier téléchargé
    $uploadFile = $uploadDir . basename($_FILES['nouvellePhoto']['name']);

    // Déplacer le fichier téléchargé vers l'emplacement spécifié
    if (move_uploaded_file($_FILES['nouvellePhoto']['tmp_name'], $uploadFile)) {
        // Mettre à jour la base de données avec le nouveau chemin de la photo de profil
        $conn = new PDO("mysql:host=localhost;dbname=agrimarket", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Utilisez la colonne correcte dans la clause WHERE
        $query = "UPDATE photoProfil SET url = ? WHERE utilisateur = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$uploadFile, $login]);

        // Afficher la nouvelle photo de profil
        echo '<img src="' . $uploadFile . '" alt="Photo de Profil" style="max-width: 200px;">';
    } else {
        echo "Erreur lors du téléchargement de la photo.";
    }
}
?>
