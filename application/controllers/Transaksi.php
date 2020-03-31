<?php 
class Transaksi extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('TransaksiModel','model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in')){
			$data['transaksi'] = $this->model->getAll();
			$this->load->view('transaksis/transaksi', $data);
		}else
			redirect('user');
	}

	public function insert()
	{
		if($this->session->userdata('logged_in')){
			$this->load->view('transaksis/create');
		}else
			redirect('user');
	}

	public function create()
	{
		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$kode_transaksi = $this->input->post('kode_transaksi');
		$tanggal_transaksi = $this->input->post('tanggal_transaksi');
		$total_harga_barang = $this->input->post('total_harga_barang');
		$jasa_perbaikan = $this->input->post('jasa_perbaikan');
		$total_bayar = $this->input->post('total_bayar');

		$transaksi = array(
			'nama_pelanggan' => $nama_pelanggan,
			'kode_transaksi' => $kode_transaksi,
			'tanggal_transaksi' => $tanggal_transaksi,
			'total_harga_barang' => $total_harga_barang,
			'jasa_perbaikan' => $jasa_perbaikan,
			'total_bayar' => $total_bayar
		);

		$this->model->create($transaksi);
		redirect('transaksi');
	}

	public function replace($kode_transaksi)
	{
		if($this->session->userdata('logged_in')){
			$data['transaksi'] = $this->model->findByKodeTransaksi($kode_transaksi);
			$this->load->view('transaksis/update', $data);
		}else
			redirect('user');
	}

	public function update()
	{
		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$kode_transaksi = $this->input->post('kode_transaksi');
		$tanggal_transaksi = $this->input->post('tanggal_transaksi');
		$total_harga_barang = $this->input->post('total_harga_barang');
		$jasa_perbaikan = $this->input->post('jasa_perbaikan');
		$total_bayar = $this->input->post('total_bayar');

		$transaksi = array(
			'nama_pelanggan' => $nama_pelanggan,
			'kode_transaksi' => $kode_transaksi,
			'tanggal_transaksi' => $tanggal_transaksi,
			'total_harga_barang' => $total_harga_barang,
			'jasa_perbaikan' => $jasa_perbaikan,
			'total_bayar' => $total_bayar
		);

		$this->model->update($transaksi);
		redirect('transaksi');


	}

	public function delete($kode_transaksi)
	{
		// if($this->session->userdata(''))
			$this->model->delete($kode_transaksi);
			redirect('transaksi');
	}
}