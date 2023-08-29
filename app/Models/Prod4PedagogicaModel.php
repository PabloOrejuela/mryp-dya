<?php

namespace App\Models;

use CodeIgniter\Model;

class Prod4PedagogicaModel extends Model { 

    protected $DBGroup          = 'default';
    protected $table            = 'prod4_process_pedagogicas';
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

    public function _getProd4Pedagogica($id) {
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
        if ($datos['leng_prescencial'] != 'NULL') {
            $builder->set('leng_prescencial', $datos['leng_prescencial']);
        }
        if ($datos['leng_prescencial_in'] != 'NULL') {
            $builder->set('leng_prescencial_in', $datos['leng_prescencial_in']);
        }
        if ($datos['leng_prescencial_in_motivo'] != 'NULL') {
            $builder->set('leng_prescencial_in_motivo', $datos['leng_prescencial_in_motivo']);
        }
        
        if ($datos['leng_distancia'] != 'NULL') {
            $builder->set('leng_distancia', $datos['leng_distancia']);
        }
        if ($datos['leng_distancia_in'] != 'NULL') {
            $builder->set('leng_distancia_in', $datos['leng_distancia_in']);
        }
        if ($datos['leng_distancia_in_motivo'] != 'NULL') {
            $builder->set('leng_distancia_in_motivo', $datos['leng_distancia_in_motivo']);
        }

        if ($datos['mate_prescencial'] != 'NULL') {
            $builder->set('mate_prescencial', $datos['mate_prescencial']);
        }
        if ($datos['mate_prescencial_in'] != 'NULL') {
            $builder->set('mate_prescencial_in', $datos['mate_prescencial_in']);
        }
        if ($datos['mate_prescencial_in_motivo'] != 'NULL') {
            $builder->set('mate_prescencial_in_motivo', $datos['mate_prescencial_in_motivo']);
        }

        if ($datos['mate_distancia'] != 'NULL') {
            $builder->set('mate_distancia', $datos['mate_distancia']);
        }
        if ($datos['mate_distancia_in'] != 'NULL') {
            $builder->set('mate_distancia_in', $datos['mate_distancia_in']);
        }
        if ($datos['mate_distancia_in_motivo'] != 'NULL') {
            $builder->set('mate_distancia_in_motivo', $datos['mate_distancia_in_motivo']);
        }

        if ($datos['psicoemocionales'] != 'NULL') {
            $builder->set('psicoemocionales', $datos['psicoemocionales']);
        }
        if ($datos['psicoemocionales_in'] != 'NULL') {
            $builder->set('psicoemocionales_in', $datos['psicoemocionales_in']);
        }
        if ($datos['psicoemocionales_in_motivo'] != 'NULL') {
            $builder->set('psicoemocionales_in_motivo', $datos['psicoemocionales_in_motivo']);
        }

        if ($datos['resultado'] != 'NULL') {
            $builder->set('resultado', $datos['resultado']);
        }


        $builder->where('idProd4', $datos['idProd4']);
        $builder->update();
    }

    public function _save($datos) {
        
        $builder = $this->db->table($this->table);
        if ($datos['leng_prescencial'] != 'NULL') {
            $builder->set('leng_prescencial', $datos['leng_prescencial']);
        }
        if ($datos['leng_prescencial_in'] != 'NULL') {
            $builder->set('leng_prescencial_in', $datos['leng_prescencial_in']);
        }
        if ($datos['leng_prescencial_in_motivo'] != 'NULL') {
            $builder->set('leng_prescencial_in_motivo', $datos['leng_prescencial_in_motivo']);
        }
        
        if ($datos['leng_distancia'] != 'NULL') {
            $builder->set('leng_distancia', $datos['leng_distancia']);
        }
        if ($datos['leng_distancia_in'] != 'NULL') {
            $builder->set('leng_distancia_in', $datos['leng_distancia_in']);
        }
        if ($datos['leng_distancia_in_motivo'] != 'NULL') {
            $builder->set('leng_distancia_in_motivo', $datos['leng_distancia_in_motivo']);
        }

        if ($datos['mate_prescencial'] != 'NULL') {
            $builder->set('mate_prescencial', $datos['mate_prescencial']);
        }
        if ($datos['mate_prescencial_in'] != 'NULL') {
            $builder->set('mate_prescencial_in', $datos['mate_prescencial_in']);
        }
        if ($datos['mate_prescencial_in_motivo'] != 'NULL') {
            $builder->set('mate_prescencial_in_motivo', $datos['mate_prescencial_in_motivo']);
        }

        if ($datos['mate_distancia'] != 'NULL') {
            $builder->set('mate_distancia', $datos['mate_distancia']);
        }
        if ($datos['mate_distancia_in'] != 'NULL') {
            $builder->set('mate_distancia_in', $datos['mate_distancia_in']);
        }
        if ($datos['mate_distancia_in_motivo'] != 'NULL') {
            $builder->set('mate_distancia_in_motivo', $datos['mate_distancia_in_motivo']);
        }

        if ($datos['psicoemocionales'] != 'NULL') {
            $builder->set('psicoemocionales', $datos['psicoemocionales']);
        }
        if ($datos['psicoemocionales_in'] != 'NULL') {
            $builder->set('psicoemocionales_in', $datos['psicoemocionales_in']);
        }
        if ($datos['psicoemocionales_in_motivo'] != 'NULL') {
            $builder->set('psicoemocionales_in_motivo', $datos['psicoemocionales_in_motivo']);
        }
        
        if ($datos['resultado'] != 'NULL') {
            $builder->set('resultado', $datos['resultado']);
        }

        
        $builder->set('idProd4', $datos['idProd4']);
        $builder->insert();
    }
}
