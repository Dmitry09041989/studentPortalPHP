<?php namespace App\Models;

use CodeIgniter\Model;

class ITModel extends Model
{
    protected $table      = 'it_requests';
    protected $primaryKey = 'issue_id';

    protected $returnType     = 'array';
//    protected $useSoftDeletes = true;

    protected $allowedFields = ['sender_email', 'issue_type', 'issue_description'];

//    protected $useTimestamps = false;
//    protected $createdField  = 'created_at';
//    protected $updatedField  = 'updated_at';
//    protected $deletedField  = 'deleted_at';

//    protected $validationRules    = [];
//    protected $validationMessages = [];
//    protected $skipValidation     = false;
}