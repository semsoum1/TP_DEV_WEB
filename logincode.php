<?php


$sname= "localhost";

$unmae= "root";

$password = "";

$db_name = "test-db1";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

session_start(); 

            //matching the username & password with those in the db

            
            if (isset($_POST['username']) && isset($_POST['password'])) {
            
                $username = $_POST['username'];
            
                $password = $_POST['password'];
            
                if (empty($username)) {
            
                    header("Location: index.php?error=User Name is required");
            
                    exit();
            
                }else if(empty($password)){
            
                    header("Location: index.php?error=Password is required");
            
                    exit();
            
                }else{
            
                    $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
            
                    $result = mysqli_query($conn, $sql);
            
                    if (mysqli_num_rows($result) === 1) {
            
                        $donnees = mysqli_fetch_assoc($result);
            
                        if ($donnees['username'] === $username && $donnees['password'] === $password) {
            
                            echo "Logged in!";
            
                            $_SESSION['username'] = $donnees['username'];
            
                            $_SESSION['name'] = $donnees['name'];
            
                            $_SESSION['id'] = $donnees['id'];
            
                            header("Location: produits-details.html");
                            exit();
            
                        }else{
            
                            header("Location: index.php?error=Incorect User name or password");
            
                            exit();
            
                        }
            
                    }else{
            
                        header("Location: index.php?error=Incorect User name or password");
            
                        exit();
            
                    }
            
                }
            
            }else{
            
                header("Location: index.html");
            
                exit();
            
            }
            ?>