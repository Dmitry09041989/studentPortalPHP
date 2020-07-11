<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{

    protected $table = 'students';
    protected $primaryKey = 'student_id';
    protected $allowedFields = ['student_first_name', 'student_surname', 'student_email', 'student_password', 'personal_tutor_id'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);

        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);

        return $data;
    }

    protected function passwordHash(array $data)
    {
        if(isset($data['data']['student_password']))
            $data['data']['student_password'] = password_hash($data['data']['student_password'], PASSWORD_DEFAULT);

        return $data;
    }
}