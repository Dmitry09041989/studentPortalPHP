<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Validation\UserValidation;


class Login extends BaseController
{
    private function setUserSession($user)
    {
        $data = [
            'student_id' => $user['student_id'],
            'student_first_name' => $user['student_first_name'],
            'student_surname' => $user['student_surname'],
            'student_email' => $user['student_email'],
            'personal_tutor_id' => $user['personal_tutor_id'],
            'student_current_level' => $user['student_current_level'],
            'student_start_level' => $user['student_start_level'],
            'student_end_level' => $user['student_end_level'],
            'isLoggedIn' => true
        ];

        session()->set($data);
        return true;
    }


    public function index()
    {
        helper(['form']);

        $data = [];

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => 'required|valid_email|min_length[6]|max_length[50]',
                'password' => 'required|min_length[8]|max_length[255]|validate_user[email,password]'
            ];

            $errors = [
                'password' =>[
                    'validate_user' => 'Email or Password is incorrect.'
                ]
            ];

            if ($this->validate($rules, $errors)) {
                //todo database insertion or login
                $model = new UserModel();
                $user = $model->where('student_email', $this->request->getPost('email'))->first();

                $this->setUserSession($user);
                return redirect()->to('/portal/modules');

            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('login_page', $data);
    }


    public function passwordReset()
    {
        helper(['form']);

        $data = [];


        if ($this->request->getMethod() == 'post') {
//            var_dump($_POST);
//            $model1 = new UserModel();
//            var_dump($model1->find($model1->where('student_email', $this->request->getPost('email'))));
//            var_dump($model1->where('student_email', 'test@dg.com')->first()['student_id']);
            $rules = [
                'email' => 'required|valid_email|min_length[6]|max_length[50]',
                'password' => 'required|validate_user[email,password]',
                'new_password' => 'required|min_length[8]|max_length[255]',
                'new_password_confirm' => 'matches[new_password]'
            ];
            $errors = [
                'password' =>[
                    'validate_user' => 'Email or Password is incorrect.'
                ],
                'new_password' => [
                    'required' => 'You must enter a new password.',
                    'min_length' => 'New password must be at least 8 characters long.'
                    ],
                'new_password_confirm' => [
                    'required' => 'You must re-enter the new password.',
                    'matches' => 'The passwords didn\'t match, please try again.'
                ]
            ];

            if ($this->validate($rules, $errors)) {
                //todo database insertion or login
                $model = new UserModel();
                $newData = [
                    'student_id' => $model->where('student_email', $this->request->getPost('email'))->first()['student_id'],
                    'student_email' => $this->request->getPost('email'),
                    'student_password' => $this->request->getPost('password'),
                    'new_password' => $this->request->getPost('new_password')
                ];
                if($this->request->getPost('new_password')!='')
                {
                    $newData['student_password'] = $this->request->getPost('new_password');
                }

//                var_dump($newData);
                $model->save($newData); //todo fix user update
                session()->setFlashdata('success', 'Password was successfully updated.');
                return redirect()->to('/login');
            } else {
                $data['validation'] = $this->validator;

            }
        }
//        123456789

        return view('reset_pw', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}