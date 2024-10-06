<body>
    

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
   <main> 
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

// Récupérer l'ID du produit à supprimer
$id = $_GET['id'];

// Récupérer les données du produit à supprimer
$sql = "SELECT * FROM produits WHERE id = '$id'";
$result = $conn->query($sql);

// Vérifier si le résultat est valide
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Afficher les données du produit à supprimer
    echo "<p>Vous êtes sur le point de supprimer le produit suivant :</p>";
    echo "<p>Nom : " . $row['nom'] . "</p>";
    echo "<p>Description : " . $row['description'] . "</p>";
    echo "<p>Prix : " . $row['prix'] . "</p>";
    echo "<p>Catégorie : " . $row['id_catg'] . "</p>";

    echo "<p>Voulez-vous vraiment supprimer ce produit ?</p>";
    echo "<a href='?action=delete&id=$id' class='supprimer' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer ce produit ?\")'>Supprimer</a>";
    echo "<a href='produits.php' class='retour'>Retour</a>";
} else {
    echo "Produit non trouvé";
}

// Traitement des données du produit à supprimer
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $sql = "DELETE FROM produits WHERE id = '$id'";
    $conn->query($sql);

    // Redirection vers la page produits.php
    header("Location: produits.php");
    exit;
}

?>
</main>
<footer>
        <p>&copy; 2023 - Tous droits réservés</p>
</footer>
</body>

<style>

body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  margin: 0;
  padding: 0;
  overflow: hidden;
  padding-bottom: 50px; /* ajuster la valeur en fonction de la hauteur du footer */
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

main {
  border: solid 1px black;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 50px; /* ajuster la valeur en fonction de la hauteur du footer */
}

main a {
  text-decoration: none;
  color: #ffffff;
  margin: 10px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #4CAF50;
  text-align: center;
  width: 200px; /* ajuster la largeur en fonction de vos besoins */
}

main a:hover {
    background-color: #3e8e41;
    color: #ffffff;
}

main p {
  margin-bottom: 10px;
  font-size: 16px;
  color: #333;
  font-family: Arial, sans-serif;
  line-height: 1.5;
  text-align: center;
}

footer {
  background-color: #333;
  padding: 10px;
  text-align: center;
  height: 50px; /* ajuster la valeur en fonction de la hauteur du footer */
  position: absolute;
  bottom: 0;
  width: 100%;
}
footer p {
    color: white;
}

</style>