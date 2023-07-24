<?php

namespace App\Models;

use CodeIgniter\Model;

class Prod4MateModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'prod4_process_matematica';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

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

    public function _getProd4Mate($id) {
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
        if ($datos['reconoce_numeros'] != 'NULL') {
            $builder->set('reconoce_numeros', $datos['reconoce_numeros']);
        }
        if ($datos['identifica_operaciones'] != 'NULL') {
            $builder->set('identifica_operaciones', $datos['identifica_operaciones']);
        }
        if ($datos['resuelve_operaciones'] != 'NULL') {
            $builder->set('resuelve_operaciones', $datos['resuelve_operaciones']);
        }
        if ($datos['reconoce_problermas'] != 'NULL') {
            $builder->set('reconoce_problermas', $datos['reconoce_problermas']);
        }
        if ($datos['resuelve_problemas'] != 'NULL') {
            $builder->set('resuelve_problemas', $datos['resuelve_problemas']);
        }
        if ($datos['resuelve_operaciones_decimales'] != 'NULL') {
            $builder->set('resuelve_operaciones_decimales', $datos['resuelve_operaciones_decimales']);
        }


        $builder->where('idProd4', $datos['idProd4']);
        $builder->update();
    }

    public function _save($datos) {
        
        $builder = $this->db->table($this->table);
        if ($datos['reconoce_numeros'] != 'NULL') {
            $builder->set('reconoce_numeros', $datos['reconoce_numeros']);
        }
        if ($datos['identifica_operaciones'] != 'NULL') {
            $builder->set('identifica_operaciones', $datos['identifica_operaciones']);
        }
        if ($datos['resuelve_operaciones'] != 'NULL') {
            $builder->set('resuelve_operaciones', $datos['resuelve_operaciones']);
        }
        if ($datos['reconoce_problermas'] != 'NULL') {
            $builder->set('reconoce_problermas', $datos['reconoce_problermas']);
        }
        if ($datos['resuelve_problemas'] != 'NULL') {
            $builder->set('resuelve_problemas', $datos['resuelve_problemas']);
        }
        if ($datos['resuelve_operaciones_decimales'] != 'NULL') {
            $builder->set('resuelve_operaciones_decimales', $datos['resuelve_operaciones_decimales']);
        }
        

        $builder->set('idProd4', $datos['idProd4']);
        $builder->insert();
    }
}
