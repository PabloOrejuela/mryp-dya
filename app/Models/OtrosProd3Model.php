<?php

namespace App\Models;

use CodeIgniter\Model;

class OtrosProd3Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'otros_procesos_prod_3';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id', 'otros', 'total_otros_temas', 'grupo_interaprendizaje', 'encuentro_intercultural', 'fecha_encuentro', 'id_prod_3', 
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

    public function _getProd3Otros($id) {
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

        if ($datos['grupo_interaprendizaje'] != 'NULL') {
            $builder->set('grupo_interaprendizaje', $datos['grupo_interaprendizaje']);
        }
        if ($datos['encuentro_intercultural'] != 'NULL') {
            $builder->set('encuentro_intercultural', $datos['encuentro_intercultural']);
        }
        $builder->set('fecha_encuentro', $datos['fecha_encuentro']);
        $builder->set('total_otros_temas', $datos['total_otros_temas']);
        $builder->set('otros', $datos['otros']);
        $builder->where('id_prod_3 ', $datos['id_prod_3']);
        $builder->update();
    }

    public function _save($datos) {
        
        $builder = $this->db->table($this->table);
        
        if ($datos['grupo_interaprendizaje'] != 'NULL') {
            $builder->set('grupo_interaprendizaje', $datos['grupo_interaprendizaje']);
        }
        if ($datos['encuentro_intercultural'] != 'NULL') {
            $builder->set('encuentro_intercultural', $datos['encuentro_intercultural']);
        }

        $builder->set('fecha_encuentro', $datos['fecha_encuentro']);
        $builder->set('total_otros_temas', $datos['total_otros_temas']);
        $builder->set('otros', $datos['otros']);
        $builder->set('id_prod_3', $datos['id_prod_3']);
        $builder->insert();
    }
}
