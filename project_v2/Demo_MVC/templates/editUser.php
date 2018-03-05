<?php include('header.php'); ?>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form class="register" method="post" action="<?php echo base_url(); ?>/UsersController/update">
		
		<div class="input-group">
			<label>Name</label>
			<input type="name" name="name" value="<?php echo $user['name'] ?>">
		</div>

		<div class="input-group">
			<label>Phone</label>
			<input type="phone" name="phone" value="<?php echo $user['phone'] ?>">
		</div>

		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $user['email'] ?>">
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" value="<?php echo $user['password'] ?>">
		</div>

		<div class="input-group">
			<label>Roles</label>
			<select name="role">
				<option value="admin" <?php if($user['roles']=="admin") echo "selected" ?> >Admin</option>
				<option value="staff"  <?php if($user['roles']=="staff") echo "selected" ?> >Staff</option>
				<option value="customer"  <?php if($user['roles']=="customer") echo "selected" ?> >Customer</option>
			</select>
		</div>

		
		<input type="hidden" name="id"  value="<?php echo $user['id'] ?>">

		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
	</form>
</body>
</html>