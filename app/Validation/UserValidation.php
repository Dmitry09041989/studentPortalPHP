<?php
namespace App\Validation;
use App\Models\UserModel;

class userValidation
{
    public function validate_user(string $str, string $fields, array $data) : bool
    {
        $model = new UserModel();
        $user = $model->where('student_email', $data['email'])->first();

        if(!$user)
            return false;

        return password_verify($data['password'], $user['student_password']);
    }
}