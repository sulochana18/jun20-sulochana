<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Student extends BaseController
{
    private $db;
  
    public function __construct() {
        helper('form', 'url');
        $this->db = db_connect();
    }

    public function index()
    {
        $user = new UsersModel();
        $data['users'] = $user->getStudentsList();
        return view('Student/list', $data);
    }

    
    public function create()
    {
        return view('student/create');
    }

    
    public function store()
    {
        $user = new UsersModel();
        if($this->request->getMethod() == 'post'){
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

            if(!$validation)
            {
                $data['validation'] = $this->validator;
                return view('student/create', $data);
            }
            else
            {
                $name = $this->request->getPost('name');
                $email = $this->request->getPost('email');
                $phone = $this->request->getPost('phone');
                $address = $this->request->getPost('address');
                $city = $this->request->getPost('city');
                $state = $this->request->getPost('state');
                $country = $this->request->getPost('country');

                $values = [
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'city' => $city,
                    'state' => $state,
                    'country'=>$country,
                ];
                
                $users = new UsersModel();
                $save = $users->storeUsers($values);
                if($save)
                {
                    return redirect()->to('student-list')->withInput()->with('success', 'student Added successfully');
                }
                else
                {
                    return redirect()->to('student-list')->withInput()->with('fail', 'student Added failed');
                }
            }
        }
    } 
    
    public function user_status_changed()
    {       
        $user = new UsersModel();
        $data['user'] = $user->updateuserstatus();
        echo json_encode($data);
        exit;
    }
    
    public function edit($id = 0){
        $users = new UsersModel();
        $data['user'] = $users->getStudentsList();
        $user = $users->findStudent($id);

        $data['user'] = $user;
        return view('student/edit',$data);
    }

    public function update($id = 0){
      if($this->request->getMethod() == "post")
      {       
        $users = new UsersModel();
            if($users->updateStudent($id))
            {   
                return redirect('student-list')->with('success', 'student updated successfully');
            }
            else
            {
                return redirect('student-list')->with('error', 'student updation failed');
            }
        }
    }

    public function delete($id=0){
        $users = new UsersModel();
 
       if($users->findStudent($id))
       {
         $users->delStudent($id);
         return redirect('student-list')->with('success', 'student detail deleted successfully');
         }
         else
         {
             return redirect('student-list')->with('error', 'student detail deleted failed');
         }
         return redirect()->to('/student-list');
     }
}
