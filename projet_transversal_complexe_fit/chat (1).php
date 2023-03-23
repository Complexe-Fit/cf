<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Complexe-Fit - Chat</title>
<link rel="stylesheet" href="chat.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@1,700&family=Hanken+Grotesk:wght@800;900&family=Roboto+Condensed:wght@300&family=Roboto:wght@900&display=swap" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="logo.png">
</head>
<body>

<header>
  <div id="navbar">
    <img src="complexe-fit(1).png" id="logo" alt="complexe-fit">
    <div id="navbar-right">
      <a class="active" href="#home">Home</a>
      <a href="#contact">Contact</a>
      <a href="#about">About</a>
    </div>
  </div>

  <div class="page">
  </div>

  <script>
  largeur = window.innerWidth
  window.onscroll = function() {scrollFunction()};

  function scrollFunction() {
      if (document.body.scrollTop > 5 || document.documentElement.scrollTop > 5) { 
        if (largeur < 1081) {
          document.getElementById("navbar").style.height = "1px";
          document.getElementById("logo").style.height = "60px";    /* s'il y a un écart de 80px entre la barre de scroll et le haut de la barre (pour un téléphone de 1080px max )alors la navbar se réduit sinon elle s'agrandit*/
          document.getElementById("logo").style.width = "60px";   
        } else {
          document.getElementById("navbar").style.height = "5px";
          document.getElementById("logo").style.height = "82px";
          document.getElementById("logo").style.width = "82px";  
        } 
    } else {
        if (largeur < 1081) {
          document.getElementById("navbar").style.height = "25px";
          document.getElementById("logo").style.height = "76px";
          document.getElementById("logo").style.width = "76px";
        } else {
          document.getElementById("navbar").style.height = "50px";
          document.getElementById("logo").style.height = "115px";
          document.getElementById("logo").style.width = "115px";
        }
      }
    }
  </script>
</header>

</body>
</html>

<?php

$servername = "localhost";
$username = "logan";
$password = "azerty";
$database = "chat";

try {
  $conn = new PDO("mysql:host=$servername;dbname=".$database, $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully </br>" ;

  $stmt = $conn ->prepare("SELECT * FROM messages");
  $stmt-> execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach($stmt->fetchAll() as $value) {
    echo $value["nom"];
    echo $value["contenu"];
    echo "</br>";    
} 
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

function Insertmessage($nom,$contenu)
{
    $servername = "localhost";
    $username = "logan";
    $password = "azerty";
    $database = "chat";
    $conn =  new PDO("mysql: host=$servername;dbname=".$database, $username, $password);
    $sql = "INSERT INTO messages (nom,contenu) VALUES ('".$nom.":','".$contenu."')";
    $conn->exec($sql);
    $conn = null;
}
?>

<br>
<div class ="message"><h1> Messagerie en ligne </h1></div>
<form method='post' class ='form' action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input type="text" id ="nom" name="nom" placeholder ="écrivez votre nom">
    <input type="text" id ="contenu" name="contenu" placeholder ="entrez votre message">
    <input class='button' type='submit' name="envoyer">
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"]== "POST") {
        $nom = $_POST['nom'];
        $contenu = $_POST['contenu'];           #ce bloc permet d'afficher la musique que l'on rajoute
        Insertmessage($nom,$contenu);
        echo "<meta http-equiv='refresh' : content='0'>";
    }

?>