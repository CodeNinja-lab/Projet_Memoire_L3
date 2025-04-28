<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Liste des Messages</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: #ffffff;
        }

        .card-body {
            padding: 20px;
        }

        .message-container {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Liste des Messages
                    </div>
                    <div class="card-body">
                        <?php
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

                            // Requête SQL pour récupérer tous les messages
                            $selectQuery = "SELECT * FROM message ORDER BY id DESC";
                            $stmtSelect = $conn->prepare($selectQuery);
                            $stmtSelect->execute();
                            $messages = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

                            if ($messages) {
                                // Affichage de tous les messages
                                foreach ($messages as $message) {
                                    echo "<div class='mb-3'>";
                                    echo "<p><strong>Nom:</strong> {$message['nom']}</p>";
                                    echo "<p><strong>Email:</strong> {$message['mail']}</p>";
                                    echo "<p><strong>Message:</strong> {$message['message']}</p>";
                                    echo "</div>";
                                }
                            } else {
                                echo "Aucun message trouvé.";
                            }
                        } catch (PDOException $e) {
                            echo "Erreur de récupération : " . $e->getMessage();
                        } finally {
                            // Fermeture de la connexion
                            $conn = null;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
