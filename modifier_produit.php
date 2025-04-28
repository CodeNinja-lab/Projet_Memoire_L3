<?php
// modifier_produit.php

// Vérifiez si l'ID du produit est présent dans la requête
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idProduit = $_GET['id'];

    // Récupérez les informations sur le produit à partir de la base de données
    // Vous devrez adapter cela en fonction de votre base de données et de votre logique d'application
    $host = "localhost";
    $dbname = "agrimarket";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM offres WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $idProduit, PDO::PARAM_INT);
        $stmt->execute();

        $produit = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Erreur de récupération du produit: ' . $e->getMessage();
    }

    $conn = null;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>
    <!-- Ajout des liens CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 50px;
        }

        form {
            max-width: 600px;
            margin: auto;
        }

        .mb-3 {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mb-4 text-center">Modifier Produit</h2>

    <form action="modifier_produit_traitement.php" method="post">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom du Produit:</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $produit['nom']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="categorie" class="form-label">Catégorie du Produit:</label>
            <input type="text" class="form-control" id="categorie" name="categorie" value="<?php echo $produit['categorie']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="prix_par_kg" class="form-label">Prix par KG:</label>
            <input type="text" class="form-control" id="prix_par_kg" name="prix_par_kg" value="<?php echo $produit['prix_par_kg']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <input type="text" class="form-control" id="description" name="description" value="<?php echo $produit['description']; ?>" required>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>

            <!-- Bouton Annuler avec JavaScript pour revenir à la page précédente -->
            <a href="javascript:history.go(-1)" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>

<!-- Ajout du script JavaScript de Bootstrap 5 (popper.js et Bootstrap JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyGmR4N7A9UJFhR/6D60bQ" crossorigin="anonymous"></script>

</body>
</html>



<?php
} else {
    echo 'ID du produit non valide.';
}
?>
