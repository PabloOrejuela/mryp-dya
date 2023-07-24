<?php

namespace App\Models;

use CodeIgniter\Model;

class Prod4OtrosModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'prod4_process_otros';
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

    public function _getProd4Otros($id) {
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
        if ($datos['kit'] != 'NULL') {
            $builder->set('kit', $datos['kit']);
        }
        if ($datos['motivo'] != 'NULL') {
            $builder->set('motivo', $datos['motivo']);
        }
        if ($datos['dias_asistencia'] != 'NULL') {
            $builder->set('dias_asistencia', $datos['dias_asistencia']);
        }
        if ($datos['porcentaje'] != 'NULL') {
            $builder->set('porcentaje', $datos['porcentaje']);
        }


        $builder->where('idProd4', $datos['idProd4']);
        $builder->update();
    }

    public function _save($datos) {
        
        $builder = $this->db->table($this->table);
        if ($datos['kit'] != 'NULL') {
            $builder->set('kit', $datos['kit']);
        }
        if ($datos['motivo'] != 'NULL') {
            $builder->set('motivo', $datos['motivo']);
        }
        if ($datos['dias_asistencia'] != 'NULL') {
            $builder->set('dias_asistencia', $datos['dias_asistencia']);
        }
        if ($datos['porcentaje'] != 'NULL') {
            $builder->set('porcentaje', $datos['porcentaje']);
        }

        
        $builder->set('idProd4', $datos['idProd4']);
        $builder->insert();
    }

}
