<!DOCTYPE html>
<html>
<head>
	<title>Tambah barang</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
					<!-- Like Nav Bar -->
	<div class="form" style="background-color: #34495e; height: 50px; width: 1366px">
	  <div class="container col-12">
	  	<div class="row">
	  	  <div class="col-1"></div>
		  <div class="col-7" style="top: 10px;">
		  	<font color="white" size="5">>>Data Barang</font>
		  </div>
		  <div class="col-4">	
			<div align="right">
			  <font color="white" size="5">
			    <?= $this->session->userdata['nama']; ?><br>
			    <span class="coba" align="center">
	      	  	  <font size="1"><?= $this->session->userdata['role'];?></font>
	      		</span>
	      	  </font>
	    	</div>
		    </div>
		  </div>
	  </div>
	</div>


		<!-- body of page -->
  	<div class="row no-gutters">
  						<!-- Link -->
	  <div class="col-sm-6 col-md-1" style="background-color: #313d4a; height: 600px" > <br><br>
	  	<label>
	  		<a align="center" class="nav-link" href="<?= base_url('welcome'); ?>"><font color="white">Dashboard</font></a>
	  	</label> 	
	  	<label>
	  		<a align="center" class="nav-link" href="<?= base_url('barang'); ?>"><font color="white">Barang</font></a>
	  	</label> 
	  	<label>
	  		<a align="center" class="nav-link" href="<?= base_url('transaksi'); ?>"><font color="white">Transaksi</font></a>
	  	</label>
	  <?php if ($this->session->userdata['role'] == 'manager') : ?>
	  	<label>
	  		<a align="center" class="nav-link" href="<?= base_url('rekap'); ?>"><font color="white">Rekapitulasi</font></a>
	  	</label>
	  <?php endif; ?>       
	  	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	  	<center>
	  		<a href="<?= base_url('user/logout'); ?>" class="btn btn-outline-info my-2 my-sm-0">Logout</a>	
	  	</center>
	  </div>


		<!-- body of page -->
	  <div class="col-6 col-md-10">		
  	  <div class="container col-6">
		<br>
		<form method="POST" action="<?= base_url('barang/create'); ?>">
		 	<!-- <center> --><h3>Tambah Data Barang</h3><!-- </center> -->
		  <table align="center" class="table table-stripped">
		  	<tr>	
				<td> <label>Kode Barang</label> </td>
				<td> <input type="text" name="kode_barang" class="form-control"> </td>
			</tr>
			<tr>
				<td><label>nama</label></td>
				<td><input type="text" name="nama" class="form-control"></td>
			</tr>
			<tr>
				<td><label>Tipe</label></td>
				<td><input type="text" name="tipe" class="form-control"></td>
			</tr>
			<tr>
				<td><label>Kategori</label></td>
				<td><input type="text" name="kategori" class="form-control"></td>
			</tr>
			<tr>
				<td><label>Merk</label></td>
				<td><input type="text" name="merk" class="form-control"></td>
			</tr>
			<tr>
				<td><label>Stok</label></td>
				<td><input type="number" name="stok"  class="form-control"></td>
			</tr>
			<tr>
				<td><label>Harga</label></td>
				<td><input type="number" name="harga" class="form-control"></td>
			</tr> 
			<tr>
				<td><button type="submit" class="btn btn-primary">Submit</button></td>
				<td><a class="btn btn-secondary" href="<?= base_url('barang'); ?>">Batal</a></td>
			</tr>
		  </table>
		</form>
	  </div>
	  </div>
	</div>
</body>
</html>