<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit user system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="header">
		<h2>Edit User</h2>
	</div>
	
	<form class="register" method="post" action="..\Controller\UserController.php">

		<?php 
			if (!empty($errors))
			include('../view/errors.php'); 
		?>
		<?php
			$id=filter_input(INPUT_GET,'id');
			$user=users_db::FindUser($id);
		?>
		<div class="input-group">
			<label>Name</label>
			<input type="name" name="name" value="<?php echo $user->getName(); ?>">
		</div>

		<div class="input-group">
			<label>Phone</label>
			<input type="phone" name="phone" value="<?php echo $user->getPhone(); ?>">
		</div>

		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $user->getEmail(); ?>">
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" value="<?php echo $user->getPassword(); ?>">
		</div>

		<div class="input-group">
			<label>Roles</label>
			<select name="role">
				<option value="admin" <?php if($user->getRoles()=="admin") echo 'selected';?> >Admin</option>
				<option value="staff" <?php if($user->getRoles()=="staff") echo 'selected';?> >Staff</option>
				<option value="customer" <?php if($user->getRoles()=="customer") echo 'selected';?> >Customer</option>
			</select>
		</div>

		<input type="hidden" name="userID" value="<?php echo $id;?>">
		<input type="hidden" name="action" value='update_user'>

		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Update</button>
		</div>		
	</form>
</body>
</html>