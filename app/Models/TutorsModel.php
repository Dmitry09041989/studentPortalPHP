<?php namespace App\Models;

use CodeIgniter\Model;

class TutorsModel extends Model{

    protected $table = 'tutors';
    protected $primaryKey = 'tutor_id';
    protected $returnType     = 'array';

    protected $allowedFields = ['tutor_first_name', 'tutor_surname', 'tutor_email',  'tutor_about'];

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
//    'tutor_image',


}