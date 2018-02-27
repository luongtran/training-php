<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Information system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="header">
		<h2>Information</h2>
	</div>
		<div class="input-group" style="margin-left: 35%;">
			<label>Name : <?php echo $us->getName(); ?></label>
		</div>

		<div class="input-group" style="margin-left: 35%;">
			<label>Phone : <?php echo $us->getPhone(); ?></label>
			<p></p>
		</div>

		<div class="input-group" style="margin-left: 35%;">
			<label>Email : <?php echo $us->getEmail(); ?></label>
			<p></p>
		</div>

		<div class="input-group" style="margin-left: 35%;">
			<label>Roles : 	
				<?php 
				if($us->getRoles()=="admin") 
				{
					echo "admin";
				}
				elseif($us->getRoles()=="staff")
				{
					echo "staff";
				}
				else
				{
					echo "customer";
				}
			?>
			</label>
			
		</div>
		<form  method='post' action="..\Controller\UserController.php" name="frm_logout" style="margin-left: 35%;">
			Hello : <?php echo $us->getName(); ?> <button type="submit" name="action" value="logout">Logout</button>
	</form>
		
</body>
</html>