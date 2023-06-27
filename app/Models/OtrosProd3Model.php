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
        if ($datos['tema_grupo_inter'] != 'NULL') {
            $builder->set('tema_grupo_inter', $datos['tema_grupo_inter']);
        }

        if ($datos['fecha_grupo_inter'] != 'NULL') {
            $builder->set('fecha_grupo_inter', $datos['fecha_grupo_inter']);
        }

        if ($datos['tema_1'] != 'NULL') {
            $builder->set('tema_1', $datos['tema_1']);
        }

        if ($datos['tema_2'] != 'NULL') {
            $builder->set('tema_2', $datos['tema_2']);
        }

        if ($datos['tema_3'] != 'NULL') {
            $builder->set('tema_3', $datos['tema_3']);
        }

        if ($datos['tema_4'] != 'NULL') {
            $builder->set('tema_4', $datos['tema_4']);
        }

        if ($datos['tema_5'] != 'NULL') {
            $builder->set('tema_5', $datos['tema_5']);
        }

        if ($datos['tema_6'] != 'NULL') {
            $builder->set('tema_6', $datos['tema_6']);
        }

        if ($datos['fecha_tema_1'] != 'NULL') {
            $builder->set('fecha_tema_1', $datos['fecha_tema_1']);
        }

        if ($datos['fecha_tema_2'] != 'NULL') {
            $builder->set('fecha_tema_2', $datos['fecha_tema_2']);
        }

        if ($datos['fecha_tema_3'] != 'NULL') {
            $builder->set('fecha_tema_3', $datos['fecha_tema_3']);
        }

        if ($datos['fecha_tema_4'] != 'NULL') {
            $builder->set('fecha_tema_4', $datos['fecha_tema_4']);
        }

        if ($datos['fecha_tema_5'] != 'NULL') {
            $builder->set('fecha_tema_5', $datos['fecha_tema_5']);
        }

        if ($datos['fecha_tema_6'] != 'NULL') {
            $builder->set('fecha_tema_6', $datos['fecha_tema_6']);
        }

        if ($datos['visita_biblioteca_viajera'] != 'NULL') {
            $builder->set('visita_biblioteca_viajera', $datos['visita_biblioteca_viajera']);
        }

        if ($datos['fecha_visita_biblioteca_viajera'] != 'NULL') {
            $builder->set('fecha_visita_biblioteca_viajera', $datos['fecha_visita_biblioteca_viajera']);
        }


        $builder->where('id_prod_3 ', $datos['id_prod_3']);
        $builder->update();
    }

    public function _save($datos) {
        
        $builder = $this->db->table($this->table);
        
        if ($datos['grupo_interaprendizaje'] != 'NULL') {
            $builder->set('grupo_interaprendizaje', $datos['grupo_interaprendizaje']);
        }
        if ($datos['tema_grupo_inter'] != 'NULL') {
            $builder->set('tema_grupo_inter', $datos['tema_grupo_inter']);
        }

        if ($datos['fecha_grupo_inter'] != 'NULL') {
            $builder->set('fecha_grupo_inter', $datos['fecha_grupo_inter']);
        }

        if ($datos['tema_1'] != 'NULL') {
            $builder->set('tema_1', $datos['tema_1']);
        }

        if ($datos['tema_2'] != 'NULL') {
            $builder->set('tema_2', $datos['tema_2']);
        }

        if ($datos['tema_3'] != 'NULL') {
            $builder->set('tema_3', $datos['tema_3']);
        }

        if ($datos['tema_4'] != 'NULL') {
            $builder->set('tema_4', $datos['tema_4']);
        }

        if ($datos['tema_5'] != 'NULL') {
            $builder->set('tema_5', $datos['tema_5']);
        }

        if ($datos['tema_6'] != 'NULL') {
            $builder->set('tema_6', $datos['tema_6']);
        }

        if ($datos['fecha_tema_1'] != 'NULL') {
            $builder->set('fecha_tema_1', $datos['fecha_tema_1']);
        }

        if ($datos['fecha_tema_2'] != 'NULL') {
            $builder->set('fecha_tema_2', $datos['fecha_tema_2']);
        }

        if ($datos['fecha_tema_3'] != 'NULL') {
            $builder->set('fecha_tema_3', $datos['fecha_tema_3']);
        }

        if ($datos['fecha_tema_4'] != 'NULL') {
            $builder->set('fecha_tema_4', $datos['fecha_tema_4']);
        }

        if ($datos['fecha_tema_5'] != 'NULL') {
            $builder->set('fecha_tema_5', $datos['fecha_tema_5']);
        }

        if ($datos['fecha_tema_6'] != 'NULL') {
            $builder->set('fecha_tema_6', $datos['fecha_tema_6']);
        }

        if ($datos['visita_biblioteca_viajera'] != 'NULL') {
            $builder->set('visita_biblioteca_viajera', $datos['visita_biblioteca_viajera']);
        }

        if ($datos['fecha_visita_biblioteca_viajera'] != 'NULL') {
            $builder->set('fecha_visita_biblioteca_viajera', $datos['fecha_visita_biblioteca_viajera']);
        }
        $builder->set('id_prod_3', $datos['id_prod_3']);
        $builder->insert();
    }
}
