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

	<div>
		<ul>
			<li>
				<div class="clcl">

					<?php
					echo'<form action="istor.php" method="post">
					<button class="clcl_button">Начать игру</button>
					</form>';
					?>
				</div>
			</li>
			<li>
				<div class="clcl">
					<?php
					if (isset($_SESSION['login'])) {
						echo'<button class="clcl_button" onclick="last()">Список уровней</button>';
					}
					else{
						echo'<button class="clcl_button" onclick="err()">Список уровней</button>';
					}
					?>
				</div>
			</li>
			<li>
				<div class="clcl">
					<?php
					if (isset($_SESSION['login'])) {
						echo'<button class="clcl_button" onclick="last()">Создать кастомный уровень</button>';
					}
					else{
						echo'<button class="clcl_button" onclick="err()">Создать кастомный уровень</button>';
					}
					?>
				</div>
			</li>
			<li>
				<div class="clcl">
					<?php
					if (isset($_SESSION['login'])) {
						echo'<button class="clcl_button" onclick="last()">Загрузить кастомный уровень</button>';
					}
					else{
						echo'<button class="clcl_button" onclick="err()">Загрузить кастомный уровень</button>';
					}
					?>
				</div>
			</li>
		</ul>
	</div>
</body>
</html>