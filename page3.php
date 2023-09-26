
<?php

// session_start();

// if(isset($_SESSION['connect'])){

//     header('Location: page3.php');
// }

$db=new PDO('mysql:host=localhost;dbname=3kab_db;charset=utf8','root','');

    if(!empty($_POST['email']) && !empty($_POST['password'])){


    // VARIABLES

    $email = $_POST['email'];
    $password = $_POST['password'];
    $error=0;

    // CRYPTER LE PASSWORD

    $password= "aq1".sha1($password."1254")."25";

    $req = $db->prepare('SELECT * FROM inscription WHERE email=?');
    $req->execute(array($email));

    while($user = $req->fetch()){

        if($password==$user['password']){
            $error=0;
            // $_SESSION['connect'] =1;
            // $_SESSION['nom'] = $user['nom'];
            header('Location: page3.php?success=1');


        }
               
       
    }
        if($error==1){
    
        header('Location: page3.php?error=1');
        }   

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/png" rel="icon" href="pitures/APP2.png">
    <link rel="stylesheet" type="text/css" href="Design/default.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Connexion</title>
</head>
<body>

<!-- HEADER -->
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
   <div ><i class="fa-regular fa-circle-user"></i></div>
   
</header>

<?php

if(isset($_GET['error'])){

    echo '<div class="p">';


    echo '<p id="error">Nous ne pouvons pa vous authentifier.</p>';

    echo'</div>';

}

else{

    if(isset($_GET['success'])){

    echo '<div class="p">';

    echo '<p id ="success">Vous etes maintenant connectez.</p>';
    echo'</div>';

    }

}

?>
  <!-- FORMULAIRE DE CONNEXION -->
  <section class="form">
        <form action="page3.php" method="post">
            
                <div><input type="email" name="email" placeholder="Adresse E-mail ou numéro de telephone" required></div>
                <div><input type="password"  name="password" placeholder="mot de passe" required></div>

                <div></div><input type="submit" value="CONNEXION"></div>
                <div id="flex">
                    <div class="trait">
        
                    </div>
                    <div>ou</div>
                    <div class="trait">
        
                    </div>
                </div>
                <div><p>vous n'avez pas de compte ?<a href="page2.php">Inscrivez vous</a> </p></div>

        </form>
      
    </section>
    <footer class="footer2">
        <div class="trait">
           <P>pajndjfnjfnjndjnjdnfjndsorijjnvjofnjvnjndjnjdvj jfnjvnjfrnjM//MDFLL.GLF.GL.G.FL?Kl;;dlkgrkifnngirjifivifiihhauehuzrpp</P>
        </div>
    </footer>
</body>
</html>