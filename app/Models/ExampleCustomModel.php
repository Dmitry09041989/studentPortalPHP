<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;


class ExampleCustomModel
{

    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }



    function allS(){

        return $this->db->table('table_name')
                        ->get()
                        ->getResult(); // return an array of all results
    }

    function wheres()
    {
        return $this->db->table('table_name')
                        ->where(['id' => 100]) // equal to specified id //
                        ->where(['id >' => 100]) // grater then
                        ->where(['id' => 50]) // there maybe multiple where statements in one query
                        ->orderBy(['grade', 'ASC']) // order by ascending
                        ->get()
                        ->getRow(); //returns one row
    }


    function joins(){

        return $builder->db->table('table_one')
            ->where('id >',  5)
            ->join('table_two', 'table_one.foreign_key = table_two.primary_key')
            ->get()
            ->getResult();
    }


    function likes(){

        return $this->db->table('table_one')
            ->like('column_name', 'searched string', 'both') // %string% - both // %string - before // string% - after //
            ->join('table_two', 'table_one.foreign_key = table_two.primary_key')
            ->get()
            ->getResult();
    }

    function grouping(){

        return $this->db->table('table_one')
            ->groupStart()
                ->where(['id' => '25', 'date <' => '1990-01-01 00:00:00'])
            ->groupEnd()
            ->orWhere('another_id', 25) // ->where statements have AND by default
            ->like('column_name', 'searched string', 'both')
            ->join('table_two', 'table_one.foreign_key = table_two.primary_key')
            ->get()
            ->getResult();
    }

    function whereIns(){

        $id = [''];

        return $this->db->table('table_one')
            ->groupStart()
            ->where(['id' => '25', 'date <' => '1990-01-01 00:00:00'])
            ->groupEnd()
            ->orWhereIn('another_id', $id) // whereIn
            ->like('column_name', 'searched string', 'both')
            ->join('table_two', 'table_one.foreign_key = table_two.primary_key')
            ->get()
            ->getResult();
    }







}