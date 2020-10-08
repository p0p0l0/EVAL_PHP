<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        <!-- Le CSS de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


</head>
<body>
    <!-- Bouton create pour retourner à l'index-->
    <div class="d-flex flex-row-reverse mb-1">
        <a href="index.php">
            <button class="btn btn-outline-primary" type="button">
                Back to List
            </button>
        </a>
    </div>
<!-- suppression -->
<?php
    try{

    require_once("db.php");
    $sql = "DELETE FROM posts where id = {$_GET['id']}";

    $stmt = $cnx->prepare($sql);
    $stmt->execute();

    echo '<div class="alert alert-primary" role="alert">Suppression avec succès</div>';

    $stmt->closeCursor();
    }catch (Exception $ex){
        die ('Erreur: '.$ex->getMessage());
    }
?>
</body>
</html>