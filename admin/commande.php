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

  // Récupérer les données de la table customers
  $query_customers = "SELECT * FROM customers";
  $result_customers = $conn->query($query_customers);

  // Récupérer les données de la table orders
  $query_orders = "SELECT * FROM orders";
  $result_orders = $conn->query($query_orders);

  // Récupérer les données de la table produits
  $query_produits = "SELECT * FROM produits";
  $result_produits = $conn->query($query_produits);
?>

<html>
  <head>
    <title>Admin Backoffice</title>
    <link rel="stylesheet" type="text/css" href="commande.css">
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

    <h1>Administrateur commande

    </h1>
    
    <!-- Customer Table -->
    <h2>Informations Clients</h2>
    <table id="customer-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result_customers->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row["costumer_id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <!-- Order Table -->
    <h2>Historique des Commandes</h2>
    <table id="order-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Customer ID</th>
          <th>Product ID</th>
          <th>Order Date</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result_orders->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["customer_id"]; ?></td>
            <td><?php echo $row["product_id"]; ?></td>
            <td><?php echo $row["order_date"]; ?></td>
            <td><?php echo $row["total"]; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <!-- Product Table -->
    <h2>Produits</h2>
    <table id="product-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Description</th>
          <th>Prix</th>
          <th>ID Catégorie</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result_produits->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["nom"]; ?></td>
            <td><?php echo $row["description"]; ?></td>
            <td><?php echo $row["prix"]; ?></td>
            <td><?php echo $row["id_catg"]; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <!-- Order Graph -->
    <h2>Graphique des Commandes</h2>
    <div id="chart-container">
      <canvas id="myChart"></canvas>
    </div>
    
    <!-- JavaScript code to generate chart -->
    <script>
     var ctx = document.getElementById('myChart').getContext('2d');
     var chart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai'],
    datasets: [{
      label: 'Ventes',
      data: [100, 120, 150, 180, 200],
      backgroundColor: 'rgba(255, 99, 132, 0.2)',
      borderColor: 'rgba(255, 99, 132, 1)',
      borderWidth: 1
    }]
  }
});
    </script>
    
    <!-- Styled Order History Report -->
    <h2>Rapport d'Histoire des Commandes</h2>
    <div id="report-container">
      
      <table id="report-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Customer ID</th>
            <th>Product ID</th>
            <th>Order Date</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result_orders->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["customer_id"]; ?></td>
              <td><?php echo $row["product_id"]; ?></td>
              <td><?php echo $row["order_date"]; ?></td>
              <td><?php echo $row["total"]; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <footer>
        <p>&copy; 2023 - Tous droits réservés</p>
    </footer>
    
  </body>
</html>

<?php
  // Close database connection
  $conn->close();
?>