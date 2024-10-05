<?php
session_start();

// Define database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stromboli";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle product addition
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO produits (nom, description, prix) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $_POST["nom"], $_POST["description"], $_POST["prix"]);
    $stmt->execute();

    $_SESSION["message"] = "Produit enregistré avec succès !";
    header("Location: ".$_SERVER["PHP_SELF"]); // Redirige vers la même page
    exit;
}


// Afficher le message de confirmation si disponible
if (isset($_SESSION["message"])) {
    echo "<p style='color: green;'>".$_SESSION["message"]."</p>";
    unset($_SESSION["message"]); // Supprimer le message après affichage
    ?>
    <br>
    <a href="produits.php"><button type="button">Retour</button></a>
    <?php
} else {
    // Form to add a product
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom"><br><br>
        <label for="description">Description :</label>
        <textarea id="description" name="description"></textarea><br><br>
        <label for="prix">Prix :</label>
        <input type="number" id="prix" name="prix"><br><br>
        <input type="submit" value="Ajouter">
    </form>
    <?php
}