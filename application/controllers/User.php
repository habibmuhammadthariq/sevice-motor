<?php
class User extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel', 'model');
	}

	public function index()
	{
		$this->load->view('users/login');
	}

	public function authenticate()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$valid = $this->model->authenticate($username, $password);
		$user = $this->model->findByUsername($username);

		if(!$valid){
			if(!$user){
				// echo "hallo";
				$this->session->set_flashdata('failed', '<div style="color: red">username not found ! </div>');
			}else{
				// echo "password not match !";
				$this->session->set_flashdata('failed', '<div style="color: red">password not match ! </div>');
			}
			redirect('user');
		}else{
			$data = array(
				'username' => $username,
				'nama' => $user['nama'],
				'role' => $user['role'],
				'logged_in' =>TRUE
			);
			$this->session->set_userdata($data);
			// $this->session->set_userdata($data);
			redirect('welcome');
		}
	}

	public function register()
	{
		$this->load->view('users/register');
	}

	public function create()
	{
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role = $this->input->post('role');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');

		//enkripsi	
	    $nama = $this->encryptUser($nama);
	    $password = $this->encryptUser($password);
	    $role = $this->encryptUser($role);
	    $tempat_lahir = $this->encryptUser($tempat_lahir);
	    $tanggal_lahir = $this->encryptUser($tanggal_lahir);

		$data = array(
			'nama' => $nama,
			'username' => $username,
			// 'password' => password_hash($password, PASSWORD_DEFAULT),
			'password' => $password,
			'role' => $role,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir
		);

		$this->model->create($data);
		$this->session->set_flashdata('succeeded','<div style="color: blue">Your Account has been actived, Please Login </div>');
		redirect('user');
	}

	public function replace()
	{
		$this->load->view('users/update');
	}

	public function update($id)
	{
		$id = $id;
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role = $this->input->post('role');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');

		//enkripsi	
	    $nama = $this->encryptUser($nama);
	    $password = $this->encryptUser($password);
	    $role = $this->encryptUser($role);
	    $tempat_lahir = $this->encryptUser($tempat_lahir);
	    $tanggal_lahir = $this->encryptUser($tanggal_lahir);

		$data = array(
			'id' => $id,
			'nama' => $nama,
			'username' => $username,
			// 'password' => password_hash($password, PASSWORD_DEFAULT),
			'password' => $password,
			'role' => $role,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir
		);

		$this->model->update($data);
		redirect('user/read');

	}

	public function read()
	{
		$data['user'] = $this->model->getAll();
		// die(var_dump($data));
		$this->load->view('users/read',$data);
	}

	public function encryptUser($user)  
    { 
	   	//make an encryption
	    $m = 7;  //a
	    $b = 5;
        /// Cipher Text initially empty 
        $cipher = ""; 
        for ($i = 0; $i < strlen($user); $i++) 
        { 
            /* encryption formula ( m x + b ) mod 26 
            {here x is msg[i] and m is 26} and added 'A' to  
            bring it in range of ascii alphabet[ 65-90 | A-Z ] */ 
            if ($user[$i] != ' ')  
            { 
            	$val = ord("$user[$i]");
            	// die(var_dump('a'));
            	if($val > 90)
            		$val = ((($m * ($val - 97) + $b) % 26) + 97);
            	else
            		$val = ((($m * ($val - 65) + $b) % 26) + 65);
            	$result = chr($val);
            	$cipher .= $result;
                // $cipher = $cipher . (chr((($m * (int)($msg[$i] - 'A')) + $b) % 26) + 'A'); 
            } else
            { 
            	// $result = strval(var)
                $cipher .= $user[$i]; 
            } 
        } 
            	// die(var_dump($cipher));
        return $cipher; 

    }

	public function logout()
	{
		$data = array('username','nama', 'role');
		$this->session->unset_userdata($data);
		$this->session->set_userdata('logged_in', FALSE);

		redirect('user');
	}
}