<?php
// Connexion à la base de données (à ajuster selon votre configuration)
$servername = "localhost";
$dbname = "agrimarket";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifie si un des boutons a été cliqué
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifie si le bouton "Valider" a été cliqué
        if (isset($_POST["valider_commande"])) {
            $commandeId = isset($_POST["commande_id"]) ? $_POST["commande_id"] : null;
            if ($commandeId !== null) {
                // Mise à jour de l'état de la commande dans la base de données
                $sql = "UPDATE commandes SET etat_commande = 'validée' WHERE id = :commande_id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':commande_id', $commandeId);
                $stmt->execute();
                // Redirection vers la page de l'agriculteur après traitement
                header("Location: agriculteur.php");
                exit();
            } else {
                echo "Erreur : Identifiant de commande manquant.";
            }
        } 
        // Vérifie si le bouton "Décliner" a été cliqué
        elseif (isset($_POST["ignorer_commande"])) {
            $commandeId = isset($_POST["commande_id"]) ? $_POST["commande_id"] : null;
            if ($commandeId !== null) {
                // Mise à jour de l'état de la commande dans la base de données
                $sql = "UPDATE commandes SET etat_commande = 'déclinée' WHERE id = :commande_id";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':commande_id', $commandeId);
                $stmt->execute();
                // Redirection vers la page de l'agriculteur après traitement
                header("Location: agriculteur.php");
                exit();
            } else {
                echo "Erreur : Identifiant de commande manquant.";
            }
        }
    }

} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données: ' . $e->getMessage();
}

?>
