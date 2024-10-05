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
<a href="ajouter_produits.php">
    <button>Ajouter un nouveau produit</button>
</a>

<style>
    button {
        background-color: #4CAF50;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    button:hover {
        background-color: #3e8e41;
    }
</style>

