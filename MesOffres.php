
<?php
// Démarrer la session si elle n'est pas déjà démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>AgriMarket -Inscription d'un agriculteur</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- debut navigation -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Ucad, Senegal</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">agrimarket@gmail.com</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="confidentialite.html" class="text-white"><small class="text-white mx-2">Politique de confidentialité</small>/</a>
                        <a href="utilisation.html" class="text-white"><small class="text-white mx-2">Conditions d'utilisation</small>/</a>
                        <a href="#" class="text-white"><small class="text-white ms-2">Ventes et Remboursements</small></a>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <img src="img/logo1.jpg" alt="Logo AgriMarket" class="logo-img" style="width: 100px; height: auto;">
                    <a href="Accueil.html" class="navbar-brand"><h1 class="text-primary display-6">AgriMarket</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="Accueil.html" class="nav-item nav-link active">Accueil</a>
                            
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">S'inscrire</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                   
                                    <a href="Acheteur.html" class="dropdown-item">Acheteur</a>
                            
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                          
                           
                                 </a>
                                 <div class="text-center">
                                    <a href="Authentification.html" class="my-auto">
                                        <i class="fas fa-user fa-2x"></i>
                                    </a>
                                    <div class="mt-2">Deconnexion</div>
                                </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Fin barNavigation -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rechercher</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="Rechercher" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Mes Offres</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="Accueil.html">Accueil</a></li>
                <li class="breadcrumb-item"><a href="Authentification.html">Retour</a></li>
                <li class="breadcrumb-item active text-white">Pages</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


<!-- Profil de l'agriculteur Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
       
        <?php


// Vérifier si l'utilisateur est connecté (assurez-vous d'ajuster cela en fonction de votre logique d'authentification)
if (!isset($_SESSION['login'])) {
    // Rediriger vers la page de connexion ou afficher un message d'erreur
    header("Location: login.php");
    exit();
}

// Récupérer le nom d'utilisateur à partir de la session
$userLogin = $_SESSION['login'];

// Connexion à la base de données
$host = "localhost";
$dbname = "agrimarket";
$username = "root";
$password = "";

try {
    // Créer une connexion à la base de données avec PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Définir le mode d'erreur PDO sur exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour sélectionner tous les produits de l'utilisateur actuel
    $sql = "SELECT nom, categorie, prix_par_kg, images, description FROM offres WHERE login = :userLogin";

    // Préparer la requête
    $stmt = $conn->prepare($sql);

    // Lier le paramètre
    $stmt->bindParam(':userLogin', $userLogin, PDO::PARAM_STR);

    // Exécuter la requête
    $stmt->execute();

    // Récupérer les résultats
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Vérifier s'il y a des produits
    if ($produits) {
        // Afficher la table des produits
        echo '<h2 class="mt-5">Produits ajoutés par l\'utilisateur</h2>';
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Nom</th>';
        echo '<th scope="col">Catégorie</th>';
        echo '<th scope="col">Prix par Kg</th>';
        echo '<th scope="col">Images</th>';
        echo '<th scope="col">Description</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($produits as $produit) {
            echo '<tr>';
            echo '<td>' . $produit['nom'] . '</td>';
            echo '<td>' . $produit['categorie'] . '</td>';
            echo '<td>' . $produit['prix_par_kg'] . '</td>';
            echo '<td><img src="' . $produit['images'] . '" alt="Image du produit"></td>';
            echo '<td>' . $produit['description'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>Aucun produit trouvé pour cet utilisateur.</p>';
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Fermer la connexion à la base de données
$conn = null;
?>
            
            
        </div>
    </div>
</div>
<!-- Profil de l'agriculteur End -->

        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#">
                            <h1 class="text-primary mb-0">AgriMarket</h1>
                            <p class="text-secondary mb-0">Fruits & Légumes Frais</p>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <!-- Suppression de la barre de recherche -->
                    </div>
                    <!-- Suppression des boutons de médias sociaux -->
                </div>
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Optimisation de la Commercialisation</h4>
                            <p class="mb-4">Nous nous engageons à maximiser la visibilité de vos produits agricoles sur le marché. Notre approche moderne de la commercialisation garantit une exposition efficace et des opportunités de croissance pour votre activité.</p>
                            <a href="#" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Découvrir nos services</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Informations sur la boutique</h4>
                            <a class="btn-link" href="">À propos de nous</a>
                            <a class="btn-link" href="">Contactez-nous</a>
                            <a class="btn-link" href="">Politique de confidentialité</a>
                            <a class="btn-link" href="">Conditions générales</a>
                            <a class="btn-link" href="">Politique de retour</a>
                            <a class="btn-link" href="">FAQs & Aide</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Compte</h4>
                            <a class="btn-link" href="">Mon compte</a>
                            <a class="btn-link" href="">Détails de la boutique</a>
                            <a class="btn-link" href="">Panier d'achat</a>
                            <a class="btn-link" href="">Liste de souhaits</a>
                            <a class="btn-link" href="">Historique des commandes</a>
                            <a class="btn-link" href="">Commandes internationales</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Contact</h4>
                            <p>Adresse: UCAD, Département de Mathématiques et Informatique, Sénégal</p>
                            <p>Email: mbaye28@gmail.com (Mbaye Ndiaye), fatima98@gmail.com (Fatima Kasse)</p>
                            <p>Téléphone: +221 78 362 95 62 (Mbaye Ndiaye), +221 76 466 57 83 (Fatima Kasse)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>