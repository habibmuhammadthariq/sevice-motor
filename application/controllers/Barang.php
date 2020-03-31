<?php 
class Barang extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('BarangModel', 'model');
	}

	public function index(){
		if($this->session->userdata('logged_in')){
			$data['barangs'] = $this->model->getAll();
			$this->load->view('barangs/print_barang', $data);
		}else
			redirect('user');
	}

	public function addItem()
	{
		if($this->session->userdata('logged_in')){
			$this->load->view('barangs/tambah_barang');
		}else
			redirect('user');
	}

	public function create()
	{
		$kode_barang = $this->input->post('kode_barang');
		$nama = $this->input->post('nama');
		$tipe = $this->input->post('tipe');
		$kategori = $this->input->post('kategori');
		$merk = $this->input->post('merk');
		$stok = $this->input->post('stok');
		$harga = $this->input->post('harga');

		$data = array(
			'kode_barang' => $kode_barang,
			'nama' => $nama,
			'tipe' => $tipe,
			'kategori' => $kategori,
			'merk' => $merk,
			'stok' => $stok,
			'harga' => $harga
		);

		$this->model->create($data);
		redirect('barang');
	}

	public function replace($kode_barang)
	{
		if($this->session->userdata('logged_in')){
			$data['barang'] = $this->model->findByKode($kode_barang);
			$this->load->view('barangs/edit_barang',$data);
		}else
			redirect('user');
	}

	public function update()
	{
		$kode_barang = $this->input->post('kode_barang');
		$nama = $this->input->post('nama');
		$tipe = $this->input->post('tipe');
		$kategori = $this->input->post('kategori');
		$merk = $this->input->post('merk');
		$stok = $this->input->post('stok');
		$harga = $this->input->post('harga');

		$data = array(
			'kode_barang' => $kode_barang,
			'nama' => $nama,
			'tipe' => $tipe,
			'kategori' => $kategori,
			'merk' => $merk,
			'stok' => $stok,
			'harga' => $harga
		);

		$this->model->update($data);
		redirect('barang');
	}

	public function delete($kode_barang)
	{

		if($this->session->userdata('logged_in')){
			$this->model->delete($kode_barang);
			redirect('barang');
		}else
			redirect('user');
	}
}