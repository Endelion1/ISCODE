<?php
include 'bd/session.php';
require_once('bd/dbcon.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
	<header>
		<div class="logo" onclick="javascript:location.href = 'ISCODE.php';">
			<h1 class="logo_text">Остров Кода</h1>
		</div>
		<div class="vozvrat">
			<div class="code">
				<?php

				$login=$_POST['name'];
				$pas=md5($_POST['pas']);

				$sql="SELECT * FROM `users` WHERE `LOGIN` = '$login' and `PASWORD`='$pas' ";
				$result=$cms->query($sql);

				if ($result->num_rows > 0)
				{
					$row = $result->fetch_assoc();
				}

				if(isset($_POST['logout']))
				{
					unset($_SESSION['login']);
					unset($_SESSION['rank']);
					unset($_SESSION['iduser']);
				}
				print_r($_SESSION);
				?>
			</div>
			<?php

			if(isset($_SESSION['login']))
			{
				$sql="SELECT FIO FROM `users` WHERE `ID` = '{$_SESSION['iduser']}' ";
				$result=$cms->query($sql);
				$row = $result->fetch_assoc();
				echo "
				<form action='ISregister.php' method='post'>
				<button>Профиль</button>
				<p></p>
				<button name='logout'>Выход</button>
				</form>
				";

			}
			else{
				echo'<button onclick="back()">Вернуться к регистрации</button>';
			}
			?>
		</div>
	</header>
	<div class="list">
		<div class="listlevels">
			<button onclick="vinlevel()">1</button>
		</div>
		<div class="listlevels">
			<button>2</button>
		</div>
		<div class="listlevels">
			<button>3</button>
		</div>
	</div>
</body>
</html>