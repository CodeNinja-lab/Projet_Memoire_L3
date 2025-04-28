<?php
session_start(); // Démarrer la session
// Informations de connexion à la base de données
$host = "localhost";
$dbname = "agrimarket";
$username = "root";
$password = "";

try {
    // Création de la connexion PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Configuration pour générer des exceptions en cas d'erreurs SQL
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérification dans la table "agriculteur"
    $agriculteurQuery = "SELECT * FROM agriculteur WHERE login = ?";
    $stmtAgriculteur = $conn->prepare($agriculteurQuery);
    $stmtAgriculteur->execute([$username]);
    $agriculteur = $stmtAgriculteur->fetch(PDO::FETCH_ASSOC);

    if ($agriculteur) {
         if ($password === $agriculteur['password']) {
            $_SESSION['login'] = $username; // Enregistrez le login dans la session
            $_SESSION['nom'] = $agriculteur['nom'];
            $_SESSION['prenom'] = $agriculteur['prenom'];
            $_SESSION['adresse'] = $agriculteur['address'];
            $_SESSION['telephone'] = $agriculteur['telephone'];
             // Redirection vers la page de profil agriculteur
             header("Location: ProfilAgriculteur.php");
             exit(); // Assure la fin de l'exécution du script après la redirection
         } else {
            echo "<script>
            alert('Mot de passe incorrect.');
            window.location.href = 'Authentification.html'; // Remplacez par le chemin de la page vers laquelle vous souhaitez rediriger l'utilisateur
        </script>";
         }
    } else {
        // Vérification dans la table "acheteur"
        $acheteurQuery = "SELECT * FROM acheteur WHERE login = ?";
        $stmtAcheteur = $conn->prepare($acheteurQuery);
        $stmtAcheteur->execute([$username]);
        $acheteur = $stmtAcheteur->fetch(PDO::FETCH_ASSOC);

        if ($acheteur) {
            if ($password === $acheteur['password']) {
                // Redirection vers la page de profil acheteur
                $_SESSION['login'] = $username;
                $_SESSION['nom'] = $acheteur['nom'];
                $_SESSION['prenom'] = $acheteur['prenom'];
                $_SESSION['adresse'] = $acheteur['address'];
                $_SESSION['telephone'] = $acheteur['telephone'];
                header("Location: ProfilAcheteur.php");
                exit(); // Assure la fin de l'exécution du script après la redirection
            } else {
                echo "<script>
            alert('Mot de passe incorrect.');
            window.location.href = 'Authentification.html'; // Remplacez par le chemin de la page vers laquelle vous souhaitez rediriger l'utilisateur
        </script>";
            }
        } else {
            // Aucun utilisateur trouvé, invitez l'utilisateur à s'inscrire
            echo "<script>
            alert('Aucun utilisateur trouvé. Veuillez vous inscrire.');
            window.location.href = 'Accueil.html'; // Remplacez par le chemin de la page vers laquelle vous souhaitez rediriger l'utilisateur
        </script>";
        }
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
