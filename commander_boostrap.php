<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $success_message = "Votre commande a été enregistrée avec succès!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commander une Pizza</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Commander une Pizza</h1>

    <?php
    if (isset($success_message)) {
        echo '<div class="alert alert-success" role="alert">' . $success_message . '</div>';
    } else {
        // Afficher le bouton pour ouvrir la modal
        ?>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#pizzaModal">Commander</button>

        <!-- Modal -->
        <div class="modal fade" id="pizzaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Commander une Pizza</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulaire -->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <label for="pizzaType">Type de Pizza:</label>
                                <input type="text" class="form-control" name="pizzaType" required>
                            </div>
                            <div class="form-group">
                                <label for="nom">Nom:</label>
                                <input type="text" class="form-control" name="nom" required>
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom:</label>
                                <input type="text" class="form-control" name="prenom" required>
                            </div>
                            <div class="form-group">
                                <label for="numero">Numéro:</label>
                                <input type="text" class="form-control" name="numero" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" name="email" required>
                            </div>

                            <button type="submit" class="btn btn-success">Valider la commande</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<!-- Ajout de scripts Bootstrap (jQuery et Popper.js) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>