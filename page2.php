
<?php

$db=new PDO('mysql:host=localhost;dbname=3kab_db;charset=utf8','root','');

if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['number']) && !empty($_POST['password']) && !empty($_POST['cni']) && !empty($_POST['password_confirm'])){


$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$number = $_POST['number'];
$password = $_POST['password'];
$cni = $_POST['cni'];
$pass_confirm = $_POST['password_confirm'];


if($password != $pass_confirm){


    header('Location: page2.php?error=1&pass=1');
    exit();
}


     // TEST SI EMAIL UTILISE

     $req = $db->prepare("SELECT count(*) as numberEmail FROM inscription WHERE email = ?");
     $req->execute(array($email));
 
     while($email_verification = $req->fetch()){
 
         if($email_verification['numberEmail'] != 0){
 
             header('Location: page2.php?error=1&email=1');
             exit();
         }
     }

      // HASH

    $secret = sha1($email).time();
    $secret = sha1($email).time().time();

    // CRIPTAGE MOT DE PASS

    $password= "aq1".sha1($password."1254")."25";

    // ENVOI DE LA REQUETE

    $req = $db->prepare("INSERT INTO inscription(nom,prenom, email,number, password,cni, secret) VALUES(?,?,?,?,?,?,?) ");
    $req->execute(array($nom,$prenom, $email,$number, $password,$cni, $secret));

    header('Location: page2.php?success=1');
    exit();

}




?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/png" rel="icon" href="pitures/APP2.png">
    <link rel="stylesheet" type="text/css" href="design/default.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Connexion</title>
</head>
<body>
<header>

<div class="logo"><img id="logo" src="pitures/APP2-100.jpg" alt="logo"></div>
   <div class="input"><input type="text"></div>
  <div class="nav"> <nav>
       <ul>
           <li><a href="#"> calendrier</a></li>
           <li><a href="#"> résultats</a></li>
           <li><a href="#"> categories</a></li>
           <li><a href="#"> services</a></li>
       </ul>
   </nav>
   
   </div>
   <div ><a href="#"> <i class="fa-regular fa-circle-user"></i></a></div>
   
   
</header>



<?php

if(isset($_GET['error'])){


    if(isset($_GET['pass'])){

        echo '<div class="p">';

        echo'<p id="error" >Les mots de passe ne sont pas identiques.Veillez reprendre sil vous plait</p>';

        echo'</div>';
    }

    else if(isset($_GET['email'])){

        echo '<div class="p">';


        echo'<p id="error">Cette adresse email est déjà prise.</p>';
        echo'</div>';
        
    }

   
}
else if(isset($_GET['success'])){

    echo '<div class="p">';

    
    echo'<p id="success">Inscription prise en compte.</p>';

    echo'</div>';

    echo '<div class="centrer">';

    echo '<div class="a">';

    echo '<a href="page3.php">Se connecter</a>';

    echo '</div>';

    echo '</div>';
}

?> 




<section class="inscrire">
 
        <form  action="page2.php" method="post">

            <table >
                <tr>
                    <td><input type="text" name="nom" placeholder="Nom" required></td>
                    <td><input type="text" name="prenom" placeholder="Prenom" required></td>
                    
                </tr>
                <tr>
                    <td><input type="email" name="email" placeholder="Adress e-mail" required></td>
                    <td><input type="tel" name="number" placeholder="Numero de telephone" required></td>
                    
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="Mot de passe" required></td>
                    <td><input type="text" name="cni" placeholder="Numéro de CNI" required></td>
                    
                </tr>
            </table>
           <div> <input type="password" name="password_confirm" placeholder="Confirmer le mot de passe" required></div>
           <!-- <div class="button"><button>S'inscrire</button></div> -->
           <div><input type="submit" value="S'inscrire"></div>
           <!-- <div><a href="projet1.html">S'inscrire</a></div> -->
        </form>
    </section>
    <footer class="footer2">
        <div class="trait">
           <P>pajndjfnjfnjndjnjdnfjndsorijjnvjofnjvnjndjnjdvj jfnjvnjfrnjM//MDFLL.GLF.GL.G.FL?Kl;;dlkgrkifnngirjifivifiihhauehuzrpp</P>
        </div>
    </footer>
</body>
</html>