<?php

if(isset($_POST['submit'])){

  try {
    $pdo = new PDO ("mysql:host=localhost;dbname=offres","root","");
  } catch (Exception $exc) {
    echo $exc->getTraceAsString();
    exit();
  }

  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $adresse = $_POST['adresse'];
  $code_postal = $_POST['code_postal'];
  $ville = $_POST['ville'];
  $telephone = $_POST['telephone'];
  $offre = $_POST['offre'];
 
  $sql = "INSERT INTO clients (nom,prenom,adresse,code_postal,ville,telephone,offre) VALUES (:nom,:prenom,:adresse,:code_postal,:ville,:telephone,:offre)";
  $result = $pdo->prepare($sql);
  $exec = $result->execute(array(
    ":nom"=>$nom,
    ":prenom"=>$prenom,
    ":adresse"=>$adresse,
    ":code_postal"=>$code_postal,
    ":ville"=>$ville,
    ":telephone"=>$telephone,
    ":offre"=>$offre,
  ));
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back Office - Liste clients</title>
    <link rel="stylesheet" href="css/bootstrap_modifié.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
    <script src="bootstrap-4.5.3/dist/js/bootstrap.js"></script>

    <style>

        body {
            max-width:1000px;
            margin:auto;
        }
    
    </style>
</head>
<body>

<h1>Liste des clients et des offres qui les intéressent</h1>

<table class="table table-striped">
    
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Adresse</th>
      <th scope="col">Code Postal</th>
      <th scope="col">Ville</th>
      <th scope="col">Téléphone</th>
      <th scope="col">Offre qui l'interesse</th>
    </tr>

    <?php
       $host = 'localhost';
       $dbname = 'offres';
       $username = 'root';
       $password = '';
         
       $dsn = "mysql:host=$host;dbname=$dbname"; 
       // récupérer tous les utilisateurs
       $sql = "SELECT * FROM clients";
        
       try{
        $pdo = new PDO($dsn, $username, $password);
        $stmt = $pdo->query($sql);
        
        if($stmt === false){
         die("Erreur");
        }
        
       }catch (PDOException $e){
         echo $e->getMessage();
       }
    
    ?>

<tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['nom']); ?></td>
       <td><?php echo htmlspecialchars($row['prenom']); ?></td>
       <td><?php echo htmlspecialchars($row['adresse']); ?></td>
       <td><?php echo htmlspecialchars($row['code_postal']); ?></td>
       <td><?php echo htmlspecialchars($row['ville']); ?></td>
       <td><?php echo htmlspecialchars($row['telephone']); ?></td>
       <td><?php echo htmlspecialchars($row['offre']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>

</table>

<a href="ecodom.php">Retour Accueil</a>
</body>
</html>