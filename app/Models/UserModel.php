<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class UserModel extends Model
{
    	protected $table = 'users';
 
        protected $primaryKey = 'id';

        protected $returnType = 'array';
        
        protected $allowedFields = ['email', 'user_name','role','password','contact_person','contact_no','user_manager','area_code'];

        protected $validationRules    = [
                'email'        => 'is_unique[users.email,id,{id}]'
        ];

        protected $validationMessages = [
                'email'        => [
                        'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
                ]
        ];

        public function __construct() {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('users');

    }

    public function login($email,$password)
	{
	        
	        return $this->asArray()
	                     ->where(['email' => $email,'password'=>md5($password)])
	                     ->first();
	}

	public function changeData($id,$data,$column ){
    	$db = \Config\Database::connect();
    	 $sql = "UPDATE users SET ".$column."=".$db->escape($data)." WHERE id=".$db->escape($id); 
		$db->query($sql);
    	return $db->affectedRows();
    }

    public function getUser($id)
	{
	        
	        return $this->asArray()
	                     ->where(['id' => $id])
	                     ->first();
	}

	
        

        
}
?>