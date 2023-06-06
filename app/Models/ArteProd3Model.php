<?php

namespace App\Models;

use CodeIgniter\Model;

class ArteProd3Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'exp_artistica_prod3';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'docente_autoestima',
        'arte_usos',
        'creatividad',
        'etapas',
        'autorretrato_taller',
        'incluir_clases',
        'autorretrato_clase',
        'emociones',
        'familia',
        'camiseta',
        'id_prod_3',
        'created_at',
        'updated_at',
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

    public function _getProd3Arte($id) {
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
        if ($datos['docente_autoestima'] != 'NULL') {
            $builder->set('docente_autoestima', $datos['docente_autoestima']);
        }
        if ($datos['arte_usos'] != 'NULL') {
            $builder->set('arte_usos', $datos['arte_usos']);
        }
        if ($datos['creatividad'] != 'NULL') {
            $builder->set('creatividad', $datos['creatividad']);
        }
        if ($datos['etapas'] != 'NULL') {
            $builder->set('etapas', $datos['etapas']);
        }
        if ($datos['autorretrato_taller'] != 'NULL') {
            $builder->set('autorretrato_taller', $datos['autorretrato_taller']);
        }
        if ($datos['incluir_clases'] != 'NULL') {
            $builder->set('incluir_clases', $datos['incluir_clases']);
        }
        if ($datos['autorretrato_clase'] != 'NULL') {
            $builder->set('autorretrato_clase', $datos['autorretrato_clase']);
        }
        if ($datos['emociones'] != 'NULL') {
            $builder->set('emociones', $datos['emociones']);
        }
        if ($datos['familia'] != 'NULL') {
            $builder->set('familia', $datos['familia']);
        }
        if ($datos['camiseta'] != 'NULL') {
            $builder->set('camiseta', $datos['camiseta']);
        }
        $builder->where('id_prod_3', $datos['id_prod_3']);
        $builder->update();
    }

    public function _save($datos) {
        
        $builder = $this->db->table($this->table);
        if ($datos['docente_autoestima'] != 'NULL') {
            $builder->set('docente_autoestima', $datos['docente_autoestima']);
        }
        if ($datos['arte_usos'] != 'NULL') {
            $builder->set('arte_usos', $datos['arte_usos']);
        }
        if ($datos['creatividad'] != 'NULL') {
            $builder->set('creatividad', $datos['creatividad']);
        }
        if ($datos['etapas'] != 'NULL') {
            $builder->set('etapas', $datos['etapas']);
        }
        if ($datos['autorretrato_taller'] != 'NULL') {
            $builder->set('autorretrato_taller', $datos['autorretrato_taller']);
        }
        if ($datos['incluir_clases'] != 'NULL') {
            $builder->set('incluir_clases', $datos['incluir_clases']);
        }
        if ($datos['autorretrato_clase'] != 'NULL') {
            $builder->set('autorretrato_clase', $datos['autorretrato_clase']);
        }
        if ($datos['emociones'] != 'NULL') {
            $builder->set('emociones', $datos['emociones']);
        }
        if ($datos['familia'] != 'NULL') {
            $builder->set('familia', $datos['familia']);
        }
        if ($datos['camiseta'] != 'NULL') {
            $builder->set('camiseta', $datos['camiseta']);
        }
        $builder->set('id_prod_3', $datos['id_prod_3']);
        
        $builder->insert();
    }
}
