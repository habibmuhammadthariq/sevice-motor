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
		background-color: #34495e;
	}
	</style>
</head>
<body>
	<div class="container jumbotron col-4">
		<center><font size="8" color="white">Login</font></center>
		<form method="POST" action="<?= 'user/authenticate'; ?>">
		<?= $this->session->flashdata('succeeded'); ?>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" placeholder="Username" class="form-control">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" placeholder="password" class="form-control">
			</div>
		<?= $this->session->flashdata('failed'); ?> <br>
			<center>
			  <button type="submit" class="btn btn-outline-warning my-2 my-sm-0">Submit</button>
			  <h4>Tidak Punya Akun ? <span><a href="<?= base_url('user/register'); ?>">Buat Akun</a></span></h4>
			</center>
		</form>
	</div>
</body>
</html>