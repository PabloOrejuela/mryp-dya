<?php

namespace App\Models;

use CodeIgniter\Model;

class Prod4OyenteModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'prod4_oyentes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        
    ];

    // Dates
    protected $useTimestamps = true;
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

    public function _getProd4Oyente($id) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*')->where('idProd4', $id);
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
        if ($datos['cohorte_1'] != 'NULL') {
            $builder->set('cohorte_1', $datos['cohorte_1']);
        }
        if ($datos['cohorte_2'] != 'NULL') {
            $builder->set('cohorte_2', $datos['cohorte_2']);
        }
        if ($datos['cohorte_3'] != 'NULL') {
            $builder->set('cohorte_3', $datos['cohorte_3']);
        }
        if ($datos['cohorte_4'] != 'NULL') {
            $builder->set('cohorte_4', $datos['cohorte_4']);
        }
        if ($datos['cohorte_5'] != 'NULL') {
            $builder->set('cohorte_5', $datos['cohorte_5']);
        }
        if ($datos['cohorte_6'] != 'NULL') {
            $builder->set('cohorte_6', $datos['cohorte_6']);
        }


        $builder->where('idProd4', $datos['idProd4']);
        $builder->update();
    }

    public function _save($datos) {
        $builder = $this->db->table($this->table);
        if ($datos['cohorte_1'] != 'NULL') {
            $builder->set('cohorte_1', $datos['cohorte_1']);
        }
        if ($datos['cohorte_2'] != 'NULL') {
            $builder->set('cohorte_2', $datos['cohorte_2']);
        }
        if ($datos['cohorte_3'] != 'NULL') {
            $builder->set('cohorte_3', $datos['cohorte_3']);
        }
        if ($datos['cohorte_4'] != 'NULL') {
            $builder->set('cohorte_4', $datos['cohorte_4']);
        }
        if ($datos['cohorte_5'] != 'NULL') {
            $builder->set('cohorte_5', $datos['cohorte_5']);
        }
        if ($datos['cohorte_6'] != 'NULL') {
            $builder->set('cohorte_6', $datos['cohorte_6']);
        }


        $builder->set('idProd4', $datos['idProd4']);
        $builder->insert();
    }
}
