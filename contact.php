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
    <title>Contact</title>
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

<h1 class="text-center">Formulaire</h1>
<form action="contact.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom">
    </div>
    <div class="form-group col-md-6">
      <label for="prenom">Prénom</label>
      <input type="text" class="form-control" id="prenom" name="prenom">
    </div>
    <div class="form-group col-md-6">
      <label for="prenom">Offre</label>
      <select id="offre" name="offre">
        <option value="Panneau Photovoltaïque 500W">Panneau Photovoltaïque 500W</option>
        <option value="Panneau Photovoltaïque 1000W">Panneau Photovoltaïque 1000W</option>
        <option value="Panneau Photovoltaïque 1500W">Panneau Photovoltaïque 1500W</option>
        <option value="Onduleur photovoltaïque 2000W">Onduleur photovoltaïque 2000W</option>
        <option value="Forfait Start">Forfait Start</option>
        <option value="Forfait EcoMax">Forfait EcoMax</option>
        <option value="Mât 4 mètres en carbone et fixation au sol pour éolienne">Mât 4 mètres en carbone et fixation au sol pour éolienne</option>
        <option value="Mât 6 mètres en carbone et fixation au sol pour éolienne">Mât 6 mètres en carbone et fixation au sol pour éolienne</option>
        <option value="Eolienne Maxi Dom">Eolienne Maxi Dom</option>
        <option value="Eolienne Mini Dom">Eolienne Mini Dom</option>
        <option value="Onduleur éolienne">Onduleur éolienne</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="adresse">Adresse</label>
    <input type="text" class="form-control" id="adresse" placeholder="1234 Main St" name="adresse">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="code_postal">Code Postal</label>
      <input type="text" class="form-control" id="code_postal" name="code_postal">
    </div>
    <div class="form-group col-md-4">
      <label for="ville">Ville</label>
      <input type="text" class="form-control" id="ville" name="ville">
    </div>
    <div class="form-group col-md-4">
      <label for="telephone">Télephone</label>
      <input type="text" class="form-control" id="telephone" name="telephone">
    </div>
  </div>
  <button type="submit" value="submit" name="submit" class="btn btn-primary">Envoyer</button>
</form>


<p>Les données envoyées par ce formulaire seront les vôtres et ne sont pas utilisées ou vendues à d'autres agences.</p>
<a href="backoffice.php">Voir les clients qui sont interessés par ces offres.</a>
<br>
<a href="ecodom.php">Retour Accueil</a>

</body>
</html>