<!DOCTYPE html>
<html>
<head>
	<title>data barang</title>
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
	  			<!-- Body  -->
	  <div class="col-6 col-md-10">		
  	  <div class="container col-11">
		<br>
		<center><h3>Data Barang</h3></center>
		<a href="<?= base_url('barang/addItem'); ?>">
			<button class="btn btn-primary">Add Item</button>
		</a> 
		<br> <br>

		<table class="table table-stripped">
			<thead>
				<tr>
					<th>Kode Barang</th>
					<th>Nama</th>
					<th>Tipe</th>
					<th>Kategori</th>
					<th>Merk</th>
					<th>Stok</th>
					<th>Harga</th>
					<th> Action
					</th>
				</tr>
			</thead>
		<?php foreach ($barangs as $barang) : ?>
			<tbody>
				<td><?= $barang['kode_barang']; ?></td>
				<td><?= $barang['nama']; ?></td>
				<td><?= $barang['tipe']; ?></td>
				<td><?= $barang['kategori']; ?></td>
				<td><?= $barang['merk']; ?></td>
				<td><?= $barang['stok']; ?></td>
				<td><?= $barang['harga']; ?></td>
				<td>
					<a href="<?= base_url('barang/replace/') . $barang['kode_barang'];?>">
						<button type="button" class="btn btn-warning">Update</button>
					</a>
					<a href="<?= base_url('barang/delete/') . $barang['kode_barang']; ?>">
						<button type="button" class="btn btn-danger">Delete</button>
					</a>
				</td>
			</tbody>
		<?php endforeach; ?>
		</table>
	  </div>
  	  </div>
  	</div>	
</body>
</html>