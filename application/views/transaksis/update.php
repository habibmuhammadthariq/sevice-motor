<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
		.coba{
			right: 25px;
			position: absolute;
			top: 20px;
		}
	</style>
</head>
<body>
				<!-- Like Nav Bar -->
	<div class="form" style="background-color: #34495e; height: 50px; width: 1366px">
	  <div class="container col-12">
	  	<div class="row">
	  	  <div class="col-1"></div>
		  <div class="col-7" style="top: 10px;">
		  	<font color="white" size="5">>>Transaksi</font>
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
	  	<form method="POST" action="<?= base_url('transaksi/update'); ?>">
	  	  <h2>Edit Transaksi</h2>
		  <table class="table table-stripped" align="center">
		    <tr>	
			  <td> <label>Nama Pelanggan</label> </td>
			  <td> <input type="text" name="nama_pelanggan" class="form-control" value="<?= $transaksi['nama_pelanggan']; ?>"> </td>
		  	</tr>
		  	<tr>
			  <td><label>Kode Transaksi</label></td>
		 	  <td><input type="text" name="kode_transaksi" class="form-control" value="<?= $transaksi['kode_transaksi']; ?>"></td>
		  	</tr>
			<tr>
			  <td><label>Tanggal Transaksi</label></td>
			  <td><input type="date" name="tanggal_transaksi" class="form-control" value="<?= $transaksi['tanggal_transaksi']; ?>"></td>
			</tr>
			<tr>
			  <td><label>Total Harga Barang</label></td>
			  <td><input type="number" name="total_harga_barang" class="form-control" value="<?= $transaksi['total_harga_barang']; ?>"></td>
			</tr>
			<tr>
			  <td><label>Jasa Perbaikan</label></td>
			  <td><input type="number" name="jasa_perbaikan" class="form-control" value="<?= $transaksi['jasa_perbaikan']; ?>"></td>
			</tr>
			<tr>
			  <td><label>Total Bayar</label></td>
			  <td><input type="number" name="total_bayar"  class="form-control" value="<?= $transaksi['total_bayar']; ?>"></td>
			</tr>
			<tr>
			  <td><button type="submit" class="btn btn-primary">Submit</button></td>
			  <td><a class="btn btn-secondary" href="<?= base_url('transaksi'); ?>">Batal</a></td>
			</tr>
		  </table>		
	  	</form>
	  </div>
 	  </div>
	</div>
</body>
</html>