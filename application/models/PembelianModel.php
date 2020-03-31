<?php 
class PembelianModel extends CI_Model
{
	const TABLE_NAME = "detail";
	function __construct()
	{
		parent::__construct();
		$this->load->model('BarangModel');
		$this->load->model('TransaksiModel');
	}
	
	public function create($detail_transaksi)
	{
		$this->db->insert($this::TABLE_NAME,$detail_transaksi);
	}

	public function delete($id)
	{
		$this->db->delete($this::TABLE_NAME,array('id' => $id));
	}

	public function getAll($kode_transaksi)
	{
		$query = $this->db->select('id, kode_transaksi, detail.kode_barang,detail.harga, jumlah, nama')
						  ->from('detail')
						  ->join('barang', 'detail.kode_barang = barang.kode_barang')
						  ->where('kode_transaksi',$kode_transaksi)
						  ->get()
						  ->result_array();
		// die(var_dump($kode_transaksi));
		return $query;
	}

	public function update($detail_transaksi)
	{
		$this->db->replace($this::TABLE_NAME,$detail_transaksi);
	}

	public function getDataBarang()
	{
		$query = $this->db->select('*')
						  ->from(BarangModel::TABLE_NAME)
						  ->get()
						  ->result_array();
		return $query;
	}

	public function findHarga($kode_barang)
	{
		$query = $this->db->select('*')
						  ->from(BarangModel::TABLE_NAME)
						  ->where('kode_barang',$kode_barang)
						  ->get()
						  ->row_array();
		return $query;
	}

	public function updateStokBarang($stok,$kode_barang)
	{
		$this->db->set('stok',$stok)
				 ->where('kode_barang',$kode_barang)
				 ->update(BarangModel::TABLE_NAME);
	}	

	public function findById($id_detail)
	{
		$query = $this->db->select('*')
						  ->from($this::TABLE_NAME)
						  ->where('id', $id_detail)
						  ->get()
						  ->row_array();
		return $query;
	}

	public function sumOfPembelianBarang($kode_transaksi)
	{
		$query = $this->db->select('sum(harga) as harga')
						  ->from($this::TABLE_NAME)
						  ->where('kode_transaksi',$kode_transaksi)
						  ->get()
						  ->row_array();
		return $query;
	}

	public function getTransaksi($kode_transaksi)
	{
		$query = $this->db->select('*')
						  ->from(TransaksiModel::TABLE_NAME)
						  ->where('kode_transaksi',$kode_transaksi)
						  ->get()
						  ->row_array();
		return $query;
	}

	public function updateTransaksi($transaksi)
	{
		$this->db->where('kode_transaksi',$transaksi['kode_transaksi'])
				 ->update(TransaksiModel::TABLE_NAME, $transaksi);
	}
}