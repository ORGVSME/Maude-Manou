<?php
require_once '../inc/function.php';
$id = $_GET['id'];
$employees = get_employees($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
     <div class="container mt-5">
<form action="recherche.php" method="post" class="d-flex align-items-center my-2 my-lg-0">
    <div class="input-group shadow-sm">
        <input class="form-control border-0" type="text" name="a" placeholder="Rechercher..." aria-label="Recherche" style="border-radius: 50px 0 0 50px; padding: 0.75rem 1.25rem;">
        <button class="btn btn-primary" type="submit" style="border-radius: 0 50px 50px 0; padding: 0.75rem 1.5rem; transition: all 0.3s ease;">
            <i class="bi bi-search me-1"></i> Valider
        </button>
    </div>
</form>
        <div class="alert alert-success d-flex justify-content-center align-items-center" role="alert">
                 <a href="index.php">
                <button type="button" class="btn btn-outline-success">Retour à l'accueil</button>
                 </a>
        </div>
    <table class ="table">
        <thead class="thead-light">
        <th>Nom</th>
        <th>Prenom</th>
        <th>Sex</th>
        </thead>
 
        <?php
            while($ligne = mysqli_fetch_assoc($employees)) { ?>
        
        <tr onclick="window.location.href = 'fiche.php?id=<?php echo $ligne['emp_no']; ?>'">

                <td ><?php echo $ligne ['first_name']?></td>
                <td ><?php echo $ligne ['last_name']?></td>
                <td ><?php echo $ligne ['gender']?></td>
        </tr>
         <?php }
        ?>

       
        
    
    </table>

    </div>
    
</body>
</html>