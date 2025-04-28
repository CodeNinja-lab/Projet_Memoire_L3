<?php
// update_commande.php

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $commande_id = $_POST["commande_id"];

    // Connectez-vous à la base de données
    $host = "localhost";
    $dbname = "agrimarket"; // Remplacez cela par le nom de votre base de données
    $username = "root"; // Remplacez cela par votre nom d'utilisateur de la base de données
    $password = ""; // Remplacez cela par votre mot de passe de la base de données

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérifiez si le bouton "Valider" a été cliqué
        if (isset($_POST["valider_commande"])) {
            // Mettez à jour l'état de la commande à "Valide"
            $updateSql = "UPDATE commandes SET etat_commande = 'Valide' WHERE id = :commande_id";
        } elseif (isset($_POST["ignorer_commande"])) {
            // Mettez à jour l'état de la commande à "Annule"
            $updateSql = "UPDATE commandes SET etat_commande = 'Annule' WHERE id = :commande_id";
        }

        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bindParam(':commande_id', $commande_id, PDO::PARAM_INT);
        $updateStmt->execute();

        // Fermez la connexion à la base de données
        $conn = null;
    } catch (PDOException $e) {
        echo 'Erreur de connexion à la base de données: ' . $e->getMessage();
    }

    // Redirigez l'utilisateur vers la page précédente (peut être ajusté en fonction de votre structure)
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}
?>
