<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Admin</title>
    <link rel="stylesheet" href="administrateur.css">
</head>
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

    <h1>Gestion des comptes administrateurs</h1>
<div class="forms-container">
    <!-- Formulaire pour ajouter un compte administrateur -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" name="add_admin" value="Ajouter compte administrateur">
    </form>

    <!-- Formulaire pour modifier un compte administrateur -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" name="modify_admin" value="Modifier compte administrateur">
    </form>

    <!-- Formulaire pour supprimer un compte administrateur -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username"><br><br>
        <input type="submit" name="delete_admin" value="Supprimer compte administrateur">
    </form>
</div>
    <?php
    // Configuration de la base de données
    $host = 'localhost'; // Adresse du serveur
    $dbname = 'stromboli'; // Nom de la base de données
    $username = 'root'; // Nom d'utilisateur
    $password = ''; // Mot de passe

    // Connect to the database
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Add new administrator account
    if (isset($_POST['add_admin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO utilisateurs (username, password) VALUES ('$username', '$password_hash')";
        mysqli_query($conn, $query);
        header('Location: administrateur.php?success=add');
        exit;
    }

    // Modify existing administrator account
    if (isset($_POST['modify_admin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE utilisateurs SET username='$username', password='$password_hash' WHERE username='$username'";
        mysqli_query($conn, $query);
        header('Location: administrateur.php?success=modify');
        exit;
    }

    // Delete administrator account
    if (isset($_POST['delete_admin'])) {
        $username = $_POST['username'];
        $query = "DELETE FROM utilisateurs WHERE username='$username'";
        mysqli_query($conn, $query);
        header('Location: administrateur.php?success=delete');
        exit;
    }

    // Close connection
    mysqli_close($conn);
    ?>

    <footer>
        <p>&copy; 2023 - Tous droits réservés</p>
    </footer>
</body>
</html>