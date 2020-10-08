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

    <!-- formulaire pour ajouter -->
    <h2 class="mb-2">Ajouter un article</h2>
    <form method = "post">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name ="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="message" class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="post_at">Date</label>
            <input type="date" class="form-control" id="post_at" name="post_at">
        </div>
        <button type="submit" class="btn btn-primary" name="add">Add</button>
    </form>

    <?php

        
        if(isset($_POST['add'])){

            try {
                require_once("db.php");
                $sql = "insert into posts(post_title,description,post_at) VALUES (:title,:description,:post_at)";
                $stmt = $cnx->prepare($sql);

                $stmt->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
                $stmt->bindParam(':description',$_POST['description'],PDO::PARAM_STR);
                $stmt->bindParam(':post_at',$_POST['post_at'],PDO::PARAM_STR);
                
                $stmt->execute();


                echo '<div class="alert alert-primary" role="alert">Ajout avec succès</div>';

            } catch(Exception $e) {
                echo $e->getMessage();
            }
            
        }
            

    ?>





</body>
</html>


