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
    echo "<input type='button' value='Modifier' onclick='modifierProduit()'>";
    echo "<a href='produits.php'><input type='button' value='Retour'></a>";
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