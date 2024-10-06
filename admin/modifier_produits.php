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
try {
    $db = new PDO('mysql:host=localhost;dbname=stromboli', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
    exit();
}
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer l'ID du produit à modifier
$id = $_GET['id'];

// Récupérer les données du produit à modifier
$sql = "SELECT * FROM produits WHERE id = '$id'";
$result = $conn->query($sql);

// Vérifier si le résultat est valide
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Afficher les données du produit à modifier
    echo "<form action='' method='post'>";
    echo "<label>Nom :</label>";
    echo "<input type='text' name='nom' value='" . $row['nom'] . "'>";
    echo "<br>";
    echo "<label>Description :</label>";
    echo "<textarea name='description'>" . $row['description'] . "</textarea>";
    echo "<br>";
    echo "<label>Prix :</label>";
    echo "<input type='number' name='prix' value='" . $row['prix'] . "'>";
    echo "<br>";
    echo "<label>Catégorie :</label>";
    echo "<select name='id_catg'>";
    echo "<option value='1'>Plat</option>";
    echo "<option value='2'>Boisson</option>";
    echo "<option value='3'>Dessert</option>";
    echo "</select>";
    echo "<br>";
    echo '<script>
            function modifierProduit() {
                if (confirm("Êtes-vous sûr de vouloir modifier ce produit ?")) {
                    document.forms[0].submit();
                } else {
                    window.location.href = "produits.php";
                }
            }
        </script>';
        echo "<a href='#' onclick='modifierProduit()'>Modifier</a>";
        echo "<a href='produits.php' class='retour'>Retour</a>";
    echo "</form>";
} else {
    echo "Produit non trouvé";
}

// Traitement des données du produit à modifier
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $id_catg = $_POST['id_catg'];

    // Vérifier si le produit existe déjà
    $sql_check = "SELECT * FROM produits WHERE nom = '$nom' AND id_catg = '$id_catg' AND id != '$id'";
    $result_check = $conn->query($sql_check);

    if (!$result_check->num_rows > 0) {
        // Le produit n'existe pas, on l'insère
        $sql = "UPDATE produits SET nom = ?, description = ?, prix = ?, id_catg = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $nom, $description, $prix, $id_catg, $id);
        $stmt->execute();

        // Afficher un message de succès
        echo "<p>Produit modifié avec succès !</p>";

        // Redirection vers la page produits.php
        header("Location: produits.php");
        exit;
    } else {
        echo "Produit déjà existant";
    }
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

main a {
    margin: 10px;
    padding: 10px;
}

main form {
  font-family: Arial, sans-serif;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 20px 0;
}

main form label {
  margin-bottom: 10px;
  font-size: 16px;
  color: #333;
  font-family: Arial, sans-serif;
  line-height: 1.5;
  text-align: center;
}

main form input, main form textarea {
  font-family: Arial, sans-serif;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f7f7f7;
  width: 300px; /* ajuster la largeur en fonction de vos besoins */
  margin-bottom: 20px;
}

main form input[type="submit"] {
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

main form input[type="submit"]:hover {
  background-color: #3e8e41;
  color: #ffffff;
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