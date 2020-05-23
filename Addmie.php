<?php
if(	!isset($_SESSION["user_login"])	)
{}
else{header('location:home.php');}
?>
<html>
<head>
<title>Addmie</title>
<link rel = "icon" type = "image/png" href = "Addmie.png"> </link>
<link rel="stylesheet" type="text/css" href="addmie/css/styles.css">
</head>
<body >
	<?php include('header.php')?>
	<div class="entry-container">
		<div class="signup" style="width: 50%;">
			<h1>New Here,</h1>
			<h3>Signup Here</h3>			
            <form action="Addmie.php" method='post'>
                username<input type='text' name='Username'/><br>
                password<input type="text" name='Password' required/>
                <input type='submit' name='Submit'/>
            </form>
            <?php 
                if( isset($_POST['Submit']))
                {
                    $username=$_POST['Username'];
                    $password=$_POST['Password'];

        

                    $db = new SQLite3('users.db');
                    /* $db->exec("drop table if exists user");
                    $db->exec("create table user(
                        userid int auto increment,
                        username char(25) unique,
                        password char(25),
                        PRIMARY KEY(userid)
                    )"); */
                    $db->exec("insert into user(username,password) values('$username','$password')");
                }
			?>
		</div>
		<div class="login" style="width: 50%;">
			<h1>Already a Member</h1>
			<h3>Login Here</h3>
			<form action="Addmie.php" method='get'>
				username<input type='text' name='username' required/><br>
				password<input type='text' name='password' required/>
				<input type="submit" name='submit'>

			</form>
			<?php
			if(isset($_GET['submit'])){
				$db =new SQLite3('users.db');
				$user_login=$_GET['username'];
				$password_login=$_GET['password'];
				$result= $db->query("select rowid from user where username='$user_login' and password='$password_login' limit 1");
				/* while ($row = $result->fetchArray()) {
					for ($i=0; $i < count($row)/2; $i++) { 
						echo $row[$i];
					}
				} */ 				
				if($result->fetchArray()){
					echo 'loggedin';
					$_SESSION["user_login"]=$user_login;
					header('location:home.php');
					exit();
				}
				else{
					echo 'incorrect details';
				}
			}
			?>
		</div>
	<div>	
</body>
</html>


