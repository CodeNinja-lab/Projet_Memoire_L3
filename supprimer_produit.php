<?php
// supprimer_produit.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assurez-vous que l'ID est présent et non vide
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Récupérez l'ID du produit à partir de la requête
        $idProduit = $_POST['id'];

        // Effectuez votre logique de suppression ici, par exemple avec une requête SQL
        // Vous devrez ajuster cela en fonction de votre base de données et de votre logique d'application
        // Exemple (utilisez PDO pour éviter les injections SQL) :
        $host = "localhost";
        $dbname = "agrimarket";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "DELETE FROM offres WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $idProduit, PDO::PARAM_INT);
            $stmt->execute();
            header("Location: ProfilAgriculteur.php");

        } catch (PDOException $e) {
            echo 'Erreur de suppression du produit: ' . $e->getMessage();
        }

        $conn = null;
    } else {
        echo 'ID du produit non valide.';
    }
} else {
    echo 'Méthode de requête non autorisée.';
}
?>
