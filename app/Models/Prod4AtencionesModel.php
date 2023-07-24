<?php

namespace App\Models;

use CodeIgniter\Model;

class Prod4AtencionesModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'prod4_process_otras_atenciones';
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

    public function _getProd4Atenciones($id) {
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
        if ($datos['motivo_inasistencia'] != 'NULL') {
            $builder->set('motivo_inasistencia', $datos['motivo_inasistencia']);
        }
        if ($datos['encuentros'] != 'NULL') {
            $builder->set('encuentros', $datos['encuentros']);
        }
        if ($datos['cuidado_infantil'] != 'NULL') {
            $builder->set('cuidado_infantil', $datos['cuidado_infantil']);
        }
        if ($datos['anticoncetivo'] != 'NULL') {
            $builder->set('anticoncetivo', $datos['anticoncetivo']);
        }
        if ($datos['control_ninio_sano'] != 'NULL') {
            $builder->set('control_ninio_sano', $datos['control_ninio_sano']);
        }
        if ($datos['atencion_medica'] != 'NULL') {
            $builder->set('atencion_medica', $datos['atencion_medica']);
        }
        if ($datos['derivaciones'] != 'NULL') {
            $builder->set('derivaciones', $datos['derivaciones']);
        }


        $builder->where('idProd4', $datos['idProd4']);
        $builder->update();
    }

    public function _save($datos) {
        
        $builder = $this->db->table($this->table);
        if ($datos['motivo_inasistencia'] != 'NULL') {
            $builder->set('motivo_inasistencia', $datos['motivo_inasistencia']);
        }
        if ($datos['encuentros'] != 'NULL') {
            $builder->set('encuentros', $datos['encuentros']);
        }
        if ($datos['cuidado_infantil'] != 'NULL') {
            $builder->set('cuidado_infantil', $datos['cuidado_infantil']);
        }
        if ($datos['anticoncetivo'] != 'NULL') {
            $builder->set('anticoncetivo', $datos['anticoncetivo']);
        }
        if ($datos['control_ninio_sano'] != 'NULL') {
            $builder->set('control_ninio_sano', $datos['control_ninio_sano']);
        }
        if ($datos['atencion_medica'] != 'NULL') {
            $builder->set('atencion_medica', $datos['atencion_medica']);
        }
        if ($datos['derivaciones'] != 'NULL') {
            $builder->set('derivaciones', $datos['derivaciones']);
        }

        
        $builder->set('idProd4', $datos['idProd4']);
        $builder->insert();
    }
}
