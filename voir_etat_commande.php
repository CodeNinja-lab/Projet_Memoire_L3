<?php
// Connexion à la base de données
$servername = "localhost";
$dbname = "agrimarket";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si l'identifiant de la commande est envoyé via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["commande_id"])) {
        $commandeId = $_POST["commande_id"];

        // Requête pour obtenir l'état de la commande
        $sql = "SELECT etat_commande FROM commandes WHERE id = :commande_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':commande_id', $commandeId);
        $stmt->execute();

        // Afficher l'état de la commande
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "L'état de la commande est : " . $row['etat_commande'];
        } else {
            echo "Aucun résultat trouvé pour cet identifiant de commande.";
        }
    } else {
        echo "Erreur : Identifiant de commande manquant.";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
}
?>
