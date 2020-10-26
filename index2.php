<?php 
	require('bd.php');
    $query = "SELECT * FROM `sity`";
    $data = mysqli_query($bd,$query);
    $query1 = "SELECT * FROM `kmkoef`";
    $data1 = mysqli_query($bd,$query1);
    $query2 = "SELECT * FROM `stage`";
    $data2 = mysqli_query($bd,$query2);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>

<style>
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}
	form{
		display: flex;
		flex-direction: column;
	}
	.info{
		display: flex;
		justify-content: space-around;
	}
	.users_info{
		width: 46%;
	}
	.car{
		width: 46%;
		display: flex;
		flex-direction: column;
	}
	.car input,select{
		height: 30px;
		width: 100%;
	}.user{
		display: flex;
		justify-content: space-between;
	}
	.user input{
		height: 30px;
		width: 15%;
	}
	.btn{
		width: 200px;
		height: 60px;
		color:#fff;
		font-size: 24px;
		border: none;
		margin: 0 auto;
		background-color: #F97822;
	}
	.user_info{
		width: 100%;
		display: none;
	}
	.is_active{
		display: block;
	}
</style>
<form action="result.php" method="post">
	<div class="info">
		<div class="car">
			<?php if (isset($_COOKIE['login'])) { ?>
			<h1><?php echo $_COOKIE['login']; ?></h1>
			<?php } ?>
				<h1>CAR</h1>
			<label for="number">Номерной знак
			<input type="text" id="number" placeholder="Номерной знак" name="car_number" required></label>
			<label for="">Категория
			<select id="" disabled="disabled">
				<option value="Б">Категория Б</option>
			</select></label>
			<label for="">Цель использования
			<select id="" disabled="disabled">
				<option value="Личная">Личная</option>
			</select></label>
			<label for="">Марка
			<select id="" name="car">
				<option value="Каптива">Каптива</option>
			</select></label>
			<label for="">Мошность л.с.
			<select id=""  name="car_type">
					<?php while ($cat = mysqli_fetch_assoc($data1)) {
                    ?>
					<option value="<?php echo $cat['id'] ?>"><?php echo $cat['KmName']; ?></option>
                 <?php
                    } ?>
			</select></label>
			<label for="">Модель
			<select id="" name="carmodel">
				<option value="xs">xs</option>
			</select></label>
			<label for="">Год
			<select id="" name="year">
				<option value="2020">2020</option>
			</select></label>
		</div>
		<div class="users_info">
				<h1>Инфоримация о человеке</h1>
				<label for="">Инвормация о человеке</label>

			<div class="user">
				<input type="text" placeholder="Фамилия" name="surname" required>
				<input type="text" placeholder="Имя" name="name">
				<input type="text" placeholder="Очество" name="fathername" required>
				<input type="date" placeholder="Дата рождения" name="birthday" style="text-align: center;" required>
				<input type="text" placeholder="Паспорт" name="passport" required>
				<input type="date" placeholder="Дата выдачи" name="passport_date" style="text-align: center;" required>
			</div>
			<div class="inform">
				<label for="">Город<select name="sity" id="">
					<?php while ($cat = mysqli_fetch_assoc($data)) {
                    ?>
					<option value="<?php echo $cat['id'] ?>"><?php echo $cat['name']; ?></option>
                 <?php
                    } ?>
				</select></label>
			</div>
			<button class="list">Список</button>
			<button class="list1" style="display: none;">Без лимита</button>
			<br><br>
			<div class="user_info"><h1>Список водителей</h1>
				<input type="text" name="default" hidden disabled class="default">
				<?php
for ($i=1 ; $i <= 7 ; $i++) { ?>
    <div class="user user<?php echo $i;?>">
    <input type="text" placeholder="Фамилия" name="usurname[]">
    <input type="text" placeholder="Имя" name="uname[]">
    <input type="text" placeholder="Очество" name="ufathername[]">
    <input type="date" placeholder="Очество" name="data[]">
    <input type="date" name="stage[]" class="items">
    </div>
<?php } ?>
		</div>
		</div>


	</div>
	<hr style="margin: 20px 0;">
	<input type="submit" class="btn" placeholder="Узнать цену">
</form>
	<script src="js/main.js" defer></script>
	<script>
		let ko = ',';
		for (var i = 1; i <= 7; i++) {
			for (var k = 1; k <= 8; k++) {
				ko+=i+''+k+',';
			}
		}
		console.log(ko)
	</script>
</body>
</html>