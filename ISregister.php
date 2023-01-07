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
</head>
<body>
	<header>
		<div class="logo">
			<h1 class="logo_text">Остров Кода</h1>
		</div>
	</header>
	<div class="fone">
		<div class="vxod">
			<button onclick="javascript:location.href = 'ISCODE.php'">Войти как гость</button>
		</div>

		<div class="code">
			<?php
			print_r($_POST);
			$fio=$_POST['name'];
			$phone=$_POST['phone'];
			$email=$_POST['email'];
			$login=$_POST['login'];
			$pas=$_POST['pas'];
			$repas=$_POST['repas'];


			$error='';
			if (isset($_POST['register'])) {

				if(strlen($fio)<2)
				{
					$error.="Вы ввели слишком короткое имя ";
				}
				if(strlen($login)<2)
				{
					$error.="Вы ввели не корректный логин ";
				}
				if($pas!=$repas)
				{
					$error.="Пароли не совпадают ";
				}
				


				if($error=='')
				{
					$newpas=md5($pas);

					$sql="INSERT INTO `users` 
					(`ID`, `FIO`, `LOGIN`, `PASWORD`) 
					VALUES 
					(NULL, '$fio', '$login', '$newpas')";

					$result=$cms->query($sql);

					echo "Пользователь зарегестрирован";
				}
				if ($error=='') {
					$levelone=$_POST['levelone'];
					$leveltwo=$_POST['leveltwo'];
					$levelthree=$_POST['levelthree'];

					$sql="INSERT INTO `levels` 
					(`ID`, `LEVELONE`, `LEVELTWO`, `LEVELTHREE`) 
					VALUES 
					(NULL, '$levelone', '$leveltwo', '$levelthree')";

					$result=$cms->query($sql);
				}
			}

			?>
		</div>


		<section class="cantainer">
			<div class="reg">
				<form action="ISregister.php" method="post" class="zakaz">
					<b>Регистрация</b>
					<div class="tex_reg">
						<label for="">ФИО</label>
						<input type="text" name="name" value="" class="iform" placeholder="Имя">
					</div>
					<div class="tex_reg">
						<label for="">Логин</label>
						<input type="text" name="login" value="" class="iform" placeholder="Логин">
					</div>
					<div class="tex_reg">
						<label for="">Пароль</label>
						<input type="password" name="pas" value="" class="iform" placeholder="Пароль">
					</div>
					<div class="tex_reg">
						<label for="">Повтор пароля</label>
						<input type="password" name="repas" value="" class="iform" placeholder="Пароль">
					</div>

					<p></p>
					<input type="checkbox" name="soglasen" value="1" checked> Я даю согласие на обработку персональных данных

					<button name="register">Зарегистрироваться</button>
				</form>
			</div>
			<div class="avtoreg">
				<div class="code">
					<?php
					if(isset($_POST['enter']))
					{	
						$login=$_POST['name'];
						$pas=md5($_POST['pas']);

						$sql="SELECT * FROM `users` WHERE `LOGIN` = '$login' and `PASWORD`='$pas' ";
						$result=$cms->query($sql);

						if ($result->num_rows > 0)
						{
							$row = $result->fetch_assoc();

							$massage="Привет {$row['FIO']}";
							$_SESSION['login']=$row['LOGIN'];
							$_SESSION['rank']=$row['RANK'];
							$_SESSION['iduser']=$row['ID'];

							echo"<script>document.location.href = 'ISCODE.php'</script>;";
						}
						else
						{
							$error='такого пользователя нет';
						}
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
					<h1>Привет <b>{$row['FIO']}</b></h1>
					<a href=''>Профиль</a>
					<form action='ISregister.php' method='post' class='zakaz'>
					<button name='logout'>Выход</button>
					</form>
					";

				}
				else
				{
					if($massage!='')
					{
						echo $massage;
					}
					else
					{
						if($error!='')
						{
							echo $error;
						}
						echo'
						<form action="ISregister.php" method="post" class="zakaz">
						<b>Авторизация</b>
						<div class="tex_reg">
						<label for="">Логин</label>
						<input type="text" name="name" value="" class="iform" placeholder="Логин">
						</div>
						<div class="tex_reg">
						<label for="">Пароль</label>
						<input type="password" name="pas" value="" class="iform" placeholder="Пароль">
						</div>
						<button name="enter">Вход</button>
						</form>
						';
					}
				}

				?>
			</div>
		</section>
	</div>
</body>
</html>