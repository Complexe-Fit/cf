<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Complexe-Fit - Profil</title>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@1,700&family=Hanken+Grotesk:wght@800;900&family=Roboto+Condensed:wght@300&family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="Complexe-Fit-Profil.css">
</head>
<body>
    

    <header>
        <div class="navbar">
            <a href="index.html" class="list-item"><i class="fa-solid fa-house"></i>
                <span class="list-item-name">Accueil</span>
            </a>
            <a href="Complexe-Fit-Achat.html" class="list-item"><i class="fa-solid fa-bag-shopping"></i>
                <span class="list-item-name">Achat</span>
            </a>
            <a class="list-item">
            <a href="Complexe-Fit-Map.html" class="list-item"><i class="fa-sharp fa-solid fa-map"></i>
                <span class="list-item-name">Carte</span>
            </a>
            <a href="http://localhost/complexe-fit/Complexe-Fit-Connexion.php" class="list-item"><i class="fa-solid fa-user"></i>
                <span class="list-item-name">Profil</span>
            </a>
        </div>
        <img class="image"  src="complexe-fit.png" alt="complexe-fit">
        <p class="cercle"></p>
    </header>

    <div id="message"><h1> Messagerie en ligne </h1></div>
    <form>
        <?php

    $servername = "localhost";
    $username = "bddutilisateur";
    $password = "Bonjour01!";
    $database = "complexe_fit";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=".$database, $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn ->prepare("SELECT * FROM chat");
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
        $username = "bddutilisateur";
        $password = "Bonjour01!";
        $database = "complexe_fit";
        $conn =  new PDO("mysql: host=$servername;dbname=".$database, $username, $password);
        $sql = "INSERT INTO chat (nom,contenu) VALUES ('".$nom.":','".$contenu."')";       /* commande qui permet d'écrire un message*/
        $conn->exec($sql);
        $conn = null;
    }
    ?>
    </form>

    <br>
    
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

    </form>
    <br>   
    <form>
        <div class="cadre">
            <p>Les <span>incriptions</span> ainsi que la <span>vente de materiel</span> ne peuvent être réalisées que dans nos <span>centre de fitness</span>.</p>
        </div>
    </form>
    <br>
    <form>
        <img src="pdg.jpg" alt="pdg">
        <div id="texte">
            <p><span>Société Complexe-Fit</span><br><br>
            <span>Directeur Global :</span><br>
                M. Mathéo Filani<br>
            <span>Téléphone : </span><br>
                01 53 35 38 52<br>
            <span>Adresse mail : </span><br>
                complexe-fit-pro@gmail.com</p>
        </div>
    </form>    
       
    <br><br>
    <footer>
        <div class="foot">
            <div class="topnav-left-1">
                <a>Copyright @2023</a>
            </div>
            <div class="topnav-left-2">
                <a>Complexe-fit</a>
            </div>
            <div class="topnav-right">
                <a href="Complexe-Fit-14_Jours.html">14 jours de droit de rétractation</a>
            </div>
            <div class="topnav-right">
                <a href="Complexe-Fit-A_Propos.html">À Propos</a>
            </div>
            <div class="topnav-right">
                <a href="Complexe-Fit-Mentions_Légales.html">Mentions légales</a>
            </div>
        </div>
    </footer>

</body>
</html>