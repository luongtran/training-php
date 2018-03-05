<?php include('header.php'); ?>
<body>
	<div class="header_list">
		<h2>List Of Users</h2>
	<form  method='post' action="<?php echo base_url(); ?>/UsersController/logout" name="frm_logout" style="float:right;">
			Hello : <?php echo Session::get('name');  ?><button type="submit" name="action" value="logout">Logout</button>
	</form>
	<div class="input-group">
			<a href="<?php echo base_url(); ?>/UsersController/formAdd">Add</a>
	</div>
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
				foreach ($users as $value) {
			?>
			<tr>
			<td><?php echo $value['id']; ?></td>
			<td><a href="#"><?php echo $value['name']; ?></a></td>
			<td><?php echo $value['phone']; ?></td>
			<td><?php echo $value['email']; ?></td>
			<td><?php echo $value['roles']; ?></td>
			<?php if(Session::get('role')=='admin') { ?>
			<td><a href="<?php echo base_url(); ?>/UsersController/edit/<?php echo $value['id']; ?>">Edit</a> </td>
			<td><a href="<?php echo base_url(); ?>/UsersController/delete/<?php echo $value['id']; ?>" onclick="return xacnhan('Bạn đã chắc chắn muốn xóa')">Delete</a></td>
			
			</tr>
			<?php 
				}
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