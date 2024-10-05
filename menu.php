 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/css productCards/productCards.css">
    <link rel="stylesheet" href="/cadrepresentation/cadreGauche.css">
    <link rel="stylesheet" href="/footerCss/footerStyle.css">
   <script src="https://kit.fontawesome.com/677558f9a4.js" crossorigin="anonymous"></script>
    <title>Accueil</title>
    <!-- font google pour titre h1 stromboli -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <!-- google font pour paragraphe dans encadré jaune -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+DE+Grund:wght@100..400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="menu.css">
    <title>Menu</title>
</head>
<body>
    <header>
        <!-- BARRE DE MENU AVEC LES ONGLETS -->

        <img src="connexion/img/logo.png" alt="logoStromboli" id="logoStromboli" width=100px>
        <nav class="barreNav">
            <li><a href="/Presentation/index.html#ancreAccueil">Accueil</a></li>
            <li><a href="/">Menu</a></li>
            <li><a href="/page3SuggestionChef/page3Suggestion.html#ancreSuggestion">Suggestion du Chef</a></li>
            <li><a href="/page4Horaires/page4Horaires.html#ancreHoraires">Horaires</a></li>
            <li><a href="/pageContactHtml/page5Contact.html#pageContact">Nous contacter</a></li>
            <li><a href="/page6LivreDor/livreDOr.html#ancreLivreDOr">Livre d'or</a></li>
        </nav>
    </header>


    <!-- Votre contenu HTML -->
<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'stromboli'; 

// Créer une connexion
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

$result = $conn->query("SELECT p.id, p.nom AS produit_nom, c.nom AS categorie_nom, p.description, p.prix
                         FROM produits p
                         JOIN catg_produits c ON p.id_catg = c.id_catg
                         ORDER BY c.id_catg");

if (!$result) {
    echo "Erreur : " . $conn->error;
} else {
    $categorieActuelle = "";

    echo '<div class="product-list">';
    while($row = $result->fetch_assoc()) {
        if ($row["categorie_nom"] != $categorieActuelle) {
            $categorieActuelle = $row["categorie_nom"];
            echo '</div><h2>' . $row["categorie_nom"] . '</h2><div class="product-list">';
        }

        echo '<div class="product-card" style="display: inline-block; margin: 10px;">';
        echo '<img src="images/' . $row["photo"] . '" alt="' . $row["produit_nom"] . '">'; // Afficher l'image        
        echo '<p>' . $row["produit_nom"] . '</p>';
        echo '<p>' . $row["description"] . '</p>';
        echo '<p>Prix : ' . $row["prix"] . '</p>';
        echo '</div>';
    }
    echo '</div>';
}
// close the connection
mysqli_close($conn);
?>
    

    <footer>
            <div class="containerAdresse">
                <i class="fa-solid fa-location-dot"></i>
                <p id="nomLocation">Location</p>
                <p id="adresseParagraphe">Restaurant Stromboli, 34 Av Charles Boutet <br>
                    08000 Charleville-Mézières</p>
            </div>



            <div class="iconContainer">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
            </div>

            <div>
            <p id="copyright">Copyright 2024</p>
            </div>
        </footer>
</body>
</html>