<?php namespace App\Models;

use CodeIgniter\Model;

class MessagesModel extends Model
{
    protected $table      = 'messages';
    protected $primaryKey = 'message_id';

    protected $returnType     = 'array';
//    protected $useSoftDeletes = true;

    protected $allowedFields = ['message_type', 'message_title', 'message_description', 'message_content'];

//    protected $useTimestamps = false;
//    protected $createdField  = 'created_at';
//    protected $updatedField  = 'updated_at';
//    protected $deletedField  = 'deleted_at';

//    protected $validationRules    = [];
//    protected $validationMessages = [];
//    protected $skipValidation     = false;
}