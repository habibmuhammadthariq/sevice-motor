<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
	html,body {
	  height:100%;
	  width:100%;
	  margin:0;
	}
	body , body {
  		display:flex;
	}
	form {
  		margin:auto;
	}
	.jumbotron{
		margin:auto;
	}
	</style>
</head>
<body>
	<div class="container jumbotron col-4">
		<center><h2>Daftar</h2></center>
		<form method="POST" action="<?= base_url('user/create'); ?>">
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input type="text" name="nama" placeholder="Nama Lengkap" class="form-control">
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" placeholder="Username" class="form-control">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" placeholder="input your password" class="form-control">
			</div>
			<div class="form-group">
				<label>Role</label>
				<select name="role" class="form-control">
					<option value="manager">Manager</option>
					<option value="karyawan">Karyawan</option>
				</select>
			</div>
			<div class="form-group">
				<label>Tempat Lahir</label>
				<input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control">
			</div>
			<div class="form-group">
				<label>Tanggal Lahir</label>
				<input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control" min="08-05-1960" max="12-07-2017">
			</div>
			<center>
			  <button type="submit" class="btn btn-primary">Daftar</button>
			</center>
		</form>
	</div>
</body>
</html>