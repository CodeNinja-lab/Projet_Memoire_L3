
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
            <h1 class="text-center text-white display-6">Profil de l'Agriculteur</h1>
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
            <div class="col-md-4">
               <!-- Section Photo de Profil -->


                    <style>
                        
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .profile-container {
            max-width: 600px;
            margin: auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        .profile-info {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: rgb(158,203,22);
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>

                 
                <div class="profile-container">
        <h2>Vos Informations</h2>
        <div class="profile-info">
            <p><strong>Nom:</strong> <?php echo isset($_SESSION['nom']) ? $_SESSION['nom'] : ''; ?></p>
            <p><strong>Prénom:</strong> <?php echo isset($_SESSION['prenom']) ? $_SESSION['prenom'] : ''; ?></p>
            <p><strong>Adresse:</strong> <?php echo isset($_SESSION['adresse']) ? $_SESSION['adresse'] : ''; ?></p>
            <p><strong>Numero Telephone:</strong> <?php echo isset($_SESSION['telephone']) ? $_SESSION['telephone'] : ''; ?></p>
            <!-- Ajoutez d'autres informations du profil ici (adresse, téléphone, etc.) -->
        </div>

     <!-- Bouton pour modifier le profil -->
        <button type="button" class="btn btn-primary mb-3">Modifier le Profil</button> 
    </div>
    </br>
    <h2 >Les Commandes</h2>
    <?php

// Connexion à la base de données avec PDO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrimarket";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Activer les exceptions PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
} catch(PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
}

$sql = "SELECT c.id, o.nom AS produit,a.telephone AS Numero, c.quantite, c.login AS acheteur, c.date_commande, c.login2 
        FROM commandes c
        JOIN offres o ON c.produit_id = o.id
        JOIN agriculteur a ON o.login = a.login  -- Ajout de la jointure avec la table agriculteur
        WHERE a.login = :agriculteur_login  -- Filtre par login de l'agriculteur
        ORDER BY c.date_commande DESC";
      $loginAgriculteur=$_SESSION['login'];
$stmt = $conn->prepare($sql);
$stmt->bindParam(':agriculteur_login', $loginAgriculteur, PDO::PARAM_STR);
$stmt->execute();

// Afficher les commandes dans un tableau HTML avec Bootstrap 5
if ($stmt->rowCount() > 0) {
echo '<div class="table-responsive">';
echo '<table class="table table-striped table-hover">';
echo '<thead><tr><th>Produit</th><th>Quantité</th><th>l\'acheteur</th><th>Numero de l\'acheteur</th><th>Date de commande</th><th>Action</th></tr></thead>';
echo '<tbody>';
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
 echo '<tr>';
echo '<td>' . $row["produit"] . '</td>';
echo '<td>' . $row["quantite"] . 'KG</td>';
echo '<td>' . $row["acheteur"] . '</td>';
echo '<td>' . $row["Numero"] . '</td>';
echo '<td>' . $row["date_commande"] . '</td>';
echo '<td>';
  // Bouton Valider
  echo '<form action="update_commande.php" method="post" style="display:inline;">';
  echo '<input type="hidden" name="commande_id" value="' . $row['id'] . '">';
  echo '<button type="submit" class="btn btn-success" name="valider_commande">Valider</button>';
  echo '</form>';
  // Bouton Ignorer
  echo '<form action="update_commande.php" method="post" style="display:inline;">';
  echo '<input type="hidden" name="commande_id" value="' . $row['id'] . '">';
  echo '<button type="submit" class="btn btn-danger" name="ignorer_commande">Ignorer</button>';
  echo '</form>';
echo '</td>';
echo '</tr>';
}
echo '</tbody>';
echo "</table>";
echo "</div>";
} else {
    echo '<p class="text-center">Il n\'existe pas encore de commande pour vos offres.</p>';

}

// Fermer la connexion à la base de données
$conn = null;
?>

            </div>

            <div class="col-md-8">
                <!-- Bouton "Voir Mes Offres" -->
               <h2>Mes Offres</h2>
               <?php


// Vérifier si l'utilisateur est connecté (assurez-vous d'ajuster cela en fonction de votre logique d'authentification)
if (!isset($_SESSION['login'])) {
    // Rediriger vers la page de connexion ou afficher un message d'erreur
    if (isset($_SESSION['login'])) {
        // Générez le lien vers le profil approprié en fonction du type de profil
        if ($_SESSION['login'] === ':acheteur') {
            $lienProfil = 'ProfilaAcheteur.php';
        } elseif ($_SESSION['login'] === ':agriculteur') {
            $lienProfil = 'ProfilAgriculteur.php';
        } else {
            // Gestion d'une éventuelle situation imprévue
            $lienProfil = '#'; // Vous pouvez rediriger vers une page d'erreur ou une autre page par défaut
        }
    } else {
        // Si l'utilisateur n'est pas connecté ou si la variable de session n'est pas définie, redirigez-le vers la page de connexion
        $lienProfil = 'Authentification.html';
    }  
    
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
    $sql = "SELECT nom, categorie, prix_par_kg, images, description,id FROM offres WHERE login = :userLogin";

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
        // Afficher les produits sous forme de divs
        echo '<div class="row">';
foreach ($produits as $produit) {
    echo '<div class="col-md-6 col-lg-6 col-xl-4 mb-4">';
    echo '<div class="rounded position-relative fruite-item">';
    echo '<div class="fruite-img">';
    
    // Afficher la première image (si disponible)
    $images = explode(',', $produit['images']);
    if (!empty($images[0])) {
        echo '<img src="' . $images[0] . '" class="img-fluid w-100 rounded-top" alt="">';
    } else {
        // Si aucune image n'est disponible, vous pouvez afficher une image par défaut
        echo '<img src="chemin_vers_image_par_defaut.jpg" class="img-fluid w-100 rounded-top" alt="">';
    }
    
    echo '</div>';
    echo '<div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">' . $produit['categorie'] . '</div>';
    echo '<div class="p-4 border border-secondary border-top-0 rounded-bottom">';
    echo '<h4>' . $produit['nom'] . '</h4>';
    echo '<p>' . $produit['description'] . '</p>';
    echo '<div class="d-flex flex-column">'; // Utilisez une disposition en colonne pour les boutons
    echo '<a href="details_produit.php?id=' . $produit['id'] . '" class="btn btn-primary rounded-pill mb-2"><i class="fa fa-info-circle me-2"></i>Détail offre</a>';
    echo '<a href="#" class="btn btn-danger rounded-pill mb-2" onclick="supprimerProduit(' . $produit['id'] . ')"><i class="fa fa-trash me-2"></i>Supprimer offre</a>';
    echo '<a href="modifier_produit.php?id=' . $produit['id'] . '" class="btn btn-success rounded-pill mb-2"><i class="fa fa-edit me-2"></i>Modifier offre</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
echo '</div>';

        
    } else {
        echo '<p>Aucun produit trouvé pour cet utilisateur.</p>';
    } 
}catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Fermer la connexion à la base de données
$conn = null;
?>

                <!-- Bouton "Ajouter offre" -->
                <button type="button" class="btn btn-primary mt-3" onclick="window.location.href='AjoutOffre.html'">Ajouter Une Offre</button>

            </div>
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
    <!-- Ajoutez ces scripts à la fin de votre fichier HTML, avant la balise </body> -->

<!-- Assurez-vous que vous avez inclus jQuery avant ce script -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function modifierProduit(idProduit) {
        // Vous pouvez rediriger vers la page de modification avec l'ID du produit
        window.location.href = 'modifier_produit.php?id=' + idProduit;
    }

    function supprimerProduit(idProduit) {
        // Demander une confirmation avant la suppression
        if (confirm('Êtes-vous sûr de vouloir supprimer ce produit?')) {
            // Effectuer une requête AJAX pour supprimer le produit côté serveur
            $.ajax({
                type: 'POST',
                url: 'supprimer_produit.php', // Remplacez par le fichier qui gère la suppression côté serveur
                data: { id: idProduit },
                success: function(response) {
                    // Réponse du serveur après la suppression réussie
                    console.log(response);
                    // Vous pouvez actualiser la page ou mettre à jour la table des produits ici
                    // Par exemple, si vous souhaitez actualiser la page, utilisez :
                     window.location.reload();
                },
                error: function(error) {
                    // Gérer les erreurs ici
                    console.error(error);
                }
            });
        }
    }
</script>

    </body>

</html>