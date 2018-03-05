<?php include('header.php'); ?>

<body>
		<div class="header">
			<h2>Login to the system</h2>		
			<?php if(isset($_SESSION['error'])) {
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			} ?>
		</div>
		<form class="login" method = "post" action="<?php echo base_url(); ?>/UsersController/login">
			
			<div class="input-group">
				<label> Email</label>
				<input type="text" name="email" required>
			</div>

			<div class="input-group">
				<label> Password</label>
				<input type="password" name="password" >
			</div>
		
			<input type="hidden" name="action" value="login">

			<div class="input-group">
				<button type="submit" class="btn" name="login_user">Login</button>
			</div>
		</form>
</body>
</html>