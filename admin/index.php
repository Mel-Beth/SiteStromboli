<?php
header('Location: connexion_admin.html');
exit;
?>

<?php 
    // Configuration de la base de données
    $host = 'localhost'; // Adresse du serveur
    $dbname = 'stromboli'; // Nom de la base de données
    $username = 'root'; // Nom d'utilisateur
    $password = ''; // Mot de passe

  

        // Connexion à la base de données avec PDO
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8"; // DSN
        $pdo = new PDO($dsn, $username, $password);
        
        // Configuration des attributs PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       

        $sql_plat = "INSERT INTO catg_produits (nom) VALUES ('Plat')";
        $sql_pizza = "INSERT INTO produits (nom, description, prix, id_catg) VALUES ('La Reine', 'C\'est une reine', 10, 1), ('Le Roi', 'C\'est un Roi', 10, 2), ('La Dame', 'C\'est une Dame', 10, 3), ('Le Valet', 'C\'est un Valet', 10, 4)";
        $sql_boissons = "INSERT INTO catg_produits (nom) VALUES ('Boisson')";
        $sql_boisson = "INSERT INTO produits (nom, description, prix, id_catg) VALUES ('Coca', 'C\'est un Coca', 3, 5), ('Fanta', 'C\'est un Fanta', 3, 6), ('Orangina', 'C\'est un Orangina', 3, 7), ('Eau', 'C\'est une Eau', 2, 8)";
        $sql_desserts = "INSERT INTO catg_produits (nom) VALUES ('Dessert')";
        $sql_dessert = "INSERT INTO produits (nom, description, prix, id_catg) VALUES ('Tiramisu', 'C\'est un Tiramisu', 3, 9), ('Tarte aux pommes', 'C\'est une Tarte aux pommes', 3, 10), ('Profiteroles', 'Ce sont des Profiteroles', 3, 11), ('Crêpes', 'Ces sont des Crêpes', 3, 12)";


       // Exécution des requêtes avec la méthode query
       try {
        $pdo->query($sql_plat);
        $id_plat = $pdo->lastInsertId();
        
        $pdo->query($sql_boissons);
        $id_boissons = $pdo->lastInsertId();
        
        $pdo->query($sql_desserts);
        $id_desserts = $pdo->lastInsertId();
        
        $sql_pizza = "INSERT INTO produits (nom, description, prix, id_catg) VALUES ('La Reine', 'C\'est une reine', 10, $id_plat), ('Le Roi', 'C\'est un Roi', 10, $id_plat), ('La Dame', 'C\'est une Dame', 10, $id_plat), ('Le Valet', 'C\'est un Valet', 10, $id_plat)";
        $pdo->query($sql_pizza);
        
        $sql_boisson = "INSERT INTO produits (nom, description, prix, id_catg) VALUES ('Coca', 'C\'est un Coca', 3, $id_boissons), ('Fanta', 'C\'est un Fanta', 3, $id_boissons), ('Orangina', 'C\'est un Orangina', 3, $id_boissons), ('Eau', 'C\'est une Eau', 2, $id_boissons)";
        $pdo->query($sql_boisson);
        
        $sql_dessert = "INSERT INTO produits (nom, description, prix, id_catg) VALUES ('Tiramisu', 'C\'est un Tiramisu', 3, $id_desserts), ('Tarte aux pommes', 'C\'est une Tarte aux pommes', 3, $id_desserts), ('Profiteroles', 'Ce sont des Profiteroles', 3, $id_desserts), ('Crêpes', 'Ces sont des Crêpes', 3, $id_desserts)";
        $pdo->query($sql_dessert);
        
        echo "Données insérées avec succès!";
        header('Location: admin_interface.php');
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors de l'insertion des données: " . $e->getMessage();
    }

?>

