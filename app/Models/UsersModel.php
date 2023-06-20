<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\API\ResponseTrait;

class UsersModel extends Model { 
   
   protected $DBGroup = 'default'; 
   protected $table = 'users'; 
   protected $primaryKey = 'id'; 
   protected $useAutoIncrement = true; 
   protected $insertID = 0; 
   protected $returnType = 'array'; 
   protected $useSoftDeletes = false; 
   protected $protectFields = true; 
   protected $allowedFields = ['name', 'email', 'phone', 'address', 'city', 'state', 'country', 'status']; 

   // Dates 
   protected $useTimestamps = false; 
   protected $dateFormat = 'datetime'; 
   protected $createdField = 'created_at'; 
   protected $updatedField = 'updated_at'; 
   protected $deletedField = 'deleted_at'; 

   // Validation 
   protected $validationRules = []; 
   protected $validationMessages = []; 
   protected $skipValidation = false; 
   protected $cleanValidationRules = true; 

   // Callbacks 
   protected $allowCallbacks = true; 
   protected $beforeInsert = []; 
   protected $afterInsert = [];  
   protected $beforeUpdate = []; 
   protected $afterUpdate = []; 
   protected $beforeFind = []; 
   protected $afterFind = []; 
   protected $beforeDelete = []; 
   protected $afterDelete = []; 

    public function getStudentsList()
    {
                $builder = $this->db->table("users")
                 ->select('*');
        $users = $builder->get()->getResult();
        return $users;
    }

    public function findStudent($id = 0)
    {  
        $user = $this->find($id);
        return $user;
    }

    public function storeUsers($values)
    {
        $users = $this->db->table('users')->insert($values);
        return $users;
    }

    public function user_status()
    {  
        $stat = $this->db->table("users")
            ->select('*');
        $query = $stat->get();
        $status=$query->getResult();
        return $status;               
    }

    public function updateuserstatus()
    {
        $request = \Config\Services::request();        
        $user = new UsersModel();
        $data['user'] = $user->user_status();
        $id = $request->getPost('id');
        $status = $request->getPost('status');
        if($status == 'active')
        {
            $user_status = 'inactive';
        }
        else
        {
            $user_status = 'active';
        }

        $data = array('status' => $user_status );
        $this->db->query("update users SET status='$user_status' where id='$id'");     
    }

    public function updateStudent($id = 0)
    {
        
            $validation = $this->validate([
                'name' => [
                    'rules'=>'required|min_length[3]',
                    'errors'=>[
                        'required'=>'name cannot be blank',
                        'min_length'=>'name minimum 3 characters',
                    ],
                ],
                'email' => [
                    'rules'  => 'required|valid_email|is_unique[users.email]',
                    'errors' => [
                        'required' => 'Please enter email',
                        'valid_email'=>'enter valid email id',
                        'is_unique'=> 'email already exists',
                    ],
                ],
                'phone' => [
                    'rules' => 'required|exact_length[10]|numeric',
                    'errors' => [
                        'required'=> 'Please enter phone no',
                        'numeric' => 'only numbers allowed',
                        'exact_length' => 'exactly 10 digits required'
                    ],
                ],
                'address' => [
                    'rules'  => 'required|alpha_space|min_length[3]|max_length[150]',
                    'errors' => [
                        'required' => 'Please enter address',
                        'min_length'=> 'Min Length should be 3chars',
                        'max_length'=> 'Should not exceed 150 chars ',
                    ],
                ],
                'city' => [
                    'rules'=>'required|min_length[3]',
                    'errors'=>[
                        'required'=>'city cannot be blank',
                        'min_length'=>'city minimum 3 characters',
                    ],
                ],
                'state' => [
                    'rules'=>'required|min_length[3]',
                    'errors'=>[
                        'required'=>'state cannot be blank',
                        'min_length'=>'state minimum 3 characters',
                    ],
                ],
                'country' => [
                    'rules'=>'required|min_length[3]',
                    'errors'=>[
                        'required'=>'country cannot be blank',
                        'min_length'=>'country minimum 3 characters',
                    ],
                ],
            ]);

            if (!$validation) 
            {   
               return redirect()->to('student/edit/'.$id)->withInput()->with('validation',$this->validator); 
            } 
            else 
            {
                $request = \Config\Services::request();
                    $data = [
                        "name" => $request->getPost("name"),
                        "email" => $request->getPost("email"),
                        "phone" => $request->getPost("phone"),
                        "address" => $request->getPost("address"),
                        "city" => $request->getPost("city"),
                        'state' => $request->getPost("state"),
                        'country' => $request->getPost("country"),
                    ];
                return $this->update($id, $data);
            }
        }
    

    public function delStudent($id=0)
    {    
        $request = \Config\Services::request();
        $users = new UsersModel();
        $user = $users->findStudent($id);
        return $this->delete($id);
    }
}