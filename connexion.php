<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
</head>
<body>
    <h1>connexion</h1>

    <form action="" method="post">
    <label for="id">identifiant</label>
    <input type="text" name="id">
    <label for="mdp">mot de passe</label>
    <input type="text" name="mdp">
    <button type="submit">valider</button>
    </form>
</body>
</html>
<?php
$id = "taelan";
$mdp = "mdp";


if (isset($_POST["id"]) && isset($_POST["mdp"])){
    $chantId = $_POST["id"];
    $chantMdp = $_POST["mdp"];
    if($chantId == $id && $chantMdp == $mdp){
        echo('validé,redirection');
        sleep(3);
        header("Location: http://localhost/connexion/accueil.php");
    }
    else{
        echo('rejeté');
    }
}

$servername = 'localhost';
$username = 'root';
$password = '';


try{
    $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connexion réussie';
}

catch(PDOException $e){
  echo "Erreur : " . $e->getMessage();
}

$sqlQuery = 'SELECT * FROM test';
$recipesStatement = $conn->prepare($sqlQuery);
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();

$tableau = ["heri", "taelan", "mohamed"];

for($i = 0 ; $i < count($tableau); $i++){
    echo('<hr>'.$tableau[$i]);
}
?>
<hr>
<?php
echo "<pre>";
var_dump($recipes[0]["usename"]);
echo "</pre>";
?>