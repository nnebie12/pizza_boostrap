<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer une Entité</title>

    <!-- Ajout de lien vers la feuille de style Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>

<div id="modal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supprimer Entité</h5>
                <button type="button" class="close" onclick="closeModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $message = "Message de suppression";
                $table_name = "entite";
                $entity_id = 123;
                echo $message;  ?>

                <!-- Formulaire de suppression -->
                <form action="" method="post">
                    <input type="hidden" name="action" value="delete_<?php echo $table_name; ?>">
                    <input type="hidden" name="<?php echo $table_name; ?>_id" value="<?php echo $entity_id; ?>">

                    <p>Êtes-vous sûr de vouloir supprimer cette <?php echo $table_name; ?>?</p>

                    <button type="submit" class="btn btn-danger">Supprimer <?php echo $table_name; ?></button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Ajout de scripts Bootstrap (jQuery et Popper.js) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
<!-- Ajout du script Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    function openModal() {
        $('#modal').modal('show');
    }

    function closeModal() {
        $('#modal').modal('hide');
    }

    // Ouvrir automatiquement la modal lors du chargement de la page
    window.onload = openModal;
</script>

</body>
</html>
