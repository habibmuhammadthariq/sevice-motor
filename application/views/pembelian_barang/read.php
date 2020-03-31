<!DOCTYPE html>
<html>
<head>
	<title>Read Data</title>
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
  	  <div class="container col-12">
		<br> <br>
		<center><h2>Detail Transaksi</h2></center>
		<a href="<?= base_url('pembelian/insert/') . $kode['kode_transaksi']; ?>" class="btn btn-primary">Add Item</a>
		  <table class="table table-stripped" align="center">
		  	<thead>
		  	  <tr>
		  	 	<th>Kode Barang</th>
		  	 	<th>Nama Barang</th>
		  	 	<th>Jumlah</th>
		  	 	<th>Total Harga</th>
		  	 	<th>Action</th>		
		  	  </tr>
		  	</thead>
		  	<tbody>
		  	  	<?php foreach ($detail_transaksi as $detail) : ?>
		  	  <tr>
		  	  	  <td><?= $detail['kode_barang']; ?></td>
		  	  	  <td><?= $detail['nama']; ?></td>
		  	  	  <td><?= $detail['jumlah']; ?></td>
		  	  	  <td><?= $detail['harga']; ?></td>
		  	  	  <td>
		  	  	  	<a href="<?= base_url('pembelian/replace/') . $detail['id'] . '/' . $kode['kode_transaksi']; ?>" class="btn btn-warning">Update</a>
		  	  	  	<a href="<?= base_url('pembelian/delete/') . $detail['id'] . '/' . $kode['kode_transaksi']; ?>" class="btn btn-danger">Delete</a>
		  	  	  </td>
		  	  </tr>
		  	  	<?php endforeach; ?>
		  	</tbody>
		  </table>
	  	<a href="<?= base_url('transaksi'); ?>" class="btn btn-secondary" >Back</a>
	  	<a href="<?= base_url('pembelian/print/') . $kode['kode_transaksi']; ?>" class="btn btn-info" target="_blank">Print</a>
	  </div>
	  </div>
	</div>
</body>
</html>