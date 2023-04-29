<?php

namespace App\Models;

use CodeIgniter\Model;

class EvalMateFinalElementalP1Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'prod1_eval_mate_elemental_final';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'relacion_figuras_geo_1',
        'relacion_figuras_geo_1_1',
        'seriacion_2',
        'conjuntos_2_1',
        'seriacion_2_2',
        'orientacion_3',
        'orientacion_3_1',
        'orientacion_3_2',
        'esquema_corporal_3_3',
        'esquema_corporal_4',
        'esquema_corporal_4_1',
        'seriacion_5',
        'suma_6',
        'suma_7',
        'resta_8',
        'resta_9',
        'multiplica_10',
        'multiplica_11',
        'divide_12',
        'divide_13',
        'created_at',
        'updated_at',
        'idprod',
        'idtipo'
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

    public function _getEvalMateFinalElem($idprod) {
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
        if ($datos['relacion_figuras_geo_1'] != 'NULL') {
            $builder->set('relacion_figuras_geo_1', $datos['relacion_figuras_geo_1']);
        }
        if ($datos['relacion_figuras_geo_1_1'] != 'NULL') {
            $builder->set('relacion_figuras_geo_1_1', $datos['relacion_figuras_geo_1_1']);
        }
        if ($datos['seriacion_2'] != 'NULL') {
            $builder->set('seriacion_2', $datos['seriacion_2']);
        }
        if ($datos['conjuntos_2_1'] != 'NULL') {
            $builder->set('conjuntos_2_1', $datos['conjuntos_2_1']);
        }
        if ($datos['seriacion_2_2'] != 'NULL') {
            $builder->set('seriacion_2_2', $datos['seriacion_2_2']);
        }
        if ($datos['orientacion_3'] != 'NULL') {
            $builder->set('orientacion_3', $datos['orientacion_3']);
        }
        if ($datos['orientacion_3_1'] != 'NULL') {
            $builder->set('orientacion_3_1', $datos['orientacion_3_1']);
        }
        if ($datos['orientacion_3_2'] != 'NULL') {
            $builder->set('orientacion_3_2', $datos['orientacion_3_2']);
        }
        if ($datos['esquema_corporal_3_3'] != 'NULL') {
            $builder->set('esquema_corporal_3_3', $datos['esquema_corporal_3_3']);
        }
        if ($datos['esquema_corporal_4'] != 'NULL') {
            $builder->set('esquema_corporal_4', $datos['esquema_corporal_4']);
        }
        if ($datos['esquema_corporal_4_1'] != 'NULL') {
            $builder->set('esquema_corporal_4_1', $datos['esquema_corporal_4_1']);
        }
        if ($datos['seriacion_5'] != 'NULL') {
            $builder->set('seriacion_5', $datos['seriacion_5']);
        }
        if ($datos['suma_6'] != 'NULL') {
            $builder->set('suma_6', $datos['suma_6']);
        }
        if ($datos['suma_7'] != 'NULL') {
            $builder->set('suma_7', $datos['suma_7']);
        }
        if ($datos['resta_8'] != 'NULL') {
            $builder->set('resta_8', $datos['resta_8']);
        }
        if ($datos['resta_9'] != 'NULL') {
            $builder->set('resta_9', $datos['resta_9']);
        }
        if ($datos['multiplica_10'] != 'NULL') {
            $builder->set('multiplica_10', $datos['multiplica_10']);
        }
        if ($datos['multiplica_11'] != 'NULL') {
            $builder->set('multiplica_11', $datos['multiplica_11']);
        }
        if ($datos['divide_12'] != 'NULL') {
            $builder->set('divide_12', $datos['divide_12']);
        }
        if ($datos['divide_13'] != 'NULL') {
            $builder->set('divide_13', $datos['divide_13']);
        }
        $builder->set('idtipo', $datos['idtipo']);
        $builder->where('idprod', $datos['idprod']);
        $builder->update();
    }

    public function _save($datos) {
        
        $builder = $this->db->table($this->table);
        if ($datos['relacion_figuras_geo_1'] != 'NULL') {
            $builder->set('relacion_figuras_geo_1', $datos['relacion_figuras_geo_1']);
        }
        if ($datos['relacion_figuras_geo_1_1'] != 'NULL') {
            $builder->set('relacion_figuras_geo_1_1', $datos['relacion_figuras_geo_1_1']);
        }
        if ($datos['seriacion_2'] != 'NULL') {
            $builder->set('seriacion_2', $datos['seriacion_2']);
        }
        if ($datos['conjuntos_2_1'] != 'NULL') {
            $builder->set('conjuntos_2_1', $datos['conjuntos_2_1']);
        }
        if ($datos['seriacion_2_2'] != 'NULL') {
            $builder->set('seriacion_2_2', $datos['seriacion_2_2']);
        }
        if ($datos['orientacion_3'] != 'NULL') {
            $builder->set('orientacion_3', $datos['orientacion_3']);
        }
        if ($datos['orientacion_3_1'] != 'NULL') {
            $builder->set('orientacion_3_1', $datos['orientacion_3_1']);
        }
        if ($datos['orientacion_3_2'] != 'NULL') {
            $builder->set('orientacion_3_2', $datos['orientacion_3_2']);
        }
        if ($datos['esquema_corporal_3_3'] != 'NULL') {
            $builder->set('esquema_corporal_3_3', $datos['esquema_corporal_3_3']);
        }
        if ($datos['esquema_corporal_4'] != 'NULL') {
            $builder->set('esquema_corporal_4', $datos['esquema_corporal_4']);
        }
        if ($datos['esquema_corporal_4_1'] != 'NULL') {
            $builder->set('esquema_corporal_4_1', $datos['esquema_corporal_4_1']);
        }
        if ($datos['seriacion_5'] != 'NULL') {
            $builder->set('seriacion_5', $datos['seriacion_5']);
        }
        if ($datos['suma_6'] != 'NULL') {
            $builder->set('suma_6', $datos['suma_6']);
        }
        if ($datos['suma_7'] != 'NULL') {
            $builder->set('suma_7', $datos['suma_7']);
        }
        if ($datos['resta_8'] != 'NULL') {
            $builder->set('resta_8', $datos['resta_8']);
        }
        if ($datos['resta_9'] != 'NULL') {
            $builder->set('resta_9', $datos['resta_9']);
        }
        if ($datos['multiplica_10'] != 'NULL') {
            $builder->set('multiplica_10', $datos['multiplica_10']);
        }
        if ($datos['multiplica_11'] != 'NULL') {
            $builder->set('multiplica_11', $datos['multiplica_11']);
        }
        if ($datos['divide_12'] != 'NULL') {
            $builder->set('divide_12', $datos['divide_12']);
        }
        if ($datos['divide_13'] != 'NULL') {
            $builder->set('divide_13', $datos['divide_13']);
        }
        $builder->set('idtipo', $datos['idtipo']);
        $builder->set('idprod', $datos['idprod']);
        
        $builder->insert();
    }
}