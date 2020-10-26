<?php 

require('../bd.php');
if ($_COOKIE['role']==1) {
}
else{

	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<style>
 	*{
 		margin: 0;
 		padding: 0;
 		box-sizing: border-box;
 	}
 	body{
 		width: 90%;
 		margin: 0 auto;
 		display: flex;
 		justify-content: space-between;
 	}
 	li{
 		list-style: none;
 	}
 	a{
		text-decoration: none;
		color: #000;
 	}
 	a:hover{
 		color:red;
 	}
 	.list{
		width: 30%;
		border: 1px solid black;
		padding:10px;

 	}
 	.head{
 		font-size: 26px;
 	}

   table { 
    width: 100%; /* Ширина таблицы */
    border: 4px double black; /* Рамка вокруг таблицы */
    border-collapse: collapse; /* Отображать только одинарные линии */
   }
   th { 
    text-align: left; /* Выравнивание по левому краю */
    background: #ccc; /* Цвет фона ячеек */
    padding: 5px; /* Поля вокруг содержимого ячеек */
    border: 1px solid black; /* Граница вокруг ячеек */
   }
   td { 
    padding: 5px; /* Поля вокруг содержимого ячеек */
    border: 1px solid black; /* Граница вокруг ячеек */
   }
</style>

	<div class="list">
		<?php include('../admin_strax/module/menu.php'); ?>
	</div>
<table>
	<tr>
		<th>id</th>
		<th>Имя</th>
		<th>Логин</th>
		<th>Роль</th>
	</tr>
	<?php 
		$query = "SELECT * FROM `user`";
		$data = mysqli_query($bd,$query);
		while ($cat = mysqli_fetch_assoc($data)) { ?>
			<tr>
				<td><?php echo $cat['id']; ?></td>
				<td><?php echo $cat['name']; ?></td>
				<td><?php echo $cat['login']; ?></td>
				<td><form action="new_user.php" method="post">
					<input type="text" hidden name="id" value="<?php echo $cat['id']; ?>">
					<input type="text" name="password" placeholder="Хотите поменять пороль">
					<select name="role" id="">
						<?php 

							$query2 = "SELECT * FROM `role` WHERE id=".$cat['role'];
							$data2 = mysqli_query($bd,$query2); 
							$row2 =mysqli_fetch_assoc($data2);
						?>
						<option value="<?php echo $row2['id']?>"><?php echo $row2['name']; ?></option>
						<?php 
							$query1 = "SELECT * FROM `role` WHERE id!=".$cat['role'];
							$data1 = mysqli_query($bd,$query1); 
							while ($cat1 = mysqli_fetch_assoc($data1)) { ?>
								<option value="<?php echo $cat1['id']?>"><?php echo $cat1['name']; ?></option>
							<?php } ?>
					</select>
					<input type="submit" name="btn">
				</form></td>
			</tr>
		<?php } ?>
</table>
</body>
</html>