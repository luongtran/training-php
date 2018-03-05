<?php include('header.php'); ?>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form class="register" method="post" action="?controller=UsersController&action=doAdd">
		
		<div class="input-group">
			<label>Name</label>
			<input type="name" name="name">
		</div>

		<div class="input-group">
			<label>Phone</label>
			<input type="phone" name="phone">
		</div>

		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email">
		</div>

		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>

		<div class="input-group">
			<label>Roles</label>
			<select name="role">
				<option value="admin">Admin</option>
				<option value="staff">Staff</option>
				<option value="customer">Customer</option>
			</select>
		</div>

		
		<input type="hidden" name="action" value='add_user'>

		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
	</form>
</body>
</html>