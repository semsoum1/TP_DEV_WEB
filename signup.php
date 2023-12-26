<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"   />
</head>
<body>
    <!-- header -->
    <section class="header-section">
        <div class="container">
            <header class="navbar">
                <div class="logo">
                    <a href="index.html"><img src="images/logo.png" alt="Parfumerie logo"></a>
                </div>
                <nav>
                    <ul>
                        <li><a href="index.html">Accueil</a></li>
                        <li><a href="produits.php">Produits</a></li>
                        <li><a href="apropos.html">Apropos</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="login.php" id="form-open">Login</a></li>
                        <li><a href="produits-details.html">prod.details</a></li>
                        <li><a href="signup.php">signup</a></li>
                    </ul>
                    <img src="images/cart.png" alt="Cart icon" width="26px">
                </nav>
            </header>
        </div>
    </section>

    <!-- login form -->
    <section class="home">
        <div class="form-container">

            <!-- Signup form -->
            <div class="form signup-form">
                <form action="signup.php" method="post">
                    <h2>Signup</h2>
                    <div class="input-box">
                        <input type="text" name="username" placeholder="Enter your username">
                        <i class="fa-regular fa-envelope email required"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" name="password" placeholder="Create Password">
                        <i class="fa-solid fa-lock password required"></i>
                        <i class="fa-regular fa-eye-slash pw-hide"></i>
                    </div>
                    
                    <button class="button" type="submit"><strong>Signup Now</strong></button>

                    <div class="login_signup">
                        Already have an account? <a href="login.php" id="signup">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    

    <?php
            try
            {
                global $bdd;
                $bdd = new PDO('mysql:host=localhost;dbname=test-db1;charset=utf8', 'root', '');
        
            }
            catch (Exception $e)
            {
                    die('Erreur : ' . $e->getMessage());
            }
            
            
            if(isset($_POST['username']) and isset($_POST['password']))
	{
		if(!empty($_POST['username']) and !empty($_POST['password']))
		{
            $sql1="select * from login where username='".$_POST['username']."'";
            $reponse = $bdd->query($sql1);
            $donnees = $reponse->fetch();
            
            if(empty($donnees))
			{   
				$sql2="insert into login(username, password) values('".$_POST['username']."','".$_POST['password']."')";
				$bdd->exec($sql2);
				//deconnexion();
			echo "<center>Congrats</center>";
			}
			else
			echo "<center>votre compte existe déja !!!</center>";
		}
		else
		echo "<center>Attention !! Remplir tous les champs avec des valeur non nulles</center>"; 
	} 
        ?>        
</body>
</html>