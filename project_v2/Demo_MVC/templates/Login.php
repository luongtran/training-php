<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../Demo_MVC/public/css/style.css">
</head>

<body>
		<div class="header">
			<h2>Login to the system</h2>		
		</div>

		<form class="login" method = "post" action="?controller=UsersController&action=login">
			
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