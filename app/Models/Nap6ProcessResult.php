<?php

namespace App\Models;

use CodeIgniter\Model;

class Nap6ProcessResult extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'nap6_process_result';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'edu_regular', 'nivel', 'institucion', 'idnap6'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function _getNap6Process($id) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*')->where('idnap6', $id);
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result = $row;
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _update($datos) {
        $builder = $this->db->table($this->table);
        if ($datos['edu_regular'] != 'NULL') {
            $builder->set('edu_regular', $datos['edu_regular']);
        }

        if ($datos['nivel'] != 'NULL') {
            $builder->set('nivel', $datos['nivel']);
        }

        if ($datos['institucion'] != 'NULL') {
            $builder->set('institucion', $datos['institucion']);
        }

        $builder->where('idnap6', $datos['idnap6']);
        $builder->update();
    }

    public function _save($datos) {
        $builder = $this->db->table($this->table);
        if ($datos['edu_regular'] != 'NULL') {
            $builder->set('edu_regular', $datos['edu_regular']);
        }

        if ($datos['nivel'] != 'NULL') {
            $builder->set('nivel', $datos['nivel']);
        }

        if ($datos['institucion'] != 'NULL') {
            $builder->set('institucion', $datos['institucion']);
        }
        
        $builder->set('idnap6', $datos['idnap6']);
        $builder->insert();
    }
}
