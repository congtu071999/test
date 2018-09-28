<?php require 'data.php' ?>

<!DOCTYPE html>
<html>
<head>
	<title>Bai5</title>
</head>
<body>
	<table>
		
		<tr>
			<td>STT</td>
			<td>ID</td>
			<td>Name</td>
			<td>Gmail</td>
		</tr>
		<?php for($i = 0; $i < 5; $i++): ?>
		<tr>
			<td><?php echo $i+1; ?></td>
			<td><?php echo $users[$i]['id']; ?></td>
			<td><?php echo $users[$i]['name']; ?></td>
			<td><?php echo $users[$i]['email']['gmail']; ?></td>
		</tr>
		<?php endfor; ?>
	</table>

<table>
	<caption style="font-weight: bold; font-size: 15px; color: blue;">Đã Sắp Xếp</caption>

		<tr>
			<td>STT</td>
			<td>ID</td>
			<td>Name</td>
			<td>Gmail</td>
		</tr>

		<?php 
			for ($i = 0; $i < 4; $i++) { 
				for ($j=$i+1; $j < 5; $j++) { 
				if ($users[$i]['id'] > $users[$j]['id']) {
					$temp = $users[$i];
					$users[$i] = $users[$j];
					$users[$j] = $temp;
				}
			}
		}
		?>
		<?php for($i = 0; $i < 5; $i++): ?>
		<tr>
			<td><?php echo $i+1; ?></td>
			<td><?php echo $users[$i]['id']; ?></td>
			<td><?php echo $users[$i]['name']; ?></td>
			<td><?php echo $users[$i]['email']['gmail']; ?></td>
		</tr>
		<?php endfor; ?>
</table>

<form method="get" action="cau5.php">
	ID <input type="text" name="find" style="width: 30%; border: 3px solid green; border-radius: 5px; color: red; " />
	<input type="submit" value="Tìm Kiếm" />
</form>
<?php 
	if(empty($_GET) == false) 
        {       
                 for($i = 0; $i < count($users); $i++)
                {
                   if($_GET['find'] == $users[$i]['id'])
                        {
                                echo $i;
                                $contain = $i;
                                $check = true;      
                        }
                 }
        }
?>
<?php if($check == false && empty($_GET) == false): ?>
	<h4 style="color: red;"><b>Không tìm thấy</b></h4>
<?php endif; ?>
<?php if($check == true): ?>
	<h4 style="color: green;"><b>Tim thấy rồi người đó là</b></h4>
	<table>
	<tr>
			<td>STT</td>
			<td>ID</td>
			<td>Name</td>
			<td>Gmail</td>
	</tr>

	<tr>
			<td><?php echo $contain+1; ?></td>
			<td><?php echo $users[$contain]['id']; ?></td>
			<td><?php echo $users[$contain]['name']; ?></td>
			<td><?php echo $users[$contain]['email']['gmail']; ?></td>
	</tr>
	</table>
<?php endif; ?>



</body>
</html>


