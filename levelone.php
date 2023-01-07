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
		<p>Отправляясь за первым кусочком шифра, вы пробираетесь через жаркие пески пустынь</p>
		<p>И когда остается дойти лишь пару метров до цели, перед вами появляется сфинкс</p>
		<p>Он требует от вас решения задачи, чтобы получить кусочек шифра</p>
		<p>Он говорит:</p>
		<?php
		$random = $_SESSION['randomi'];
		if ($random == 1) {
			echo"
			<p>Сможете решить мою загадку и код ваш</p>
			<p>Что должнл получиться в результате выполнения программы?</p>
			<p>var x, y: integer;</p>
			<p>begin</p>
			<p>begin</p>
			<p>for x:=1 to 5 do</p>
			<p>y:= x+1;</p>
			<p>end;</p>
			<p>y:= x*2;</p>
			<p>write(y);</p>
			<p>end.</p>
			</p>
			<p>Введите ответ и нажмите enter</p>
			";
			echo"
			<form method='post'>
			<input type='text' name='otv'>
			<input type='submit'  name='prov' placeholder='Ввести ответ'>
			</form>";
			$b = (int)$_POST['otv'];
			if ($_POST['prov']) {
				$prover = 1;
			}
			if ($prover == 1) {
				if ($b == 12) {
					echo"
					<p>Вы сообщаете ответ сфинксу и он, удивленный вашей находчивостью, отдает первый кусочек шифра</p>
					<form action='levelone.php' method='post'>
					<button name='vin'>Завершить уровень</button>
					<button name='nexttwo'>Следующий уровень</button>
					</form>";
				}
				elseif ($b != 12){
					echo"
					<p>Вы сообщаете ответ сфинксу и он, разозленный вашим ответом уходит не одавая вам шифр</p>
					<form action='levelone.php' method='post'>
					<button name='proval'>Попробовать снова</button>
					</form>";
				}
			}
		}
		elseif ($random == 2) {
			echo "
			<p>Сможете решить мою загадку и код ваш</p>
			<p>Какое число пропущено, если в итоге получилось 10?</p>
			<p>var x, y: integer;</p>
			<p>begin</p>
			<p>x:= 0;</p>
			<p>begin</p>
			<p>while x < ? do</p>
			<p>x:= x+1;</p>
			<p>y:= x+1;</p>
			<p>end;</p>
			<p>y:= x*2;</p>
			<p>write(y);</p>
			<p>end.</p>";
			echo"
			<form method='post'>
			<input type='text' name='otve'>
			<input type='submit' name='prov' placeholder='Ввести ответ'>
			</form>";
			$a = (int)$_POST['otve'];
			if ($_POST['prov']) {
				$prover = 1;
			}
			if ($prover == 1) {
				if ($a == 5) {
					echo"
					<p>Вы сообщаете ответ сфинксу и он, удивленный вашей находчивостью, отдает первый кусочек шифра</p>
					<form action='levelone.php' method='post'>
					<button name='vin'>Завершить уровень</button>
					<button name='nexttwo'>Следующий уровень</button>
					</form>";
				}
				elseif ($a != 5){
					echo"
					<p>Вы сообщаете ответ сфинксу и он, разозленный вашим ответом уходит не одавая вам шифр</p>
					<form action='levelone.php' method='post'>
					<button name='proval'>Попробовать снова</button>
					</form>";
				}
			}
		}
		else{
			echo "
			<p>Сможете решить мою загадку и код ваш</p>
			<p>Что должнл получиться в результате выполнения программы?</p>
			<p>var x, y: integer;</p>
			<p>begin</p>
			<p>x:= 2;</p>
			<p>begin</p>
			<p>if x >= 8 then</p>
			<p>x:= x+1</p>
			<p>else</p>
			<p>y:= x+1;</p>
			<p>end;</p>
			<p>y:= y*2;</p>
			<p>write(x);</p>
			<p>end.</p>";
			echo"
			<form method='post'>
			<input type='text' name='otvet'>
			<input type='submit' name='prov' placeholder='Ввести ответ'>
			</form>";
			$c = (int)$_POST['otvet'];
			if ($_POST['prov']) {
				$prover = 1;
			}
			if ($prover == 1) {
				if ($c == 2) {
					echo"
					<p>Вы сообщаете ответ сфинксу и он, удивленный вашей находчивостью, отдает первый кусочек шифра</p>
					<form action='levelone.php' method='post'>
					<button name='vin'>Завершить уровень</button>
					<button name='nexttwo'>Следующий уровень</button>
					</form>";
				}
				elseif ($c != 2){
					echo"
					<p>Вы сообщаете ответ сфинксу и он, разозленный вашим ответом уходит не одавая вам шифр</p>
					<form action='levelone.php' method='post'>
					<button name='proval'>Попробовать снова</button>
					</form>";
				}
			}
		}
		if(isset($_SESSION['login']))
		{
			if (isset($_POST['vin'])) {
				$sql="UPDATE `levels` 
				SET `LEVELONE` = '1'
				WHERE `ID` =1";
				$result = $cms->query($sql);
				echo"<script>document.location.href = 'ISCODE.php'</script>;";
			}
			elseif (isset($_POST['nexttwo'])) {
				$sql="UPDATE `levels` 
				SET `LEVELONE` = '1'
				WHERE `ID` =1";
				$result = $cms->query($sql);
				$_SESSION['randomit'] = rand(1,3);
				echo"<script>document.location.href = 'leveltwo.php'</script>;";
			}
		}
		else{
			if (isset($_POST['vin'])) {
				echo"<script>document.location.href = 'ISCODE.php'</script>;";
			}
			elseif (isset($_POST['nexttwo'])) {
				$_SESSION['randomit'] = rand(1,3);
				echo"<script>document.location.href = 'leveltwo.php'</script>;";
			}
		}	
		?>
		<!--<p>Для решения поставленной задачи прегодиться фомула</p>
		<?php
		/*$forum = $_POST['forum'];
		
		if (isset($_POST['one_button'])) {
			if (strlen($forum) == 11) {
				echo"Ответ: 0";
				echo"
				<p></p>
				<form action='levelone.php' method='post'>
				<button name='enteri'>Продолжить</button>
				</form>";
			}
			else{
				echo "
				<form action='levelone.php' method='post'>
				<div>
				<p>Напишите формулу без пробелов и лишних символов:</p>
				<input type='text' name='forum' placeholder='(x-32)*5/9'>
				<button name='one_button'>Рассчитать</button>
				</div>
				</form>";
				echo"Кажется в формуле есть ошибка";
			}
		}
		else{
			echo "
			<form action='levelone.php' method='post'>
			<div>
			<p>Напишите формулу без пробелов и лишних символов:</p>
			<input type='text' name='forum' placeholder='(x-32)*5/9'>
			<button name='one_button'>Рассчитать</button>
			</div>
			</form>";	
		}
		if (isset($_POST['enteri'])) {
			echo"
			<p>Вы сообщаете ответ сфинксу и он, удивленный вашей находчивостью, отдает первый кусочек шифра</p>
			<form action='levelone.php' method='post'>
			<button name='vin'>Завершить уровень</button>
			</form>";
		}
		*/	
	?>-->
</div>
</body>
</html>