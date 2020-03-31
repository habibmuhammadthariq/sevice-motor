<?php 
class Pembelian extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('PembelianModel', 'model');
		$this->load->model('BarangModel');
	}

	public function index()
	{
	}

	public function read($kode_transaksi)
	{
		$data['kode'] = array('kode_transaksi' => $kode_transaksi);
		$data['detail_transaksi'] = $this->model->getAll($kode_transaksi);
		// die(var_dump($data['detail_transaksi']));
		$this->load->view('pembelian_barang/read',$data);
	}

	public function print($kode_transaksi)
	{
		$data['kode'] = array('kode_transaksi' => $kode_transaksi);
		$data['detail_transaksi'] = $this->model->getAll($kode_transaksi);
		$data['transaksi'] = $this->model->getTransaksi($kode_transaksi);
		$this->load->view('pembelian_barang/print',$data);	
	}

	public function insert($kode_transaksi)
	{
		$data['transaksi'] = array('kode_transaksi' => $kode_transaksi);
		$data['barang'] = $this->model->getDataBarang();
		$this->load->view('pembelian_barang/create', $data);
	}

	public function create($kode_transaksi)
	{
		$kode_transaksi = $kode_transaksi;
		$kode_barang = $this->input->post('kode_barang');
		$jumlah = $this->input->post('jumlah');
		//get harga barang
		$found = $this->model->findHarga($kode_barang);
		$harga =(int) $found['harga'];
		$harga *= $jumlah;

		//bikin array asosiatif untuk menyimpan seluruh data yang telah di olah di atas
		$detail_transaksi = array(
			'kode_transaksi' => $kode_transaksi,
			'kode_barang' => $kode_barang,
			'jumlah' => $jumlah,
			'harga' => $harga
		);

		//update data stok barang
		$stokLama = (int) $found['stok'];
		$stok = $stokLama - $jumlah;
		$found['stok'] = (string) $stok; 

		$this->model->create($detail_transaksi);
		// $this->BarangModel->updateStokBarang($found);
		// base_url('barang/updateStokBarang/') . $found['kode_barang'] . '/' . $found['stok'];

		$this->model->updateStokBarang($found['stok'],$found['kode_barang']);

		//ambil jumlah pembayaran
		$totalHarga = $this->model->sumOfPembelianBarang($kode_transaksi);
		//ambil data transaksi
		$transaksi = $this->model->getTransaksi($kode_transaksi);
		//set total harga barang
		$transaksi['total_harga_barang'] = $totalHarga['harga'];
		//convert jasa_perbaikan dan totalHarga ke integer
		$jasa_perbaikan = (int) $transaksi['jasa_perbaikan'];
		$totalHarga = (int) $transaksi['total_harga_barang'];
		$totalHarga += $jasa_perbaikan;
		//set total bayar
		$transaksi['total_bayar'] = (string) $totalHarga;
		//update data transaksi
		$this->model->updateTransaksi($transaksi);


		redirect('pembelian/read/' . $kode_transaksi);
	}

	public function delete($id, $kode_transaksi)
	{
		$detail = $this->model->findById($id);
		$barang = $this->model->findHarga($detail['kode_barang']);
// die(var_dump($barang));
		//update jumlah stok barang karena tidak jadi di beli
		$stokLama = (int) $barang['stok'];
		$batalBeli = (int) $detail['jumlah'];
		$updateStok = $stokLama + $batalBeli;
		$barang['stok'] = (string) $updateStok;
		$this->model->updateStokBarang($barang['stok'],$barang['kode_barang']);

		//delete row that you want
		$this->model->delete($id);

		//update total_harga_barang dan total_bayar pada table transaksi
		$totalHarga = $this->model->sumOfPembelianBarang($kode_transaksi); //the result is array. so if we want to using it, you can type $totalHarga['harga'];
		$transaksi = $this->model->getTransaksi($kode_transaksi);
		$transaksi['total_harga_barang'] =  $totalHarga['harga'];
		$total_harga_barang = (int) $transaksi['total_harga_barang']; //convert to integer
		$jasa_perbaikan = (int) $transaksi['jasa_perbaikan']; 
		$total_bayar = $total_harga_barang + $jasa_perbaikan;
		$total_bayar = (string) $total_bayar;
		$transaksi['total_bayar'] = $total_bayar;
		$this->model->updateTransaksi($transaksi);

		//menuju ke method read data yang akan membawa ke home dari data barang
		$this->read($kode_transaksi);
	}

	public function replace($id_detail,$kode_transaksi)
	{
		$data['detail_transaksi'] = $this->model->findById($id_detail);
		$data['barang'] = $this->model->getDataBarang();
		$this->load->view('pembelian_barang/update',$data);
 	}

 	public function update($kode_transaksi, $jumlahLama, $id)
 	{
 		$id = $id;
 		$kode_transaksi = $kode_transaksi;
		$kode_barang = $this->input->post('kode_barang');
		$jumlah = $this->input->post('jumlah');
		//get harga barang
		$found = $this->model->findHarga($kode_barang);
		$harga =(int) $found['harga'];
		$harga *= $jumlah;

		//bikin array asosiatif untuk menyimpan seluruh data yang telah di olah di atas
		$detail_transaksi = array(
			'id' => $id,
			'kode_transaksi' => $kode_transaksi,
			'kode_barang' => $kode_barang,
			'jumlah' => $jumlah,
			'harga' => $harga
		);

		//setting tambahan jumlah barang yang dibeli
		$jumlahLama = (int) $jumlahLama; 
		$tambahan = $jumlah - $jumlahLama;
		//update data stok barang
 		$stokLama = (int) $found['stok'];
		$stok = $stokLama - $tambahan;
		$found['stok'] = (string) $stok; 

		$this->model->update($detail_transaksi);
		// $this->BarangModel->updateStokBarang($found);
		// base_url('barang/updateStokBarang/') . $found['kode_barang'] . '/' . $found['stok'];

		$this->model->updateStokBarang($found['stok'],$found['kode_barang']);

		//ambil jumlah pembayaran
		$totalHarga = $this->model->sumOfPembelianBarang($kode_transaksi);
		//ambil data transaksi
		$transaksi = $this->model->getTransaksi($kode_transaksi);
		//set total harga barang
		$transaksi['total_harga_barang'] = $totalHarga['harga'];
		//convert jasa_perbaikan dan totalHarga ke integer
		$jasa_perbaikan = (int) $transaksi['jasa_perbaikan'];
		$totalHarga = (int) $transaksi['total_harga_barang'];
		$totalHarga += $jasa_perbaikan;
		//set total bayar
		$transaksi['total_bayar'] = (string) $totalHarga;
		//update data transaksi
		$this->model->updateTransaksi($transaksi);
		
		redirect('pembelian/read/' . $kode_transaksi);

 	}
}