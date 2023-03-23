<!DOCTYPE html>
<html>
<head>  
    <title>Complexe-Fit - Connexion</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@1,700&family=Hanken+Grotesk:wght@800;900&family=Roboto+Condensed:wght@300&family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="Complexe-Fit-Connexion.css">
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




      <form name="fo" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <h1>Se connecter</h1>
        <div class="inputs">
            <input type="text" id ="mail" name="mail" placeholder ="Email">
        </div>
        <div class="inputs">
            <input type="password" id="pass" id ="mdp" name="mdp" placeholder ="Mot de passe">
          <img src="eye-slash.png" id="eye" onclick="changer()"></img>
        </div>
        
        <div align="center">
            <button type="submit">Se connecter</button>
        </div>
        <p class="inscription">Je n'ai pas de <span>compte</span>. Je m'en <a href="http://localhost/complexe-fit/Complexe-Fit-Inscription.php">crée</a> un.</p>
    </form>
    <script>
        e=true;
        function changer(){
            if(e){
                document.getElementById("pass").setAttribute("type","text");
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
    $servername = "localhost";
    $username = "bddutilisateur";
    $password = "Bonjour01!";
    $database = "complexe_fit";
    $conn = new PDO("mysql:host=$servername;dbname=".$database, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $valid = 0;
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        $login = $conn->prepare("SELECT COUNT(*) AS result from utilisateur WHERE mail='$mail' and motpasse='$mdp'");
        $login->execute();
        foreach($login->fetchall() as $value) {
            if($value["result"] > 0) {
                $valid = 1;
            }
        }
        if($valid>0) {
            $getname = $conn->prepare("SELECT nom_utilisateur from utilisateur where mail='$mail'");
            $getname->execute();
            foreach($getname->fetchall() as $valuename) {
                    $_SESSION['identifiant'] = ['name' => $valuename[0], 'mail' => $mail];
                }
            echo "<script> location.href='Complexe-Fit-Profil.php'; </script>";;
        } else {
            echo"mdp ou nom mail incorrect";
        }
    }
?>