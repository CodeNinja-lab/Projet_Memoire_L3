<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $messageText = $_POST["message"];

    // Informations de connexion à la base de données
    $host = "localhost"; // Remplacez par le nom de votre hôte
    $dbname = "agrimarket";
    $username = "root";
    $password = "";

    try {
        // Création de la connexion PDO
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        // Configuration pour générer des exceptions en cas d'erreurs SQL
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL pour l'insertion des données avec une requête préparée
        $insertQuery = "INSERT INTO message (nom, mail, message) VALUES (?, ?, ?)";
        $stmtInsert = $conn->prepare($insertQuery);

        // Liaison des paramètres
        $stmtInsert->bindParam(1, $nom);
        $stmtInsert->bindParam(2, $email);
        $stmtInsert->bindParam(3, $messageText);

        // Exécution de la requête préparée
        $stmtInsert->execute();
        echo "<script>
            alert('On a bien recu votre message.');
            window.location.href = 'contact.html'; // Remplacez par le chemin de la page vers laquelle vous souhaitez rediriger l'utilisateur
        </script>";

    } catch (PDOException $e) {
        echo "Erreur d'enregistrement : " . $e->getMessage();
    } finally {
        // Fermeture de la connexion (facultatif, car PDO ferme automatiquement la connexion à la fin du script)
        $conn = null;
    }
}
?>
