 
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="menu.css">
    <title>Menu</title>
</head>
<body>
    <header>
        <!-- BARRE DE MENU AVEC LES ONGLETS -->
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
        include 'db.php'; // assume this file has your database connection details

// Créer une connexion
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM produits");

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["nom"]." - Description : ".$row["description"]." - Prix : ".$row["prix"]."<br>";
    }
} else {
    echo "Aucun résultat";
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