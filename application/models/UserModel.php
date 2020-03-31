<?php
class UserModel extends CI_Model
{
	const TABLE_NAME = 'user';
	public function findByUsername($username)
	{
		$query = $this->db->where('username', $username)
						  ->from($this::TABLE_NAME)
						  ->get()
						  ->row_array();


		// die(var_dump($query['nama']));
		$query['nama'] = $this->decryptUser($query['nama']);
		$query['password'] =$this->decryptUser($query['password']);
		$query['role'] = $this->decryptUser($query['role']);
		$query['tempat_lahir'] =$this->decryptUser($query['tempat_lahir']);
		$query['tanggal_lahir'] = $this->decryptUser($query['tanggal_lahir']);


		return $query;
	}

	public function authenticate($username, $password)
	{
		$user = $this->findByUsername($username);
		// die (var_dump($user));
		if(!$user)
			return FALSE;
		else
		{
			if($password == $user['password'])
				return TRUE;
			else
				return FALSE;
		}
	}

	public function create($data)
	{
		$this->db->insert($this::TABLE_NAME, $data);
	}


	public function decryptUser($cipher)
	{ 
	    $m = 7;  //a
	    $b = 5;
        $user = ""; 
        $m_inv = 0; //15
        $flag = 0; 
  
        //find m_inv  
        for ($i = 0; $i < 26; $i++)  
        { 
            $flag = ($m * $i) % 26; 
  
            // if (a*i)%26 == 1,  then it is m_inv
            if ($flag == 1)  
            { 
                $m_inv = $i; 
            } 
        } 

        for ($i = 0; $i < strlen($cipher); $i++)  
        { 
            /*Applying decryption formula a^-1 ( x - b ) mod m  
            {here x is cipher[i] and m is 26} and added 'A'  
            to bring it in range of ASCII alphabet[ 65-90 | A-Z ] */ 
            if ($cipher[$i] != ' ')  
            { 
            	$val = ord("$cipher[$i]");
            	if($val > 90){
            		$val = (($m_inv * (($val - 97) - $b)) % 26);
	            	if($val < 0)
	            		$val = (26 + $val) + 97;
	            	else
	            		$val = $val + 97;
            	}
            	else{
            		$val = (($m_inv * (($val - 65) - $b)) % 26);
	            	if($val < 0)
	            		$val = (26 + $val) + 65;
	            	else
	            		$val = $val + 65;
            	}

            	$result = chr($val);
            	$user .= $result;


                // $user =(((a_inv *  
                //         ((cipher.charAt(i) + 'A' - b)) % 26)) + 'A'); 
            }  
            else //else simply append space characte 
            { 
                $user .= $cipher[$i]; 
            } 
        } 
            	// die(var_dump($user));
  
        return $user; 
    } 

    public function update($user)
    {
		$this->db->replace($this::TABLE_NAME, $user);
    }

	public function delete($id)
	{
		$this->db->delete($this::TABLE_NAME, array('id' => $id));
	}

	public function getAll()
	{
		$query = $this->db->get($this::TABLE_NAME)->result_array();

		// $i = 0;
		foreach ($query as $query) {
			$query['nama'] =$this->decryptUser($query['nama']);
			$query['password'] =$this->decryptUser($query['password']);
			$query['role'] = $this->decryptUser($query['role']);
			$query['tempat_lahir'] =$this->decryptUser($query['tempat_lahir']);
			$query['tanggal_lahir'] = $this->decryptUser($query['tanggal_lahir']);
			// $i++;
			$data['query'] = $query;
			// $data['query'] = $query['password'];
			// $data['query'] = $query['role'];
			// $data['query'] = $query['tempat_lahir'];
			// $data['query'] = $query['tanggal_lahir'];
		}
		// die(var_dump($data));
		return $query;
	}
}