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

// Retrieve categories from the database
$stmt = $conn->prepare("SELECT DISTINCT id_catg, nom FROM catg_produits");
$stmt->execute();
$result = $stmt->get_result();
$categories = array(); // Initialize the $categories array
while ($row = $result->fetch_assoc()) {
    $categories[$row['id_catg']] = $row['nom'];
}
$categories = array_unique($categories); // Remove duplicates from the $categories array


// Handle product addition
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO produits (nom, description, prix, id_catg) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $_POST["nom"], $_POST["description"], $_POST["prix"], $_POST["categorie"]);
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
        <label for="categorie">Catégorie :</label>
        <select id="categorie" name="categorie">
            <?php foreach ($categories as $id => $nom) { ?>
                <option value="<?php echo $id; ?>"><?php echo $nom; ?></option>
            <?php } ?>
        </select><br><br>
        <input type="submit" value="Ajouter">
    </form>
    <?php
}
?>