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
		<p>Вторая часть шифра была зарыта глубоко на острове</p>
		<p>Чтобы добраться до шифра нужно раскопать яму</p>
		<p>Но нужно копать осторожно, чтобы не промахнуться</p>
		<?php
		$randomi = $_SESSION['randomit'];
		if ($randomi == 1) {
			echo'
			<p>Известно что клад закопан на глубине 5 метров</p>
			<p>Что нужно записать под знаком "?"</p>
			<p>var x, y: integer;</p>
			<p>begin</p>
			<p>for x:=1 to ? do</p>
			<p>y:= x;</p>
			<p>write(y);</p>
			<p>end.</p>';
			echo"
			<form method='post'>
			<input type='text' name='kop'>
			<input type='submit' name='prov' placeholder='Ввести ответ'>
			</form>";
			$kop = (int)$_POST['kop'];
			if ($_POST['prov']) {
				$prover = 1;
			}
			if ($prover == 1) {
				if ($kop == 5) {
					echo"
					<p>Вы нашли второй кусочек шифра!</p>
					<form action='leveltwo.php' method='post'>
					<button name='vini'>Завершить уровень</button>
					<button name='nextthree'>Следующий уровень</button>
					</form>";
				}
				elseif ($kop > 5) {
					echo"
					<p>Вы копали слишком глубоко</p>
					<form action='leveltwo.php' method='post'>
					<button name='proval'>Попробовать снова</button>
					</form>";
				}
				else{
					echo"
					<p>Вы не докопали</p>
					<form action='leveltwo.php' method='post'>
					<button name='proval'>Попробовать снова</button>
					</form>";
				}
			}
		}
		elseif ($randomi == 2) {
			echo'
			<p>Известно что клад закопан на глубине 12 метров</p>
			<p>Один из ваших матросов решил вам помочь и работа становится в два раза быстрее</p>
			<p>Что получится в итоге выполнения програмы?</p>
			<p>var x: integer;</p>
			<p>var y: real;</p>
			<p>begin</p>
			<p>for x:=1 to 12 do</p>
			<p>y:= x/2;</p>
			<p>write(y);</p>
			<p>end.</p>
			';
			echo"
			<form method='post'>
			<input type='text' name='kopan'>
			<input type='submit' name='prov' placeholder='Ввести ответ'>
			</form>";
			$kopan = (int)$_POST['kopan'];
			if ($_POST['prov']) {
				$prover = 1;
			}
			if ($prover == 1) {
				if ($kopan == 6) {
					echo"
					<p>Вы нашли второй кусочек шифра!</p>
					<form action='leveltwo.php' method='post'>
					<button name='vini'>Завершить уровень</button>
					<button name='nextthree'>Следующий уровень</button>
					</form>";
				}
				elseif ($kopan > 6) {
					echo"
					<p>Вы копали слишком глубоко</p>
					<form action='leveltwo.php' method='post'>
					<button name='proval'>Попробовать снова</button>
					</form>";
				}
				else{
					echo"
					<p>Вы не докопали</p>
					<form action='leveltwo.php' method='post'>
					<button name='proval'>Попробовать снова</button>
					</form>";
				}
			}
		}
		else{
			echo'
			<p>Известно что клад закопан на глубине 100 метров</p>
			<p>Сколько пиратов вам должно помочь, чтобы добраться до шифра за два копания?</p>
			<p>var x: integer;</p>
			<p>var y: real;</p>
			<p>begin</p>
			<p>for x:=1 to 100 do</p>
			<p>y:= x/?;</p>
			<p>write(y);</p>
			<p>end.</p>
			';
			echo"
			<form method='post'>
			<input type='text' name='kopanie'>
			<input type='submit' name='prov' placeholder='Ввести ответ'>
			</form>";
			$kopanie = (int)$_POST['kopanie'];
			if ($_POST['prov']) {
				$prover = 1;
			}
			if ($prover == 1) {
				if ($kopanie == 50) {
					echo"
					<p>Вы нашли второй кусочек шифра!</p>
					<form action='leveltwo.php' method='post'>
					<button name='vini'>Завершить уровень</button>
					<button name='nextthree'>Следующий уровень</button>
					</form>";
				}
				elseif ($kopanie > 50) {
					echo"
					<p>Вы копали слишком глубоко</p>
					<form action='leveltwo.php' method='post'>
					<button name='proval'>Попробовать снова</button>
					</form>";
				}
				else{
					echo"
					<p>Вы не докопали</p>
					<form action='leveltwo.php' method='post'>
					<button name='proval'>Попробовать снова</button>
					</form>";
				}
			}
		}
		if(isset($_SESSION['login']))
		{
			if (isset($_POST['vini'])) {
				$sql="UPDATE `levels` 
				SET `LEVELTWO` = '1'
				WHERE `ID` =1";
				$result = $cms->query($sql);
				echo"<script>document.location.href = 'ISCODE.php'</script>;";
			}
			elseif (isset($_POST['nextthree'])) {
				$sql="UPDATE `levels` 
				SET `LEVELTWO` = '1'
				WHERE `ID` =1";
				$result = $cms->query($sql);
				echo"<script>document.location.href = 'levelthree.php'</script>;";
			}
		}
		else{
			if (isset($_POST['vini'])) {
				echo"<script>document.location.href = 'ISCODE.php'</script>;";
			}
			elseif (isset($_POST['nextthree'])) {
				echo"<script>document.location.href = 'levelthree.php'</script>;";
			}
		}
		?>
	</div>

</body>
</html>