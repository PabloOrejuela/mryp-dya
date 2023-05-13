<?php

namespace App\Models;

use CodeIgniter\Model;

class AsistenciaP1Model extends Model {
    
    protected $DBGroup          = 'default';
    protected $table            = 'asistencia_prod_1';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'horas_atencion_total',
        'horas_planificadas',
        'horas_efectivas',
        'horas_perdidas',
        'cohorte',
        'idtipo',
        'idprod',
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

    public function _getAsistencia($amie) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*')->where('amie', $amie);
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
        if ($datos['horas_atencion_total'] != '0') {
            $builder->set('horas_atencion_total', $datos['horas_atencion_total']);
        }

        if ($datos['horas_planificadas'] != '0') {
            $builder->set('horas_planificadas', $datos['horas_planificadas']);
        }
        
        if ($datos['horas_efectivas'] != '0') {
            $builder->set('horas_efectivas', $datos['horas_efectivas']);
        }

        if ($datos['horas_perdidas'] != '0') {
            $builder->set('horas_perdidas', $datos['horas_perdidas']);
        }

        $builder->where('amie', $datos['amie']);
        $builder->update();
    }

    public function _save($datos) {
        $builder = $this->db->table($this->table);
        if ($datos['horas_atencion_total'] != '0') {
            $builder->set('horas_atencion_total', $datos['horas_atencion_total']);
        }

        if ($datos['horas_planificadas'] != '0') {
            $builder->set('horas_planificadas', $datos['horas_planificadas']);
        }
        
        if ($datos['horas_efectivas'] != '0') {
            $builder->set('horas_efectivas', $datos['horas_efectivas']);
        }

        if ($datos['horas_perdidas'] != '0') {
            $builder->set('horas_perdidas', $datos['horas_perdidas']);
        }

        $builder->set('amie', $datos['amie']);
        $builder->insert();
    }

    public function _getDiasatencionReporte($obj) {
        $result = 0;
        $builder = $this->db->table($this->table);
        $builder->selectAvg('horas_atencion_total');
        $builder->where('amie', $obj['amie']);
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                if ($row->dias_atencion != NULL) {
                    $result = $row->horas_atencion_total;
                }
            }
        }
        //echo $this->db->getLastQuery();exit;
        return $result;
    }

    public function _getHorasPlanificadasReporte($obj) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->selectAvg('horas_planificadas');
        $builder->where('amie', $obj['amie']);
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result = $row->horas_planificadas;
            }
        }
        //echo $this->db->getLastQuery();exit;
        return $result;
    }

    public function _getHorasEfectivasReporte($obj) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->selectAvg('horas_efectivas');
        $builder->where('amie', $obj['amie']);
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result = $row->horas_efectivas;
            }
        }
        //echo $this->db->getLastQuery();exit;
        return $result;
    }

    public function _getHorasPerdidasReporte($obj) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->selectAvg('horas_perdidas');
        $builder->where('amie', $obj['amie']);
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result = $row->horas_perdidas;
            }
        }
        //echo $this->db->getLastQuery();exit;
        return $result;
    }
}
