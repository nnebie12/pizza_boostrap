<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Entité</title>

    <!-- Ajout de liens vers Bootstrap CSS et jQuery -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<h1 class="text-center mt-4">AWALLEY</h1>

<div id="modal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title mx-auto">Modifier <?php echo ucfirst($entity_type); ?></h1>
                <button type="button" class="close" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <?php echo $message; // Affichage du message ici ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="update_entity">
                    <input type="hidden" name="entity_id" value="<?php echo $row['ID']; ?>">

                    <!-- Ajout d'un champ caché pour stocker le type d'entité -->
                    <input type="hidden" name="entity_type" value="<?php echo $entity_type; ?>">

                    <div class="form-group">
                        <label for="entity_name">Nom de l'Entité:</label>
                        <input type="text" class="form-control" name="entity_name" value="<?php echo $row['NOM']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="entity_price">Prix de l'Entité (en euros):</label>
                        <input type="number" class="form-control" name="entity_price" value="<?php echo $row['PRIX']; ?>" required>
                    </div>

                    <button type="submit" class="btn btn-success">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // L'ouvrerture de la modal
    function openModal() {
        $('#modal').modal('show');
    }

    // La fermerture de la modal
    function closeModal() {
        $('#modal').modal('hide');
    }

    // Ouvrir automatiquement la modal lors du chargement de la page
    $(document).ready(function() {
        openModal();
    });
</script>

</body>
</html>

