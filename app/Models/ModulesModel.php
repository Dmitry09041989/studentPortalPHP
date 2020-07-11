<?php namespace App\Models;

use CodeIgniter\Model;

class ModulesModel extends Model
{
    protected $table = 'modules';
    protected $primaryKey = 'module_id';

//    protected $returnType = 'array';
//    protected $useSoftDeletes = true;

    protected $allowedFields = ['module_name', 'module_description', 'module_content'];

    protected $useTimestamps = true;
    protected $createdField  = 'module_created_at';
    protected $updatedField  = 'module_updated_at';
    protected $deletedField  = 'module_deleted_at';

//    protected $validationRules    = [];
//    protected $validationMessages = [];
//    protected $skipValidation     = false;

//    protected  $beforeInsert = ['check'];

//    public function checkInsert(array $data)
//    {
//        $newVar = $data['data']['post_var'].'testing extra features';
//        $data['data']['post_var'] = $newVar;
//
//        return $data;
//    }


}