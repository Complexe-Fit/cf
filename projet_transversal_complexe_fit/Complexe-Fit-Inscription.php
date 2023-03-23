<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Complexe-Fit - Inscription</title>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@1,700&family=Hanken+Grotesk:wght@800;900&family=Roboto+Condensed:wght@300&family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="Complexe-Fit-Inscription.css">
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
        <img class="image"  src="complexe-fit.png" alt="complexe-fit" width="400" height="400">
        <p class="cercle"></p>
    </header>


    <form class="big">
        <div class="texte-description">
            Avant toute inscription dans nos salles de remise en forme, nous vous proposons une séance gratuite d'initiation avec un coach diplomé.
        </div>
    </form>

    <form method='post' action="<?php echo $_SERVER['PHP_SELF'];?>">
         
        <h1>S'inscrire</h1>
 
        <div class="inputs">
            <input type="text" placeholder="Nom" id ="nom" name="nom">
        </div>
        <div class="inputs">
            <input type="text" placeholder="Prénom" id ="prenom" name="prenom">
        </div>
        <div class="inputs">
            <input type="email" placeholder="Email" id ="mail" name="mail">
        </div>
        <div class="inputs">
            <input type="text" placeholder="Téléphone" id ="telephone" name="telephone">
        </div>
        <div class="inputs">
            <input type="password" id="pass" placeholder="Mot de passe" id ="motpasse" name="motpasse">
            <img src="eye-slash.png" id="eye" onclick="changer()"></img>
        </div>
        
        <div align="center">
            <button type="submit">S'inscrire</button>
        </div>
        <p class="connexion">J'ai un <span>compte</span>. Je me <a href="http://localhost/complexe-fit/Complexe-Fit-Connexion.php">connecte</a>.</p>
    </form>
    <script>
        e=true;
        function changer(){
            if(e){
                document.getElementById("pass").setAttribute("type","email");
                document.getElementById("eye").src="eye.png";
                e=false;
            }
            else{
                document.getElementById("pass").setAttribute("type","password");
                document.getElementById("eye").src="eye-slash.png";
                e=true;
            }
        }
    </script>


 
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
<?php
function Insertutilisateur($mail,$nom_utilisateur,$prenom_utilisateur,$telephone,$mdp){
    $servername = "localhost";
    $username = "bddutilisateur";
    $password = "Bonjour01!";
    $database = "complexe_fit";
    $conn =  new PDO("mysql: host=$servername;dbname=".$database, $username, $password);
    $sql = "INSERT INTO utilisateur (mail,telephone,nom_utilisateur,prenom_utilisateur,motpasse) VALUES ('".$mail."','".$telephone."','".$nom_utilisateur."','".$prenom_utilisateur."','".$mdp."')";
    $conn->exec($sql);
}
?>
<?php
    if ($_SERVER["REQUEST_METHOD"]== "POST") {
        $mail = $_POST['mail'];
        $nom_utilisateur = $_POST['nom'];
        $prenom_utilisateur = $_POST['prenom'];
        $tel=$_POST['telephone'];
        $motpasse = $_POST['motpasse'];
        Insertutilisateur($mail,$nom_utilisateur,$prenom_utilisateur,$tel,$motpasse);
        echo "<meta http-equiv='refresh' : content='0'>";
    }
?>