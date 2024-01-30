<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Création d'Entité</title>

    <!-- Ajout de liens vers Bootstrap CSS et jQuery -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<h1 class="text-center mt-4">AWALLEY</h1>

<div id="entityModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title mx-auto">Création d'une Entité</h1>
                <button type="button" class="close" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <!-- Formulaire de création d'entité -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="create_entity">

                    <div class="form-group">
                        <label for="entityType">Sélectionnez le type d'entité :</label>
                        <select id="entityType" name="entityType" class="form-control" onchange="updateForm()" required>
                            <option value="pizza">Pizza</option>
                            <option value="livreur">Livreur</option>
                            <option value="client">Client</option>
                        </select>
                    </div>

                    <!-- Section pour la création de pizzas -->
                    <div id="pizzaSection" class="entity-section">
                        <!-- les champs spécifiques aux pizzas ici -->
                        <div class="form-group">
                            <label for="nomPizza">Nom de la pizza:</label>
                            <input type="text" name="nomPizza" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="prixPizza">Prix de la pizza:</label>
                            <input type="number" name="prixPizza" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Ingrédients:</label>
                            <input type="text" name="NOMINGR" class="form-control" required>
                        </div>

                        <!-- Sélection d'ingrédients pour les pizzas -->
                        <div class="form-group">
                            <label for="ingredients">Ingrédients (au plus 2) :</label>
                            <select name="ingredients[]" multiple size="2" class="form-control">
                                <?php
                                // Connexion à la base de données
                                $servername = "localhost:8889";
                                $username = "root";
                                $password = "root";
                                $dbname = "pizzainnoDB";

                                $conn_mysqli = new mysqli($servername, $username, $password, $dbname);

                                if ($conn_mysqli->connect_error) {
                                    die("Connection failed: " . $conn_mysqli->connect_error);
                                }

                                $result = $conn_mysqli->query("SELECT * FROM Ingredient");

                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['NOMINGR'] . "'>" . $row['NOMINGR'] . "</option>";
                                }

                                $conn_mysqli->close();
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Section pour la création de livreurs -->
                    <div id="livreurSection" class="entity-section">
                        <!-- les champs spécifiques aux livreurs ici -->
                        <div class="form-group">
                            <label for="nomLivreur">Nom du livreur:</label>
                            <input type="text" name="nomLivreur" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="prenomLivreur">Prénom du livreur:</label>
                            <input type="text" name="prenomLivreur" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="livreurNumber">Numéro du livreur:</label>
                            <input type="text" name="livreurNumber" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="hireDate">Date d'embauche:</label>
                            <input type="text" name="hireDate" class="form-control" required>
                        </div>
                    </div>

                    <!-- Section pour la création de clients -->
                    <div id="clientSection" class="entity-section">
                        <!-- les champs spécifiques aux clients ici -->
                        <div class="form-group">
                            <label for="nomClient">Nom du client:</label>
                            <input type="text" name="nomClient" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="prenomClient">Prénom du client:</label>
                            <input type="text" name="prenomClient" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="clientAddress">Adresse du client:</label>
                            <input type="text" name="clientAddress" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="clientPhoneNumber">Numéro de téléphone du client:</label>
                            <input type="text" name="clientPhoneNumber" class="form-control" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Créer l'entité</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // L'ouverture de la modal
    function openModal() {
        $('#entityModal').modal('show');
    }

    // La fermeture de la modal
    function closeModal() {
        $('#entityModal').modal('hide');
    }

    // Mise à jour du formulaire en fonction du type d'entité sélectionné
    function updateForm() {
        const entityType = $('#entityType').val();

        // Masquer toutes les sections du formulaire
        $('.entity-section').addClass('d-none');

        // Afficher la section correspondant au type d'entité sélectionné
        $('#' + entityType + 'Section').removeClass('d-none');
    }

    // Ouvrir automatiquement la modal lors du chargement de la page
    $(document).ready(function() {
        openModal();
    });
</script>

</body>
</html>