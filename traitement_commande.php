<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['login'])) {
    $loginAcheteur = $_SESSION['login'];

    $host = "localhost";
    $dbname = "agrimarket";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer les données du formulaire
        $produitId = $_POST['produit_id'];
        $quantite = $_POST['quantite'];
        $adresseLivraison = $_POST['adresse'];

        // Récupérer les informations du produit
        $getProduitQuery = "SELECT * FROM offres WHERE id = :produit_id";
        $getProduitStmt = $conn->prepare($getProduitQuery);
        $getProduitStmt->bindParam(':produit_id', $produitId, PDO::PARAM_INT);
        $getProduitStmt->execute();
        $produit = $getProduitStmt->fetch(PDO::FETCH_ASSOC);
        $agriculteur=$produit['login'];
        if ($produit) {
         

            // Insérer la commande dans la table commandes
            $insertCommandeQuery = "INSERT INTO commandes (login, produit_id, quantite, adresse_livraison,login2) VALUES (:acheteur_login, :produit_id, :quantite, :adresse_livraison,:login2)";
            $insertCommandeStmt = $conn->prepare($insertCommandeQuery);
            $insertCommandeStmt->bindParam(':acheteur_login', $loginAcheteur, PDO::PARAM_STR);
            $insertCommandeStmt->bindParam(':produit_id', $produitId, PDO::PARAM_INT);
            $insertCommandeStmt->bindParam(':quantite', $quantite, PDO::PARAM_INT);
            $insertCommandeStmt->bindParam(':adresse_livraison', $adresseLivraison, PDO::PARAM_STR);
            $insertCommandeStmt->bindParam(':login2', $agriculteur, PDO::PARAM_STR);
            $insertCommandeStmt->execute();

            echo "<script>
            alert( 'Commande enregistrée avec succès.');
            window.location.href = 'ProfilAcheteur.php'; // Remplacez par le chemin de la page vers laquelle vous souhaitez rediriger l'utilisateur
        </script>";
        } else {
            echo 'Produit non trouvé.';
        }
    } catch (PDOException $e) {
        echo 'Erreur de connexion à la base de données: ' . $e->getMessage();
    } finally {
        $conn = null;
    }
} else {
    echo 'Une erreur s\'est produite lors du traitement de votre commande.';
}
?>
