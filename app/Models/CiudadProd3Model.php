<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadProd3Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'ciudadania_prod3';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'interculturalidad',
        'masculinidad',
        'sexo_genero',
        'violencia_genero',
        'diversidad_estetica',
        'diversidad_neuro',
        'clase_1',
        'clase_2',
        'clase_3',
        'clase_4',
        'clase_5',
        'clase_6',
        'id_prod_3',
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

    public function _getProd3Ciudad($id) {
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
        if ($datos['interculturalidad'] != 'NULL') {
            $builder->set('interculturalidad', $datos['interculturalidad']);
        }
        if ($datos['masculinidad'] != 'NULL') {
            $builder->set('masculinidad', $datos['masculinidad']);
        }
        if ($datos['sexo_genero'] != 'NULL') {
            $builder->set('sexo_genero', $datos['sexo_genero']);
        }
        if ($datos['violencia_genero'] != 'NULL') {
            $builder->set('violencia_genero', $datos['violencia_genero']);
        }
        if ($datos['diversidad_estetica'] != 'NULL') {
            $builder->set('diversidad_estetica', $datos['diversidad_estetica']);
        }
        if ($datos['diversidad_neuro'] != 'NULL') {
            $builder->set('diversidad_neuro', $datos['diversidad_neuro']);
        }
        $builder->where('id_prod_3', $datos['id_prod_3']);
        $builder->update();
    }

    public function _save($datos) {
        
        $builder = $this->db->table($this->table);
        if ($datos['interculturalidad'] != 'NULL') {
            $builder->set('interculturalidad', $datos['interculturalidad']);
        }
        if ($datos['masculinidad'] != 'NULL') {
            $builder->set('masculinidad', $datos['masculinidad']);
        }
        if ($datos['sexo_genero'] != 'NULL') {
            $builder->set('sexo_genero', $datos['sexo_genero']);
        }
        if ($datos['violencia_genero'] != 'NULL') {
            $builder->set('violencia_genero', $datos['violencia_genero']);
        }
        if ($datos['diversidad_estetica'] != 'NULL') {
            $builder->set('diversidad_estetica', $datos['diversidad_estetica']);
        }
        if ($datos['diversidad_neuro'] != 'NULL') {
            $builder->set('diversidad_neuro', $datos['diversidad_neuro']);
        }
        $builder->set('id_prod_3', $datos['id_prod_3']);
        
        $builder->insert();
    }
}
