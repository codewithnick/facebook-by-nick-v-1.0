<?php
session_start();
?>
<div class="headermenu">
		<div id ='wrapper'>
			<div class="logo">
				<img src="Addmie.png">
			</div>
			<div class="title"> Addmie</div>
			<div class="search_box">
				<form action="search.php" method="GET" id= "search">
					<input type="text" name="q" size="60" placeholder="search"> 
					<div id='search_font'><input type='button' name="search_submit" placeholder="search_submit"/></div>
				</form>
			</div>
			<div>
				<?php
				if(isset($_SESSION['user_login'])){
					echo
					'
					<div id="wrapper" style="width:auto;">
					<ul>
						<li><a href="home.php"><div style="font-size:18px;">home</div></a></li>
						<li><a href="profile.php"><div style="font-size:18px;">profile</div></a></li>
						<li><a href="logout.php"><div style="font-size:18px;">logout</div></a></li>
						<li><a href="settings.php"><div style="font-size:18px;">settings</div></a></li>
					</ul>
					</div>
					';
				}
				?>
			</div>
		</div>
	</div>