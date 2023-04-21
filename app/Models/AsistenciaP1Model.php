<?php

namespace App\Models;

use CodeIgniter\Model;

class AsistenciaP1Model extends Model {
    
    protected $DBGroup          = 'default';
    protected $table            = 'asistencia';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'dias_atencion',
        'horas_planificadas',
        'horas_efectivas',
        'horas_perdidas',
        'idtipo',
        'idprod',
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

    public function _getAsistencia($idprod) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*')->where('idprod', strtoupper($idprod));
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
        if ($datos['dias_atencion'] != '0') {
            $builder->set('dias_atencion', $datos['dias_atencion']);
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

        $builder->set('idtipo', $datos['idtipo']);
        $builder->where('idprod', $datos['idprod']);
        $builder->update();
    }

    public function _save($datos) {
        $builder = $this->db->table($this->table);
        if ($datos['dias_atencion'] != '0') {
            $builder->set('dias_atencion', $datos['dias_atencion']);
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
        $builder->set('idtipo', $datos['idtipo']);
        $builder->set('idprod', $datos['idprod']);
        $builder->insert();
    }
}
