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
    echo "<form action='' method='post'>";
    echo "<label>Nom :</label>";
    echo "<input type='text' name='nom' value='" . $row['nom'] . "' readonly>";
    echo "<br>";
    echo "<label>Description :</label>";
    echo "<textarea name='description' readonly>" . $row['description'] . "</textarea>";
    echo "<br>";
    echo "<label>Prix :</label>";
    echo "<input type='number' name='prix' value='" . $row['prix'] . "' readonly>";
    echo "<br>";
    echo "<label>Catégorie :</label>";
    echo "<select name='id_catg' disabled>";
    echo "<option value='1'>Plat</option>";
    echo "<option value='2'>Boisson</option>";
    echo "<option value='3'>Dessert</option>";
    echo "</select>";
    echo "<br>";
    echo '<script>
            function supprimerProduit() {
                if (confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")) {
                    document.forms[0].submit();
                } else {
                    window.location.href = "produits.php";
                }
            }
        </script>';
    echo "<input type='button' value='Supprimer' onclick='supprimerProduit()'>";
    echo "<a href='produits.php'><input type='button' value='Retour'></a>";
    echo "</form>";
} else {
    echo "Produit non trouvé";
}

// Traitement des données du produit à supprimer
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "DELETE FROM produits WHERE id = '$id'";
    $conn->query($sql);

    // Afficher un message de succès
    echo "<p>Produit supprimé avec succès !</p>";

    // Redirection vers la page produits.php
    header("Location: produits.php");
    exit;
}

?>