<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;


class GradesModel
{

    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }


    function studentTermGrades($student_id, $level)
    {
//        $db  = \Config\Database::connect();
        $builder = $this->db->table('grades');

        return $builder
                        ->join('modules', 'grades.g_module_id = modules.module_id')
                        ->where('grades.g_student_id', $student_id)
                        ->where('modules.module_level', $level)
                        ->get()
                        ->getResultArray();
    }

    function getModuleYear($level)
    {
        $builder = $this->db->table('grades');

        return $builder
            ->join('modules', 'grades.g_module_id = modules.module_id')
            ->where('modules.module_level', $level)
            ->get()
            ->getRowArray();
    }




}
