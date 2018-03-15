<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="col-xs-8 col-xs-offset-2" style="margin-top:50px;">
    <table class="table table-hover">
      <tr>
          <td>Id</td>
          <td>Name</td>
					<td>Email</td>
          <td>Role</td>
          <td>Action</td>
      </tr>
      @foreach($users as $value)
      <tr>
          <td>{{ $value->id }}</td>
          <td>{{ $value->name }}</td>
					<td>{{ $value->email }}</td>
					@if($value->role==0)
          		<td>Admin</td>
					@elseif($value->role==1)
							<td>Staff</td>
					@else
							<td>Customer</td>
					@endif
					@if(Auth::user()->role==0)
          <td><a href="{{url('/user'.'/'.$value->id.'/edit')}}">edit</a>
              <a href="{{url('/user'.'/'.$value->id.'/delete')}}">delete</a>
          </td>
					@endif
      </tr>
      @endforeach
    </table>
		<a href="{{ url('/create/user') }}" class="btn btn-primary">Add</a>
		<a href="{{ url('/logout') }}" class="btn btn-primary">logout</a>
  </div>
</body>
</html>
