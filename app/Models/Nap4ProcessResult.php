<?php

namespace App\Models;

use CodeIgniter\Model;

class Nap4ProcessResult extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'nap4_process_result';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'kit',
        'reporte_caso',
        'tipo_caso',
        'seguimiento_caso',
        'edu_regular',
        'nivel',
        'institucion',
        'idnap4',
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

    public function _getNap4Process($id) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*')->where('idnap4', $id);
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

        if ($datos['reporte_caso'] != 'NULL') {
            $builder->set('reporte_caso', $datos['reporte_caso']);
        }

        if ($datos['tipo_caso'] != 'NULL') {
            $builder->set('tipo_caso', $datos['tipo_caso']);
        }

        if ($datos['seguimiento_caso'] != 'NULL') {
            $builder->set('seguimiento_caso', $datos['seguimiento_caso']);
        }

        if ($datos['edu_regular'] != 'NULL') {
            $builder->set('edu_regular', $datos['edu_regular']);
        }

        if ($datos['nivel'] != 'NULL') {
            $builder->set('nivel', $datos['nivel']);
        }
        
        if ($datos['institucion'] != 'NULL') {
            $builder->set('institucion', $datos['institucion']);
        }

        $builder->where('idnap4', $datos['idnap4']);
        $builder->update();
    }

    public function _save($datos) {
        $builder = $this->db->table($this->table);
        if ($datos['kit'] != 'NULL') {
            $builder->set('kit', $datos['kit']);
        }

        if ($datos['reporte_caso'] != 'NULL') {
            $builder->set('reporte_caso', $datos['reporte_caso']);
        }

        if ($datos['tipo_caso'] != 'NULL') {
            $builder->set('tipo_caso', $datos['tipo_caso']);
        }

        if ($datos['seguimiento_caso'] != 'NULL') {
            $builder->set('seguimiento_caso', $datos['seguimiento_caso']);
        }

        if ($datos['edu_regular'] != 'NULL') {
            $builder->set('edu_regular', $datos['edu_regular']);
        }

        if ($datos['nivel'] != 'NULL') {
            $builder->set('nivel', $datos['nivel']);
        }
        
        if ($datos['institucion'] != 'NULL') {
            $builder->set('institucion', $datos['institucion']);
        }
        
        $builder->set('idnap4', $datos['idnap4']);
        $builder->insert();
    }
}
