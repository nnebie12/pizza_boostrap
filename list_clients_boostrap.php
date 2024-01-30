<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo récup pizza mysql</title>
    <!-- Ajout de lien vers la feuille de style Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>


<form class="navbar bg-dark">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-append">
            <button type="submit" class="btn btn-info">Recherche</button>
        </div>
    </div>
    <div class='container-button'><br>
        <a class='btn btn-info' href='list_livreurs_boostrap.php'>Livreurs</a>
        <a class='btn btn-info' href='index_boostrap.php'>Accueil</a>
    </div>
</form>


<div class="container mt-4">

    <h1 class="text-center text-light">AWALLEY</h1>

    <?php
    $servername = "localhost";
    $username = "root";

    try {
        $conn_mysqli = new mysqli($servername, $username, "root", "pizzainnoDB");
    } catch (Exception $e) {
        die("probleme d'application , veuillez contacter votre administrateur : ");
    }
    $sql_client = "SELECT * FROM client";
    $result = $conn_mysqli->query($sql_client);
    echo '<div class="row">';

    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4">';
        echo '<div class="card">';
        echo '<img src="images_clients/' . $row['NOMCLIE'] . '.jpg" class="card-img-top" alt="' . $row['NOMCLIE'] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['NOMCLIE'] . ' ' . $row['PRENOMCLIE'] . '</h5>';
        echo '<p class="card-text">' . $row['ADRESSECLIE'] . ', ' . $row['VILLECLIE'] . '</p>';
        echo '<p class="card-text">' . $row['CODEPOSTALECLIE'] . '</p>';
        echo '<p class="card-text"><strong>Numéro du client:</strong> ' . $row['NROCLIE'] . '</p>';
        echo '<p class="card-text"><strong>Titre du client:</strong> ' . $row['TITRECLIE'] . '</p>';
        echo '<div class="livreur-card-buttons">';
        echo "<a class='btn btn-success' href='commander.php'>Commander</a> ";
        echo "<a class='btn btn-primary' href='udapte_boostrap.php'>Modifier</a>";
        echo "<a class='btn btn-danger' href='delete_boostrap.php'>Supprimer</a>";
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    ?>

</div>

<!-- Ajout de scripts Bootstrap (jQuery et Popper.js) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
<!-- Ajout de script Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
