<?php
class TransaksiModel extends CI_Model
{
	const TABLE_NAME = 'transaksi';

	public function create($transaksi)
	{
		$this->db->insert($this::TABLE_NAME, $transaksi);
	}

	public function update($transaksi)
	{
		$this->db->replace($this::TABLE_NAME, $transaksi);
	}

	public function delete($kode_transaksi)
	{
		$this->db->delete($this::TABLE_NAME, array('kode_transaksi' => $kode_transaksi));
	}

	public function getAll()
	{
		$query = $this->db->get($this::TABLE_NAME)->result_array();
		return $query;
	}

	public function findByKodeTransaksi($kode_transaksi)
	{
		$query = $this->db->select('*')
						  ->from($this::TABLE_NAME)
						  ->where('kode_transaksi', $kode_transaksi)
						  ->get()
						  ->row_array();
		return $query;
	}
}