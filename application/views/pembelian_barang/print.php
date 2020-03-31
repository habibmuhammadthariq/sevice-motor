<!DOCTYPE html>
<html>
<head>
	<title>Print</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<center><h2>Bengkel Motor</h2></center>
		<center><font size="3">Jl Perumnas No 30A</font></center>
		<center><font size="3">Telp. 082385956441</font></center>

						<!-- Detail of customer -->
	  <div class="row"  align="center" >
	    <div class="col col-7">
	      <table style="width: 65%" align="center">
	      	<tr>
	      	  <td>Kode Transaksi</td>
	      	  <td>:</td>
	      	  <td><?= $transaksi['kode_transaksi']; ?></td>
	      	</tr>
	      	<tr>
	      	  <td>Nama Pelanggan</td>
	      	  <td>:</td>
	      	  <td><?= $transaksi['nama_pelanggan']; ?></td>
	      	</tr>
	      </table>
	    </div>
	    <div class="col col-4">
	    	<label>Tanggal Transaksi</label>
	    	<label>:</label>
	    	<label><?= $transaksi['tanggal_transaksi']; ?></label>
	    </div>
	  </div>

	  				<!-- detail transaksi -->
	  <table border="1" style="width: 80%" align="center"> <!-- class="table table-stripped"> -->
	  	<thead>
	  	  <tr>
	  	 	<th>Kode Barang</th>
	  	 	<th>Nama Barang</th>
	  	 	<th>Jumlah</th>
	  	 	<th>Total Harga</th>
	  	  </tr>
	  	</thead>
	  	<tbody>
	  	  	<?php foreach ($detail_transaksi as $detail) : ?>
	  	  <tr>
	  	  	  <td><?= $detail['kode_barang']; ?></td>
	  	  	  <td><?= $detail['nama']; ?></td>
	  	  	  <td><?= $detail['jumlah']; ?></td>
	  	  	  <td>Rp <?= $detail['harga']; ?></td>
	  	  </tr>
	  	  	<?php endforeach; ?>
	  	  	<tr>
	  	  	  <td colspan="3">Total</td>
	  	  	  <td>Rp <?= $transaksi['total_harga_barang']; ?></td>
	  	  	</tr>
	  	</tbody>
	  </table>
	  <br>
	  					<!-- jumlah bayar	 -->
	<div class="row"  >
	  <div class="col">
	  	<table  style="width: 70%" align="right">
		<tbody>	  		
	  	  <tr>
	  	  	<td align="right">Jasa Perbaikan</td>
	  	  	<td align="center">:</td>
	  	  	<td>Rp <?= $transaksi['jasa_perbaikan']; ?></td>
	  	  </tr> 		
	  	  <tr>
	  	  	<td align="right">Total Bayar</td>
	  	  	<td align="center">:</td>
	  	  	<td>Rp <?= $transaksi['total_bayar']; ?></td>
	  	  </tr>
	  	</tbody>
	  	</table>
	  </div>
	</div>
	  	<script>
			window.print();
		</script>
	</div>
</body>
</html>