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

    <h2 class="mb-2">Editer un article</h2>

    <?php
    require_once("db.php");
        try {
        
            $select = "SELECT post_title, description, post_at from posts where id = {$_GET['id']}";
            $req = $cnx->prepare($select);
            $req->execute();
            while ($ligne = $req->fetch()) {
                $title = $ligne['post_title'];
                $description = $ligne['description'];   
                $date = $ligne['post_at'];
            }
        } catch(Exception $e) {
            echo $e->getMessage();
        }  

        if(isset($_POST['save'])){
            try{
                
                $sql = "update posts
                    set post_title =:title,
                        description= :description,
                        post_at= :post_at
                    where id={$_GET['id']} ";
                $stmt = $cnx->prepare($sql);

                $stmt->bindParam(':title',$_POST['title'],PDO::PARAM_STR);
                $stmt->bindParam(':description',$_POST['description'],PDO::PARAM_STR);
                if(!empty($_POST['post_at'])){
                $stmt->bindParam(':post_at',$_POST['post_at'],PDO::PARAM_STR);
               }else{
                $stmt->bindParam(':post_at',$_POST['post_at'],PDO::PARAM_NULL); 
               }
                
                $stmt->execute();

                echo '<div class="alert alert-primary" role="alert">Modification avec succès</div>';
            }catch(Exception $e) {
            echo $e->getMessage();
            } 
        }
        
    
        


    ?>
    
    <form method = "post">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name ="title" value ="<?= $title?>"required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="textarea" class="form-control" id="description" name="description"required><?=$description?>
            </textarea>
        </div>
        <div class="form-group">
            <label for="post_at">Date</label>
            <input type="date" class="form-control" id="post_at" name="post_at" value="<?=$date?>">
        </div>
        <button type="submit" class="btn btn-primary" name="save">Save</button>
    </form>

    