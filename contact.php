<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parfumerie Choukri - Home Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />
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
                        <li><a href="produits.html">Produits</a></li>
                        <li><a href="apropos.html">Apropos</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="loginform.html" id="form-open">Login</a></li>
                        <li><a href="produits-details.html">prod.details</a></li>
                        <li><a href="signup.php">signup</a></li>
                    </ul>
                    <img src="images/cart.png" alt="Cart icon" width="26px">
                </nav>
            </header>
    </section>

    <!-- contact form -->
    <section class="contact">
        <div class="contact_container">
            <div class="left">
                <h3 class="heading">Contactez-nous</h3>
                <p class="text">Comment pouvons-nous vous aider ?</p>
                <form action="contact.php" method="post">
                    <div class="inputBox">
                        <input type="text" name="name" class="name" placeholder="Entrez votre Nom">
                    </div>
                    <div class="inputBox">
                        <input type="text" name="email" class="email" placeholder="Entrez votre Email">
                    </div>
                    <div class="inputBox">
                        <textarea name="message" class="message" placeholder="Entrez votre Message..."></textarea>
                    </div>
                    <button class="button-3">Valider</button>
                </form>
            </div>

            <div class="right">
                <div class="contact_image">
                    <img src="images/contact.jpg" alt="Contact Image">
                </div>
                <div class="contact_info">
                    <div class="infoBox">
                        <div class="icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="text">
                            <p>22, Quartier Anfa, Casablanca, Maroc</p>
                        </div>
                    </div>
                    <div class="infoBox">
                        <div class="icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="text">
                            <a href="tel:+212 639-352936">+212 639-352936</a>
                        </div>
                    </div>
                    <div class="infoBox">
                        <div class="icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="text">
                            <a href="mailto:parfumeriechoukri@gmail.com">parfumeriechoukri@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="social_icons">
                <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-square-x-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin"></i></i></a>
            </div>
        </div>
    </section>

    <!-- footer -->
    <section class="footer">
        <div class="container">
            <div class="footer-row">
                <div class="footer-col">
                    <h4>Entreprise</h4>
                    <ul>
                        <li><a href="#">Apropos</a></li>
                        <li><a href="#">nos services</a></li>
                        <li><a href="#">Politique de confidentialité</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>aide</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">livraison</a></li>
                        <li><a href="#">retours</a></li>
                        <li><a href="#">État de la commande</a></li>
                        <li><a href="#">Options de paiement</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>boutique en ligne</h4>
                    <ul>
                        <li><a href="#">parfums</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Suivez-nous</h4>
                    <div class="social-links">
                        <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-square-x-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin"></i></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
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
            
            
            if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['message']))
	{
		if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['message']))
		{
            $sql1="select * from contact where name=''   ";
            $reponse = $bdd->query($sql1);
            $donnees = $reponse->fetch();
            
            if(empty($donnees))
			{   
				$sql2="insert into contact(name, email,message) values('".$_POST['name']."','".$_POST['email']."','".$_POST['message']."') ";
				$bdd->exec($sql2);
				
			echo "<center>Congrats</center>";
			}
			else
			echo "<center>null</center>";
		}
		else
		echo "<center>Attention !! Remplir tous les champs avec des valeur non nulles</center>"; 
	} 
        ?> 
</body>
</html>