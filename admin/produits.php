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

// Now you can use the $conn variable to query the database
$sql = "SELECT * FROM produits";
$result = $conn->query($sql);
$sql = "SELECT * FROM produits";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // Affichage des produits
    echo "<table>";
    echo "<tr><th>Nom</th><th>Description</th><th>Prix</th><th>Actions</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nom"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["prix"] . "</td>";
        echo "<td><a href='modifier_produits.php?id=" . $row["id"] . "'>Modifier</a> | <a href='supprimer_produits.php?id=" . $row["id"] . "'>Supprimer</a></td>";    }
    echo "</table>";
} else {
    echo "Aucun produit trouvé";
}
?>

<!-- Button to add a new product -->
<div class="boutons">
<a href="ajouter_produits.php">
    <button class="btn-retour">Ajouter un nouveau produit</button>
</a>
<a href="admin_interface.php"><button>Retour</button></a>
</div>

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

table {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 20px;
}

th, td {
  border: 1px solid #ddd;
  padding: 10px;
  text-align: left;
}

th {
  background-color: #4CAF50;
  color: #ffffff;
}

td {
  background-color: #ffffff;
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

