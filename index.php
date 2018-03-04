<!DOCTYPE html>
<html>
<head>
	<link  rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
	<title></title>
</head>
<body>
	<body>
		<div id="wrapper">
			<div id="header">
				
				<ul class="information">
					<li class="nav-item"><a href="index.php" class="item">О компании<a/></li>
					<li class="nav-item"><a href="index.php" class="item">Менеджмент компании</a></li>
					<li class="nav-item"><a href="index.php" class="item">Справочник контактых данных</a></li>
					<li class="name">"Сноуборд  - Онлайн"</li>
				</ul>
			</div>
			<div class="mountains">
				<?
				            $host = 'localhost';// лщкальный сервер
							$login  = 'root'; // имя логина для вхождение в БД
							$password  = ''; // пароль для вхождения в БД
							$db_name = 'users'; // имя БД
							$link = mysqli_connect($host, $login, $password, $db_name) or die(mysqli_error($link));
							//выполняем нижеследующий код, только если нажата кнопка 
							if (isset($_POST['submit'])) {
	 
							$query = mysqli_query($link, ("SELECT * FROM `sait`  WHERE `login`='".$_REQUEST['login']."'"));
										
							$row = mysqli_num_rows($query);// считаем количество рядов результата запроса 
							if (empty($_REQUEST['login'])) { //если переменная логина пуста или не существует 
								echo 'Вы не ввели логин';
							}elseif(empty($_REQUEST['password1'])){ // если переменная пароль пуста или не существует
								echo 'Вы не ввели пароль';
							}elseif ($row > 0) {
								echo 'Такой логин уже существует';// проверка логина на существование 
							}elseif(empty($_REQUEST['password2'])){// проверка ввел ли пользователь    поддтверждаения пароля 
								echo 'Вы не ввели подтверждение пароля';
							}elseif($_REQUEST['password1'] != $_REQUEST['password2']){// Проверка паролья и поддтверждение пароля на эдентичность
								echo 'Подтверждение паролья не совподает с первым паролем';
							}elseif (empty($_REQUEST['mail'])) { //проверка заполнения строки mail
								echo 'Вы не указали свой E-mail';
							}elseif (empty($_REQUEST['phone'])) {
								echo 'Вы не указали номер телефона';
							}
							elseif (empty($_REQUEST['name'])) { //Проверка на заполнение имени 
								echo 'Вы не указали  имя';
							}elseif (empty($_REQUEST['surname'])) { //проверка на заполнение фамилии
								echo 'Вы не указали фамилию';
							}elseif (empty($_REQUEST['toun'])) { // проверка заполнения города
								echo 'Вы не указали город';
							}else{


								//присваиваем переменную
							$login = $_REQUEST['login'];
							$password = md5($_REQUEST['password']);
							$mail = $_REQUEST['mail'];
							$phone = $_REQUEST['phone'];
							$date  = date('H:i:s d.m.Y');
							//$insert = mysqli_query("INSERT INTO `sait` (`login` ,`password` ,`email`,'date' ) VALUES ('$login', '$password', '$mail','$date')");
							$insert = "INSERT INTO sait SET login = '.$login.', password = '.$password.', phone = '.$phone.', email = '.$mail.', date ='.$date.' ";
							mysqli_query($link, $insert) or die(mysqli_error($link));
					
							if($insert){
								echo 'Вы успешно зарегестрировались';
							}else{
							echo 'Произошел непредвиденный сбой';
							      }
						       }
						       }
							
						
	
							//Задается стоимость товара
							
							if (isset($_REQUEST['snowbord'])) {
							 $_SESSION['snowbord'] = $_REQUEST['snowbord'];
							 $_SESSION['snowbord'] = 7000;
							    
								
							}
							if (isset($_REQUEST['boots'])) {
							$_SESSION['boots'] = $_REQUEST['boots'];
							$_SESSION['boots'] = 5000;
							
							}
							if (isset($_REQUEST['helmet'])) {
							$_SESSION['helmet'] = $_REQUEST['helmet'];
							$_SESSION['helmet'] = 8000;
								
								
							}
							if (isset($_REQUEST['glass'])) {
							$_SESSION['glass'] = $_REQUEST['glass'];
							$_SESSION['glass'] = 3000;
							
							}
				
							//общая стоимость всех выбранных товаров
							$sum =  $_SESSION['glass']+$_SESSION['helmet']+$_SESSION['boots']+ $_SESSION['snowbord'];
				
									
								
						
						
							// Кнопка для очитски корзины с товарами
							if(isset($_REQUEST['delete'])) {
							unset($_SESSION['snowbord']);
							unset($_SESSION['boots']);
							unset($_SESSION['helmet']);
							unset($_SESSION['glass']);
							}
?>							
			</div>

			<div id="left">
					<form action="" method="POST" class="check_in">
						<input type="hidden" name="date">
						<input type="text" name="name" placeholder="Имя"><br>
						<input type="text" name="surname" placeholder="Фамилия"><br>
						<input type="text" name="phone" placeholder="Номер телефона"><br>
						<input type="text" name="mail" placeholder="E-mail"><br>
						<input type="text" name="login" placeholder="Логин"><br>
						<input type="password" name="password1" placeholder="Пароль"><br>
						<input type="password" name="password2" placeholder="Повторите пароль"><br>
						<input type="submit" name="submit" value ="Зарегестрироваться"><br>
					</form>
						<p class="prise">  В каризине:  <?echo $sum ?> рублей</p>
					<form class="check_in">
						<input type="submit" name="purchase" value="Купить">
						<input type="submit" name="delete" value="Очистить корзину">
					</form>	
			</div>

			<div id="content">
					<div class="product">
					  <form method="GET">
						<center>
							<h3>Доска для сноуборда</h3>
							<p><a href="#" class = "snowbord"></a></p>
					  	
					  	 <p class="prise">Цена 7 000 рублей </p>
					  	 <input type="submit"  name="snowbord" value="Положить в корзину">
					  	 </center>
					  </form>
					</div>
					<div  class="product">
						<form method="GET">
							<center>
								<h3>Ботинки для сноуборда</h3>
								<p><a href="#" class="boots"></a></p>
							
							<p class="prise">Цена 5 000 рублей</p>
							<input type="submit" name="boots" value="Положить в корзину">
							</center> 
						</form>
					</div>
					<div class="product">
						<form method="GET" >
							<center>
								<h3>Шлем для сноуборда</h3>
								<p><a href="#" class="helmet"></a></p>
								<p class="prise"> 8 000 рублей</p>
								<input type="submit"  name="helmet" value="Положить в корзину">
							</center>
						</form>
					</div>
					<div class="product">
						<form method="GET">
						<center>
							<h3>Очки</h3>
							<p><a href="#" class="glass"></a></p>
							
							<p class="prise"> 3 000 рублей</p>
							<input type="submit" name="glass" value="Положить в корзину">
						</center>
						</form>
						
					</div>
				</div>
			</div>

			<div id="right">
					<div>
						<p class="float">
					</div>
			</div>

			

			<div id="footer" class="footer">
				<a class="author">© 2017-2018 Дмитриев Илья </a>
			</div>
		</div>
	</body>

</body>
</html>