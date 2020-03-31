<?php 
class barangModel extends CI_Model{
	const TABLE_NAME = 'barang';

	public function create($data){
		$this->db->insert($this::TABLE_NAME, $data);
	}

	public function getAll(){
		$query = $this->db->get($this::TABLE_NAME)->result_array(); 
		return $query;
	}

	public function delete($kode_barang)
	{
		$this->db->delete($this::TABLE_NAME, array('kode_barang' => $kode_barang));
	}

	public function findByKode($kode_barang)
	{
		$query = $this->db->select('*')
						  ->from('barang')
						  ->where('kode_barang', $kode_barang)
						  ->get()
						  ->row_array();
		return $query;
	}

	public function update($barang)
	{
		$this->db->replace($this::TABLE_NAME, $barang);
	}
}