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
	<div class="playzone">
		<p>Когда вы нашли третью часть шифра число на ней оказалось затертым.</p>
		<p>Теперь вам придется подобрать шифр самостоятельно</p>
		<?php
		echo'
		<p>Что нужно записать под знаком "?" если известно что цифры кода идут от 0 до 9</p>
		<p>var x, y: integer;</p>
		<p>begin</p>
		<p>x:=0</p>
		<p>while y<? do</p>
		<p>begin</p>
		<p>y:= x;</p>
		<p>x:=x+1;</p>
		<p>write(y);</p>
		<p>end;</p>
		<p>end.</p>
		';
		echo"
		<form method='post'>
		<input type='text' name='podbor'>
		<input type='submit' name='prov' placeholder='Ввести ответ'>
		</form>";
		$podbor = (int)$_POST['podbor'];
		if ($_POST['prov']) {
			$prover = 1;
		}
		if ($prover == 1) {
			if ($podbor == 9) {
				echo"
				<p>Вы cмогли открыть замок!</p>
				<form action='levelthree.php' method='post'>
				<button name='vinir'>Завершить уровень</button>
				</form>";
			}
			else{
				echo"
				<p>Вы не открыли замок</p>
				<form action='levelthree.php' method='post'>
				<button name='proval'>Попробовать снова</button>
				</form>";
			}
		}
		if(isset($_SESSION['login']))
		{
			if (isset($_POST['vinir'])) {
				$sql="UPDATE `levels` 
				SET `LEVELTHREE` = '1'
				WHERE `ID` =1";
				$result = $cms->query($sql);

				echo"<script>document.location.href = 'ISCODE.php'</script>;";
			}
		}
		else{
			if (isset($_POST['vinir'])) {
				echo"<script>document.location.href = 'ISCODE.php'</script>;";
			}
		}
		?>
	</div>

</body>
</html>