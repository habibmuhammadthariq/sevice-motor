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
		  	<font color="white" size="5">>>Detail Transaksi</font>
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
		<center><h2>Pembelian Barang</h2></center>
	  <form method="post" action="<?= base_url('pembelian/update/') . $detail_transaksi['kode_transaksi'] . '/' . $detail_transaksi['jumlah'] . '/' . $detail_transaksi['id']; ?>">
		<table class="table table-stripped" align="center">
	  	  <tr>
	  	  	<td><label>Kode Transaksi</label></td>
	  	 	<td>
	  	 		<input type="text" name="kode_transaksi" class="form-control" value="<?= $detail_transaksi['kode_transaksi']; ?>" disabled>
	  	 	</td>
	  	  </tr>
	  	  <tr>
	  	  	<td><label>Nama Barang</label></td>
	  	  	<td>
	  	  	  <select name="kode_barang" class="form-control">
	  	  <?php foreach ($barang as $barang) : ?>
	  	  	<option value="<?= $barang['kode_barang']?>"><?= $barang['nama'];?></option>
	  	  <?php endforeach; ?>  
	  	  </select>
	  		</td>
	  	  </tr>
	  	  <tr>
	  	 	<td><label>Jumlah</label></td>
	  	  	<td>
	  	  	  <input type="number" name="jumlah" class="form-control" value="<?= $detail_transaksi['jumlah']; ?>">
	  	  	</td>
	      </tr>
	      <tr>
	      	<td><button type="submit" class="btn btn-primary">Submit</button></td>
	      	<td>
	      	  <a class="btn btn-secondary" href="<?= base_url('pembelian/read/') . $detail_transaksi['kode_transaksi'] ?>">Batal</a>	
	      	</td>
	      </tr>
		</table>	

<!-- 
	  	<div class="form-group">
	  	  <label>Kode Transaksi</label>
	  	  <input type="text" name="kode_transaksi" placeholder="Kode Transaksi" class="form-control" value="<?= $detail_transaksi['kode_transaksi']; ?>" disabled>
	  	</div>
	  	<div class="form-group">
	  	  <label>Nama Barang</label>
	  	
	  	</div>
	  	<div class="form-group">
	  	  <label>Jumlah</label>
	  	  <input type="number" name="jumlah" placeholder="Jumlah" class="form-control" >
	  	</div>
	  	 -->
	  	
	  </form>
	</div>
</body>
</html>