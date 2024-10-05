<!-- index.html -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Admin</title>
    <link rel="stylesheet" href="admin_interface.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="produits.php">Produits</a></li>
                <li><a href="#">Paramètres</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h1>Bienvenue sur l'interface d'administration</h1>
            
        </section>

        <?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stromboli";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
?>

    </main>
    <footer>
        <p>&copy; 2023 - Tous droits réservés</p>
    </footer>
</body>
</html>
