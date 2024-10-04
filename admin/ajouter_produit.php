<form action="inserer_produit.php" method="POST">

    <label for="nom">nom</label>
    <input type="text" name="nom" id="nom" />

    <label for="categorie_select">Choisir la catégorie:</label>

<select name="categorie" id="categorie_select">
  <option value="">--Please choose an option--</option>
  <option value="plat">Plat</option>
  <option value="boisson">Boisson</option>
  <option value="desert">Dessert</option>
 
</select>

    <label for="description">description</label>
    <input type="text" name="description" id="description" />

    <label for="prix">prix</label>
    <input type="number" name="prix" id="prix" />

    <input type="submit" value="AJOUTER" class="submit" />



</form>


<?php 
    // Configuration de la base de données
    $host = 'localhost'; // Adresse du serveur
    $dbname = 'test_profil'; // Nom de la base de données
    $username = 'root'; // Nom d'utilisateur
    $password = ''; // Mot de passe

     // Connexion à la base de données avec PDO
     $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8"; // DSN
     $pdo = new PDO($dsn, $username, $password);

     $sqlQuery = 'INSERT INTO produits(nom, description, prix, id) VALUES (:nom, :description, :prix, :id)';


     // Exécution de la requête avec la méthode query
     $stmt = $pdo->query($sql_Query);

?>