<?php

namespace App\Models;

use CodeIgniter\Model;

class VarProd3Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'var_prod_3';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'taller_1',
        'taller_2',
        'taller_3',
        'taller_4',
        'taller_5',
        'taller_6',
        'taller_7',
        'clase_1',
        'clase_2',
        'clase_3',
        'clase_4',
        'clase_5',
        'clase_6',
        'otros',
        'total_otros_temas',
        'grupo_interaprendizaje',
        'encuentro_intercultural',
        'fecha_encuentro',
        'id_prod_3'
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

    public function _getPro3Process($id) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*')->where('id_prod_3', $id);
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
        if ($datos['taller_1'] != 'NULL') {
            $builder->set('taller_1', $datos['taller_1']);
        }
        if ($datos['taller_2'] != 'NULL') {
            $builder->set('taller_2', $datos['taller_2']);
        }
        if ($datos['taller_3'] != 'NULL') {
            $builder->set('taller_3', $datos['taller_3']);
        }
        if ($datos['taller_4'] != 'NULL') {
            $builder->set('taller_4', $datos['taller_4']);
        }
        if ($datos['taller_5'] != 'NULL') {
            $builder->set('taller_5', $datos['taller_5']);
        }
        if ($datos['taller_6'] != 'NULL') {
            $builder->set('taller_6', $datos['taller_6']);
        }
        if ($datos['taller_7'] != 'NULL') {
            $builder->set('taller_7', $datos['taller_7']);
        }
        if ($datos['clase_1'] != 'NULL') {
            $builder->set('clase_1', $datos['clase_1']);
        }
        if ($datos['clase_2'] != 'NULL') {
            $builder->set('clase_2', $datos['clase_2']);
        }
        if ($datos['clase_3'] != 'NULL') {
            $builder->set('clase_3', $datos['clase_3']);
        }
        if ($datos['clase_4'] != 'NULL') {
            $builder->set('clase_4', $datos['clase_4']);
        }
        if ($datos['clase_5'] != 'NULL') {
            $builder->set('clase_5', $datos['clase_5']);
        }
        if ($datos['clase_6'] != 'NULL') {
            $builder->set('clase_6', $datos['clase_6']);
        }
        if ($datos['grupo_interaprendizaje'] != 'NULL') {
            $builder->set('grupo_interaprendizaje', $datos['grupo_interaprendizaje']);
        }
        if ($datos['encuentro_intercultural'] != 'NULL') {
            $builder->set('encuentro_intercultural', $datos['encuentro_intercultural']);
        }
        $builder->set('fecha_encuentro', $datos['fecha_encuentro']);
        $builder->set('total_otros_temas', $datos['total_otros_temas']);
        $builder->set('otros', $datos['otros']);
        $builder->where('id_prod_3', $datos['id']);
        $builder->update();
    }

    public function _save($datos) {
        
        $builder = $this->db->table($this->table);
        if ($datos['taller_1'] != 'NULL') {
            $builder->set('taller_1', $datos['taller_1']);
        }
        if ($datos['taller_2'] != 'NULL') {
            $builder->set('taller_2', $datos['taller_2']);
        }
        if ($datos['taller_3'] != 'NULL') {
            $builder->set('taller_3', $datos['taller_3']);
        }
        if ($datos['taller_4'] != 'NULL') {
            $builder->set('taller_4', $datos['taller_4']);
        }
        if ($datos['taller_5'] != 'NULL') {
            $builder->set('taller_5', $datos['taller_5']);
        }
        if ($datos['taller_6'] != 'NULL') {
            $builder->set('taller_6', $datos['taller_6']);
        }
        if ($datos['taller_7'] != 'NULL') {
            $builder->set('taller_7', $datos['taller_7']);
        }
        if ($datos['clase_1'] != 'NULL') {
            $builder->set('clase_1', $datos['clase_1']);
        }
        if ($datos['clase_2'] != 'NULL') {
            $builder->set('clase_2', $datos['clase_2']);
        }
        if ($datos['clase_3'] != 'NULL') {
            $builder->set('clase_3', $datos['clase_3']);
        }
        if ($datos['clase_4'] != 'NULL') {
            $builder->set('clase_4', $datos['clase_4']);
        }
        if ($datos['clase_5'] != 'NULL') {
            $builder->set('clase_5', $datos['clase_5']);
        }
        if ($datos['clase_6'] != 'NULL') {
            $builder->set('clase_6', $datos['clase_6']);
        }
        if ($datos['grupo_interaprendizaje'] != 'NULL') {
            $builder->set('grupo_interaprendizaje', $datos['grupo_interaprendizaje']);
        }
        if ($datos['encuentro_intercultural'] != 'NULL') {
            $builder->set('encuentro_intercultural', $datos['encuentro_intercultural']);
        }

        $builder->set('fecha_encuentro', $datos['fecha_encuentro']);
        $builder->set('total_otros_temas', $datos['total_otros_temas']);
        $builder->set('otros', $datos['otros']);
        $builder->set('id_prod_3', $datos['id']);
        
        $builder->insert();
    }
}
