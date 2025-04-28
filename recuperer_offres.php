<?php
// recuperer_offres.php

// Récupérer le nom du produit depuis la requête POST
if (isset($_POST['nomProduit'])) {
    $nomProduit = $_POST['nomProduit'];

    // Connexion à la base de données
    $host = "localhost";
    $dbname = "agrimarket";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Sélectionnez les offres pour le produit spécifié
        $sql = "SELECT nom, categorie, prix_par_kg FROM offres WHERE nom = :nomProduit";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nomProduit', $nomProduit);
        $stmt->execute();

        // Récupérez les résultats
        $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Envoyez les résultats au format JSON
        foreach ($resultats as $resultat) {
            echo '<p>Nom: ' . $resultat['nom'] . ', Catégorie: ' . $resultat['categorie'] . ', Prix: ' . $resultat['prix_par_kg'] . '</p>';
        }
    } catch (PDOException $e) {
        // Gérer les erreurs de connexion à la base de données
        echo 'Erreur de connexion à la base de données: ' . $e->getMessage();
    }

    // Fermez la connexion à la base de données
    $conn = null;
} else {
    // Si le nom du produit n'est pas défini dans la requête POST
    echo 'Nom de produit non spécifié.';
}
?>
