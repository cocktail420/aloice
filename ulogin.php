<?php
session_start();
    include "database.php";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>e-Library</title>
		<link rel="icon" type="image/png" href="images/tab-icon.png">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
		<body>
			<div id="container">
				<div id="header">
					<h1>LIBRARY</h1>
				</div>
				<div id="wrapper">
					<h3 id="heading"> User Login here</h3>
					<div id="center">
					<?php
					    if(isset($_POST["submit"]))
						{
							  $sql="SELECT * FROM student where NAME='{$_POST["name"]}' and PASS='{$_POST["pass"]}'";
							  $res=$db->query($sql);
							
							  if($res->num_rows>0)
							  {
								  $row=$res->fetch_assoc();
								  $_SESSION["ID"]=$row["ID"];
								    $_SESSION["NAME"]=$row["NAME"];
								 header("location:uhome.php");
							  }
							  else
							  {
								  echo "<p class='error'>Invalid User </p>";
							  }
							
						}
					?>
					<form action="ulogin.php" method="post"> 
						<label>Name</label>
						<input type="text" name="name" required>
						<label>Password</label>
						<input type="password" name="pass" required>
						<button type="submit" name="submit">Login Now</button>
					</form>
					</div>
				</div>
				<div id="navi">
<ul>
	<li><a href="alogin.php">Admin Login</a></li>
	<li><a href="ulogin.php" class="active">User Login</a></li>
	<li><a href="new.php">Sign up</a></li>
</ul>
				</div>
				<div id="footer">
				<p>Developed by
					<i><a href="#"  target="_blank">Cocktail Dev</a></i> and
					<i><a href="#" target="_blank">#</a></i>.
					</p>
				</div>
			</div>
		</body>
	</html>

