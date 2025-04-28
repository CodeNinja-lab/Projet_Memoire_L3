<?php
// Informations de connexion à la base de données
$host = "localhost"; // Remplacez par le nom de votre hôte (par exemple, "localhost")
$dbname = "agrimarket";
$username = "root";
$password = "";

try {
    // Création de la connexion PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Configuration pour générer des exceptions en cas d'erreurs SQL
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $region = $_POST['region'];
    $utilisateur = $_POST['utilisateur'];
    $motdepasse = $_POST['motdepasse']; // Mot de passe en texte brut

    // Vérification si le login est déjà utilisé
    $checkLoginQuery = "SELECT COUNT(*) FROM agriculteur WHERE login = ?";
    $stmtCheckLogin = $conn->prepare($checkLoginQuery);
    $stmtCheckLogin->execute([$utilisateur]);
    $loginCount = $stmtCheckLogin->fetchColumn();

    if ($loginCount > 0) {
        // Le login est déjà utilisé, informer l'utilisateur avec une alerte JavaScript
        echo "<script>
            alert('Le login est déjà utilisé. Veuillez choisir un autre login.');
            window.location.href = 'Agriculteur.html'; // Remplacez par le chemin de la page vers laquelle vous souhaitez rediriger l'utilisateur
        </script>";
    } else {
        // Requête SQL pour l'insertion des données avec une requête préparée
        $insertQuery = "INSERT INTO agriculteur (nom, prenom, address, telephone, region, login, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmtInsert = $conn->prepare($insertQuery);

        // Liaison des paramètres
        $stmtInsert->bindParam(1, $nom);
        $stmtInsert->bindParam(2, $prenom);
        $stmtInsert->bindParam(3, $adresse);
        $stmtInsert->bindParam(4, $telephone);
        $stmtInsert->bindParam(5, $region);
        $stmtInsert->bindParam(6, $utilisateur);
        $stmtInsert->bindParam(7, $motdepasse); // Insérer le mot de passe en texte brut

        // Exécution de la requête préparée
        $stmtInsert->execute();

        // Redirection vers la page de connexion
        header("Location: Authentification.html");
        exit(); // Assure la fin de l'exécution du script après la redirection
    }
} catch (PDOException $e) {
    echo "Erreur d'enregistrement : " . $e->getMessage();
} 
?>
