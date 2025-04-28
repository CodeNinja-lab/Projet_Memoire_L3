<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrimarket";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Activer les exceptions PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $commandeId = $_POST['commande_id']; // Supposons que vous recevez l'identifiant de la commande à supprimer depuis un formulaire par exemple
    $sql= "DELETE FROM commandes WHERE id = :commande_id";
    $stmt = $conn->prepare($sql);

    // Lier le paramètre
    $stmt->bindParam(':commande_id', $commandeId, PDO::PARAM_INT);

    // Exécuter la requête
    $stmt->execute();
    echo"vous avez bien annuler votre commande";
   
} catch(PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}

?>