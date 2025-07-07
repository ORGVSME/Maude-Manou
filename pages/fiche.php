<?php
require_once '../inc/function.php';
$id = $_GET['id'];
$result = aff_employees($id);
$salaires = get_salaries ($id);
// var_dump($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
   <div class="container">
<form action="recherche.php" method="post" class="d-flex align-items-center my-2 my-lg-0">
    <div class="input-group shadow-sm">
        <input class="form-control border-0" type="text" name="a" placeholder="Rechercher..." aria-label="Recherche" style="border-radius: 50px 0 0 50px; padding: 0.75rem 1.25rem;">
        <button class="btn btn-primary" type="submit" style="border-radius: 0 50px 50px 0; padding: 0.75rem 1.5rem; transition: all 0.3s ease;">
            <i class="bi bi-search me-1"></i> Valider
        </button>
    </div>
</form>
        <div class="card employee-card shadow">
            
            <div class="card-header">
                <h3 class="mb-0">Fiche de l'Employé</h3>
            </div>
            <div class="card-body">
                <?php if ($result && mysqli_num_rows($result) > 0) { ?>
       
          <div class="list-group">
         <?php while ($ligne = mysqli_fetch_assoc($result)) { ?>

        <div class="list-group-item">
            <strong>Date de Naissance :</strong> <?php echo ($ligne['birth_date']); ?>
        </div>
        <div class="list-group-item">
            <strong>Prénom :</strong> <?php echo ($ligne['first_name']); ?>
        </div>
        <div class="list-group-item">
            <strong>Nom :</strong> <?php echo ($ligne['last_name']); ?>
        </div>
        <div class="list-group-item">
            <strong>Sexe :</strong> <?php echo ($ligne['gender']); ?>
        </div>
    <?php } ?>
</div>
                <?php } else { ?>
                <?php } ?>

                <h4 class="mt-4">Historique des Salaires</h4>
                <?php if ($salaires && mysqli_num_rows($salaires) > 0) { ?>
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th class="table-primary">Salaire</th>
                                <th class="table-danger">De</th>
                                <th class="table-warning">À</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($ligne = mysqli_fetch_assoc($salaires)) { ?>
                                <tr>
                                    <td><?php echo ($ligne['salary']); ?></td>
                                    <td><?php echo ($ligne['from_date']); ?></td>
                                    <td><?php echo ($ligne['to_date']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                <?php } ?>
            </div>
        <div class="alert alert-success d-flex justify-content-center align-items-center" role="alert">
                 <a href="index.php">
                <button type="button" class="btn btn-outline-success">Retour à l'accueil</button>
                 </a>
        </div>
    </div>
</body>
</html>