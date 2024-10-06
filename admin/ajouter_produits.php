<header>
        <nav>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="produits.php">Produits</a></li>
                <li><a href="commande.php">Commande</a></li>
                <li><a href="administrateur.php">Administrateur</a></li>
            </ul>
        </nav>
    </header>

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
        <input required type="text" id="nom" name="nom"><br><br>
        <label for="description">Description :</label>
        <textarea required id="description" name="description"></textarea><br><br>
        <label for="prix">Prix :</label>
        <input required type="number" id="prix" name="prix"><br><br>
        <label for="categorie">Catégorie :</label>
        <div class="select-container"></div>
        <select id="categorie" name="categorie">
            <?php foreach ($categories as $id => $nom) { ?>
                <option value="<?php echo $id; ?>"><?php echo $nom; ?></option>
            <?php } ?>
        </select><br><br>
        </div>
        <div class="boutons">
  <button>Ajouter un nouveau produit</button>
  <a href="produits.php"><button type="button" form="none" onclick="history.back()">Retour</button>
  </a>
</div>
    </form>
    <?php
}
?>
<footer>
        <p>&copy; 2023 - Tous droits réservés</p>
</footer>

<style>
   body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  margin: 0;
  padding: 0;
}

header {
  background-color: #333;
  color: #fff;
  padding: 1em;
  text-align: center;
  margin-bottom: 20px;
}

nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: space-between;
}

nav li {
  margin-right: 20px;
}

nav a {
  color: #fff;
  text-decoration: none;
}

form {
  width: 50%;
  margin: 40px auto;
  padding: 20px;
  background-color: #f2f2f2;
  border: 1px solid #ddd;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form label {
  display: block;
  margin-bottom: 10px;
}

form input, form textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

form input[type="submit"] {
  background-color: #4CAF50;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

form input[type="submit"]:hover {
  background-color: #3e8e41;
}

form .boutons {
  text-align: center;
  margin: 20px 0;
}

form .boutons button {
  margin: 0 10px;
}

select {
  width: 100px; /* Augmenter la largeur du champ de sélection */
  height: 40px;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

option {
  font-size: 18px;
  padding: 10px;
}

.select-container {
  display: flex;
  align-items: center;
}

.select-container select {
  margin-right: 20px;
}

button, .btn-retour {
  background-color: #4CAF50;
  color: #ffffff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  font-weight: bold;
  margin: 0 10px;
  display: inline-block;
}

button:hover, .btn-retour:hover {
  background-color: #3e8e41;
  color: #ffffff;
}

a {
  text-decoration: none;
  color: #4CAF50;
}

a:hover {
  color: #3e8e41;
}

footer {
  background-color: #333;
  color: #fff;
  padding: 1em;
  text-align: center;
  margin-top: 20px;
  clear: both;
}

.boutons {
  text-align: center;
  margin: 20px 0;
}

.boutons button, .boutons .btn-retour {
  margin: 0 10px;
}
</style>