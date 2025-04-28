<?php
// modifier_produit_traitement.php

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données du formulaire
    $nom = $_POST["nom"];
    $categorie = $_POST["categorie"];
    $prix_par_kg = $_POST["prix_par_kg"];
    $description = $_POST["description"];

    // Récupérez l'ID du produit à partir de la requête
    $idProduit = $_GET['id'];

    // Connexion à la base de données
    $host = "localhost";
    $dbname = "agrimarket";
    $username = "root";
    $password = "";
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparez et exécutez la requête de mise à jour
        $sql = "UPDATE offres SET nom = :nom, categorie = :categorie, prix_par_kg = :prix_par_kg, description = :description WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':categorie', $categorie);
        $stmt->bindParam(':prix_par_kg', $prix_par_kg);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':id', $idProduit);
        $stmt->execute();

        // Redirigez vers la page de détails du produit ou une autre page de votre choix
        header("Location: ProfilAgriculteur.php");
        exit();
    } catch (PDOException $e) {
        echo 'Erreur de mise à jour du produit: ' . $e->getMessage();
    }

    $conn = null;
} else {
    echo 'Méthode non autorisée.';
}
?>

