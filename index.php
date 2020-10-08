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
   
<!-- Bouton create pour ajouter un article-->
    <div class="d-flex flex-row-reverse mb-1">
        <a href="add.php">
            <button class="btn btn-outline-primary" type="button">
                <img src="crud-icon/add.png"> Create
            </button>
        </a>
    </div>

    <div> 
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                try{
                    require_once("db.php");
                    $sql = "Select post_title, description, post_at from posts";
                    $req = $cnx->prepare($sql);
                    $req->execute();
                    while($data = $req->fetch()){
                        echo "<tr>
                                <td>{$data['post_title']}</td>
                                <td>{$data['description']}</td>
                                <td>{$data['post_at']}</td>";
                        echo '  <td> 
                                    <a href="edit.php">
                                        <img src="crud-icon/edit.png">     
                                    </a>

                                    <a href="delete.php">
                                        <img src="crud-icon/delete.png">     
                                    </a>
                                </td>
                               </tr>';
                        
                            }
                    $req->closeCursor();
                }catch (Exception $e){
                    $e->getMessage();
                }
                ?>

                                    
            </tbody>
        
        </table>

    </div>


  
     <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <!-- popper.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <!-- Le JavaScript de Bootstrap -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

</body>
</html>