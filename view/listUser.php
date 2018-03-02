
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="header_list">
		<h2>List Of Users</h2>
	<form  method='post' action="..\Controller\UserController.php" name="frm_logout" style="float:right;">
			Hello : <?php //echo $us->getName(); ?> <button type="submit" name="action" value="logout">Logout</button>
	</form>
	<?php 
		//if($us->getRoles()=='admin' || $us->getRoles()=='staff'){
	?>
	<div class="input-group">
			<a href="?&action=register">Add</a>
	</div>
	<?php 
		
		//}
	?>
	</div>
	<table class="list_user">
		<tr>
			<th> Id</th>
			<th> Name</th>
			<th> Phone</th>
			<th> Email</th>  
			<th> Roles</th> 
			<th colspan=2> Action</th>				
		</tr>
		
			<?php 
				$users = $data;
				foreach ($users as $value) {
			?>
			<tr>
			<td><?php echo $value->getId(); ?></td>
			<td><a href="?&action=information&idUser=<?php echo $value->getId(); ?>"><?php echo $value->getName(); ?></a></td>
			<td><?php echo $value->getPhone(); ?></td>
			<td><?php echo $value->getEmail(); ?></td>
			<td><?php echo $value->getRoles(); ?></td>
			<?php 
				//if($us->getRoles()=='admin'){
			?>
			<td><a href="?&action=edit&id=<?php echo $value->getId(); ?>">Edit</a> </td>
			<td><a href="?&action=delete&id=<?php echo $value->getId(); ?>" onclick="return xacnhan('Bạn đã chắc chắn muốn xóa')">Delete</a></td>
			
			</tr>
			<?php 
				//}
			?>

			<?php
				}
			?>
		
	</table>
	<script type="text/javascript">
	
	function xacnhan(msg) {
		if (window.confirm(msg)) {
			return true;
		}
		return false;
	}
</script>		
</body>

</html>