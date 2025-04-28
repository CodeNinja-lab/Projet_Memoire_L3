<?php
// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'identifiant de l'utilisateur depuis la session
    session_start();
    $loginUtilisateur = isset($_SESSION['login']) ? $_SESSION['login'] : null;
    // Récupérer les autres données du formulaire
    $nomOffre = $_POST["nom"];
    $categorieOffre = $_POST["categorie"];
    $prixKgOffre = $_POST["prixKgOffre"];
    $descriptionOffre = $_POST["descriptionOffre"];

    // Traitement des images
    $imagesOffre = [];
    $targetDirectory = "uploads/"; // Répertoire de téléchargement des images

    foreach ($_FILES["imagesOffre"]["tmp_name"] as $key => $tmp_name) {
        $fileName = $_FILES["imagesOffre"]["name"][$key];
        $targetPath = $targetDirectory . $fileName;

        // Déplacer l'image téléchargée vers le répertoire de destination
        move_uploaded_file($tmp_name, $targetPath);

        // Stocker le chemin de l'image dans le tableau des images
        $imagesOffre[] = $targetPath;
    }

    // Enregistrer les données dans la base de données en utilisant PDO
    $host = "localhost";
    $dbname = "agrimarket";
    $username = "root";
    $password = "";

    try {
        // Créer une connexion à la base de données avec PDO
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        // Définir le mode d'erreur PDO sur exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL pour insérer les données dans la table des offres (ajustez cela en fonction de votre schéma de base de données)
        $sql = "INSERT INTO offres (nom, categorie, prix_par_kg, images, description, login) VALUES (?, ?, ?, ?, ?, ?)";

        // Préparer la requête
        $stmt = $conn->prepare($sql);

        // Exécuter la requête avec les valeurs liées
        $stmt->execute([$nomOffre, $categorieOffre, $prixKgOffre, implode(",", $imagesOffre), $descriptionOffre,$loginUtilisateur]);

        header("Location: ProfilAgriculteur.php");
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'offre : " . $e->getMessage();
    }

    // Fermer la connexion à la base de données
    $conn = null;
}
?>
