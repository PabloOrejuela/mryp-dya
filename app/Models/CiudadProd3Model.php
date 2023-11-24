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
    protected $protectFields    = false;
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

    public function _getTotalTalleresCiudad($id) {
        $total = 0;
        $builder = $this->db->table($this->table);
        $builder->select('interculturalidad,masculinidad,sexo_genero,violencia_genero,diversidad_estetica,diversidad_neuro')->where('id_prod_3', $id);
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                if ($row->interculturalidad == 1) {
                    $total += 1;
                }

                if ($row->masculinidad == 1) {
                    $total += 1;
                }

                if ($row->sexo_genero == 1) {
                    $total += 1;
                }

                if ($row->violencia_genero == 1) {
                    $total += 1;
                }

                if ($row->diversidad_estetica == 1) {
                    $total += 1;
                }

                if ($row->diversidad_neuro == 1) {
                    $total += 1;
                }
            }
        }
        //echo $this->db->getLastQuery();
        return $total;
    }

    public function _getTalleresCiudadania($id) {
        $total = null;

        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_prod_3', $id);
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $total = $row;
            }
        }
        //echo $this->db->getLastQuery();
        return $total;
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

        if ($datos['interculturalidad_mes'] != 'NULL') {
            $builder->set('interculturalidad_mes', $datos['interculturalidad_mes']);
        }
        if ($datos['masculinidad_mes'] != 'NULL') {
            $builder->set('masculinidad_mes', $datos['masculinidad_mes']);
        }
        if ($datos['sexo_genero_mes'] != 'NULL') {
            $builder->set('sexo_genero_mes', $datos['sexo_genero_mes']);
        }
        if ($datos['violencia_genero_mes'] != 'NULL') {
            $builder->set('violencia_genero_mes', $datos['violencia_genero_mes']);
        }
        if ($datos['diversidad_estetica_mes'] != 'NULL') {
            $builder->set('diversidad_estetica_mes', $datos['diversidad_estetica_mes']);
        }
        if ($datos['diversidad_neuro_mes'] != 'NULL') {
            $builder->set('diversidad_neuro_mes', $datos['diversidad_neuro_mes']);
        }

        if ($datos['racismo_clase_ciu'] != 'NULL') {
            $builder->set('racismo_clase_ciu', $datos['racismo_clase_ciu']);
        }
        if ($datos['rechazo_clase_ciu'] != 'NULL') {
            $builder->set('rechazo_clase_ciu', $datos['rechazo_clase_ciu']);
        }

        if ($datos['racismo_clase_ciu_mes'] != 'NULL') {
            $builder->set('racismo_clase_ciu_mes', $datos['racismo_clase_ciu_mes']);
        }
        if ($datos['rechazo_clase_ciu_mes'] != 'NULL') {
            $builder->set('rechazo_clase_ciu_mes', $datos['rechazo_clase_ciu_mes']);
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

        if ($datos['interculturalidad_mes'] != 'NULL') {
            $builder->set('interculturalidad_mes', $datos['interculturalidad_mes']);
        }
        if ($datos['masculinidad_mes'] != 'NULL') {
            $builder->set('masculinidad_mes', $datos['masculinidad_mes']);
        }
        if ($datos['sexo_genero_mes'] != 'NULL') {
            $builder->set('sexo_genero_mes', $datos['sexo_genero_mes']);
        }
        if ($datos['violencia_genero_mes'] != 'NULL') {
            $builder->set('violencia_genero_mes', $datos['violencia_genero_mes']);
        }
        if ($datos['diversidad_estetica_mes'] != 'NULL') {
            $builder->set('diversidad_estetica_mes', $datos['diversidad_estetica_mes']);
        }
        if ($datos['diversidad_neuro_mes'] != 'NULL') {
            $builder->set('diversidad_neuro_mes', $datos['diversidad_neuro_mes']);
        }

        if ($datos['racismo_clase_ciu'] != 'NULL') {
            $builder->set('racismo_clase_ciu', $datos['racismo_clase_ciu']);
        }
        if ($datos['rechazo_clase_ciu'] != 'NULL') {
            $builder->set('rechazo_clase_ciu', $datos['rechazo_clase_ciu']);
        }

        if ($datos['racismo_clase_ciu_mes'] != 'NULL') {
            $builder->set('racismo_clase_ciu_mes', $datos['racismo_clase_ciu_mes']);
        }
        if ($datos['rechazo_clase_ciu_mes'] != 'NULL') {
            $builder->set('rechazo_clase_ciu_mes', $datos['rechazo_clase_ciu_mes']);
        }

        $builder->set('id_prod_3', $datos['id_prod_3']);
        $builder->insert();
    }
}
