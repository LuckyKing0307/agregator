<?php 
require('../bd.php');

if (isset($_GET['id'])) {
	$in = $_GET['index'];
	$rep = $_GET['rep'];
	$item = json_encode($in);
	if (isset($_GET['change'])) {
		$st=',';
		if (isset($_GET['stage'])) {
			for ($i=0; $i < count($_GET['stage']); $i++) { 
				$st.=$_GET['stage'][$i].',';
			}
		}
		$km=',';
		if (isset($_GET['km'])) {
			for ($i=0; $i < count($_GET['km']); $i++) { 
				$km.=$_GET['km'][$i].',';
			}
		}
		$qwery_strax = "UPDATE `strax` SET sity_tb='$item',km='$km', stage='$st',reyt='$rep' WHERE id=".$_GET['id'];
		$data_strax = mysqli_query($bd,$qwery_strax);
		// Указ Без лимита
		$limit = $_GET['limit'];
		$qwery_limit = "UPDATE `strax` SET bezlimit ='$limit',km='$km', stage='$st',reyt='$rep' WHERE id=".$_GET['id'];
		$data_limit = mysqli_query($bd,$qwery_limit);
		// Пауза
		if (isset($_GET['pause'])) {
			$pause=1;
		}else{
			$pause=0;
		}
		// Коммисия сервиса
		if ($_GET['kom']==0) {
		$koef = $_GET['koef']/100+1;
		$qwery_koef = "UPDATE `strax` SET koef_bt ='$koef',koef_bt_summ='0',pause='$pause',km='$km', stage='$st',reyt='$rep' WHERE id=".$_GET['id'];
		$data_koef = mysqli_query($bd,$qwery_koef);
		}
		else{
		$koef = $_GET['koef'];
		$qwery_koef = "UPDATE `strax` SET koef_bt ='1',koef_bt_summ='$koef',pause='$pause',km='$km', stage='$st',reyt='$rep' WHERE id=".$_GET['id'];
		$data_koef = mysqli_query($bd,$qwery_koef);
		}
		header('Location: index.php');
	}

}
if (isset($_GET['add'])) { 
	

	$qwery_strax = 'SELECT * FROM strax WHERE id='.$_GET['id'];
	$data_strax = mysqli_query($bd,$qwery_strax);
	$row = mysqli_fetch_assoc($data_strax);
	$qw = "SELECT * FROM `sity`";
	$d = mysqli_query($bd,$qw);

	$km = explode(',', $row['sities']);
	?>
	<form action="add.php" method="POST">
	<?php while ($cat = mysqli_fetch_assoc($d)) {
		if (array_search($cat['id'], $km)) { ?>
		<input type="checkbox" name="km[]" value="<?php echo $cat['id']?>" checked><?php echo $cat['name']; ?><br>
		<?php }else{ ?>
		<input type="checkbox" name="km[]" value="<?php echo $cat['id']?>" ><?php echo $cat['name']; ?><br>
		
		<?php }							
	}?>
	<input type="submit" name="add">
	<input type="text" hidden name="sity_id" value='<?php echo json_encode($_GET['index']);?>'>
	<input type="text" hidden name="id" value='<?php echo $_GET['id'];?>'>
	</form>
<?php }
?>