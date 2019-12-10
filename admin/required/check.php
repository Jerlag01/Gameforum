<?php 
	session_start();

	//default value for error, passed to url.
	$error = "0";

	//bericht bij het wachten.
		$_SESSION["loadmsg"] = "<h1>The Admin panel is being loaded, please wait.</h1>";
		echo $_SESSION["loadmsg"];

	//een variabele waarin wordt opgeslagen dat de user ingelogd is of niet
		$_SESSION["check"] = false;

	//check dat de user deze file bereikt via op een correctie manier, als de login knop leeg is, dan is hij hier geraakt zonder het formulier te gebruiken.
		if(isset($_POST['login'])){

			//connecteer met de database
			require './connection.php';

			//steek form input in variabelen (email & username is dezelfde input)
			$username = $conn->real_escape_string($_POST['username']);
			$email = $username;
			//raw wachtwoord
			$password = $conn->real_escape_string($_POST['password']);
			//geëncrypteerd wachtwoord.
			$encPassword = md5($password);



			//check dat username of wachtwoord niet zijn ingevuld.
			if(empty($username) || empty($password)){
				session_destroy();
				$error = "0";
				header("location: ../login.php?error=". urlencode($error));
				exit();
			}
			else{

				//vraag het wachtwoord op waar de username/mail gelijk is aan de input.

					//Note to self: $pass voert de query niet uit, hij stored hem gwn in een variabele.
					$pass = "SELECT password FROM users WHERE username='$username' or email='$email';";
				
				
					//voer de query uit over de "$conn" connectie.
					$query = $conn->query($pass);
				
					//fetch de row uit de uitgevoerde query.
					$row = $query->fetch_assoc();
				
				
					//selecteer het wachtwoord uit de array.
					$pas = $row["password"];
					//bestaat de username wel?
					//matcht het gevonden wachtwoord met het ingegeven (md5)wachtwoord?
					//password_verify(); wordt niet gebruikt (werkt niet). geen idee waarom. Iets te maken met md5?
					if($encPassword == $pas){

					//bepaal welke links de user mag zien, en zet dit in een session variabele.
							
						//momenteel op id's gebaseerd, later op member en user status.
						$idQuery = "SELECT groupid FROM users WHERE username='$username' or email='$email';";
						$query = $conn->query($idQuery);
						$idRow = $query->fetch_assoc();
						$_SESSION["id"] = $idRow["groupid"];
						$_SESSION["username"] = $username;
						header("location: ../index.php");
						$_SESSION["check"] = true;
					}
					else{
						session_destroy();
						$error = "1";
						header("location: ../login.php?error=". urlencode($error));
						exit();
					}	
			}
		}
		else{
			session_destroy();
			header("location: ../login.php");
			exit();
		}
?>