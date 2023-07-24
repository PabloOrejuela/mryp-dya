<?php

namespace App\Models;

use CodeIgniter\Model;

class Prod4ResultadosModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'prod4_process_resultado';
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

    public function _getProd4Resultados($id) {
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
        if ($datos['reinsercion'] != 'NULL') {
            $builder->set('reinsercion', $datos['reinsercion']);
        }
        if ($datos['motivo'] != 'NULL') {
            $builder->set('motivo', $datos['motivo']);
        }
        if ($datos['observacion'] != 'NULL') {
            $builder->set('observacion', $datos['observacion']);
        }
        if ($datos['amie'] != 'NULL') {
            $builder->set('amie', $datos['amie']);
        }
        if ($datos['anio_egb'] != 'NULL') {
            $builder->set('anio_egb', $datos['anio_egb']);
        }
        if ($datos['modalidad'] != 'NULL') {
            $builder->set('modalidad', $datos['modalidad']);
        }


        $builder->where('idProd4', $datos['idProd4']);
        $builder->update();
    }

    public function _save($datos) {
        
        $builder = $this->db->table($this->table);
        if ($datos['reinsercion'] != 'NULL') {
            $builder->set('reinsercion', $datos['reinsercion']);
        }
        if ($datos['motivo'] != 'NULL') {
            $builder->set('motivo', $datos['motivo']);
        }
        if ($datos['observacion'] != 'NULL') {
            $builder->set('observacion', $datos['observacion']);
        }
        if ($datos['amie'] != 'NULL') {
            $builder->set('amie', $datos['amie']);
        }
        if ($datos['anio_egb'] != 'NULL') {
            $builder->set('anio_egb', $datos['anio_egb']);
        }
        if ($datos['modalidad'] != 'NULL') {
            $builder->set('modalidad', $datos['modalidad']);
        }

        
        $builder->set('idProd4', $datos['idProd4']);
        $builder->insert();
    }
}
