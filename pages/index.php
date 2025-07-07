<?php
require_once '../inc/function.php';
$departments = getDepartments();
$man = getDepartments_and_manager();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Départements</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body class = "text-center">
    <h1 class="h3 mb-3 font-weight-normal">Les departements</h1>

<div class="container mt-5">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
<form action="recherche.php" method="post" class="d-flex align-items-center my-2 my-lg-0">
    <div class="input-group shadow-sm">
        <input class="form-control border-0" type="text" name="a" placeholder="Rechercher..." aria-label="Recherche" style="border-radius: 50px 0 0 50px; padding: 0.75rem 1.25rem;">
        <button class="btn btn-primary" type="submit" style="border-radius: 0 50px 50px 0; padding: 0.75rem 1.5rem; transition: all 0.3s ease;">
            <i class="bi bi-search me-1"></i> Valider
        </button>
    </div>
</form>
    </nav>
    
    <table class="table">
         <thead class="thead-light">
         <tr>
            <th class="table-primary">numero de departement</th>
            <th class="table-danger">Nom du departemen</th>
            <th class="table-warning">first name</th>
            <th class="table-info">last name</th>
            <th class="table-success">employees</th>
            
        </tr>
        </thead>
        <?php
    
        while($ligne = mysqli_fetch_assoc($man)) { ?>
        
        <tr>
                <td ><?php echo $ligne ['dept_no']?></td>
                <td ><?php echo $ligne ['dept_name']?></td>
                <td ><?php echo $ligne ['first_name']?></td>
                <td ><?php echo $ligne ['last_name']?></td>
                <td><a href="employees.php?id=<?php echo $ligne['dept_no'] ?>"><button type="button" 
                class="btn btn-secondary">Voir plus</button></a></td>
        </tr>
        
        <?php }
        ?>
    </table>

</div>
    

   
</body>
</html>