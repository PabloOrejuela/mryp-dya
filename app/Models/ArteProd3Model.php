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
        'docente_autoestima_mes',
        'arte_usos',
        'arte_usos_mes',
        'creatividad',
        'creatividad_mes',
        'etapas',
        'etapas_mes',
        'autorretrato_taller',
        'autorretrato_taller_mes',
        'incluir_clases',
        'incluir_clases_mes',
        'autorretrato_clase',
        'autorretrato_clase_mes',
        'emociones',
        'emociones_mes',
        'familia',
        'familia_mes',
        'camiseta',
        'camiseta_mes',
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
        if ($datos['docente_autoestima_mes'] != 'NULL') {
            $builder->set('docente_autoestima_mes', $datos['docente_autoestima_mes']);
        }
        if ($datos['arte_usos'] != 'NULL') {
            $builder->set('arte_usos', $datos['arte_usos']);
        }
        if ($datos['arte_usos_mes'] != 'NULL') {
            $builder->set('arte_usos_mes', $datos['arte_usos_mes']);
        }
        if ($datos['creatividad'] != 'NULL') {
            $builder->set('creatividad', $datos['creatividad']);
        }
        if ($datos['creatividad_mes'] != 'NULL') {
            $builder->set('creatividad_mes', $datos['creatividad_mes']);
        }
        if ($datos['etapas'] != 'NULL') {
            $builder->set('etapas', $datos['etapas']);
        }
        if ($datos['etapas_mes'] != 'NULL') {
            $builder->set('etapas_mes', $datos['etapas_mes']);
        }
        if ($datos['autorretrato_taller'] != 'NULL') {
            $builder->set('autorretrato_taller', $datos['autorretrato_taller']);
        }
        if ($datos['autorretrato_taller_mes'] != 'NULL') {
            $builder->set('autorretrato_taller_mes', $datos['autorretrato_taller_mes']);
        }
        if ($datos['incluir_clases'] != 'NULL') {
            $builder->set('incluir_clases', $datos['incluir_clases']);
        }
        if ($datos['incluir_clases_mes'] != 'NULL') {
            $builder->set('incluir_clases_mes', $datos['incluir_clases_mes']);
        }
        if ($datos['autorretrato_clase'] != 'NULL') {
            $builder->set('autorretrato_clase', $datos['autorretrato_clase']);
        }
        if ($datos['autorretrato_clase_mes'] != 'NULL') {
            $builder->set('autorretrato_clase_mes', $datos['autorretrato_clase_mes']);
        }
        if ($datos['emociones'] != 'NULL') {
            $builder->set('emociones', $datos['emociones']);
        }
        if ($datos['emociones_mes'] != 'NULL') {
            $builder->set('emociones_mes', $datos['emociones_mes']);
        }
        if ($datos['familia'] != 'NULL') {
            $builder->set('familia', $datos['familia']);
        }
        if ($datos['familia_mes'] != 'NULL') {
            $builder->set('familia_mes', $datos['familia_mes']);
        }
        if ($datos['camiseta'] != 'NULL') {
            $builder->set('camiseta', $datos['camiseta']);
        }
        if ($datos['camiseta_mes'] != 'NULL') {
            $builder->set('camiseta_mes', $datos['camiseta_mes']);
        }
        $builder->where('id_prod_3', $datos['id_prod_3']);
        $builder->update();
    }

    public function _save($datos) {
        
        $builder = $this->db->table($this->table);
        if ($datos['docente_autoestima'] != 'NULL') {
            $builder->set('docente_autoestima', $datos['docente_autoestima']);
        }
        if ($datos['docente_autoestima_mes'] != 'NULL') {
            $builder->set('docente_autoestima_mes', $datos['docente_autoestima_mes']);
        }
        if ($datos['arte_usos'] != 'NULL') {
            $builder->set('arte_usos', $datos['arte_usos']);
        }
        if ($datos['arte_usos_mes'] != 'NULL') {
            $builder->set('arte_usos_mes', $datos['arte_usos_mes']);
        }
        if ($datos['creatividad'] != 'NULL') {
            $builder->set('creatividad', $datos['creatividad']);
        }
        if ($datos['creatividad_mes'] != 'NULL') {
            $builder->set('creatividad_mes', $datos['creatividad_mes']);
        }
        if ($datos['etapas'] != 'NULL') {
            $builder->set('etapas', $datos['etapas']);
        }
        if ($datos['etapas_mes'] != 'NULL') {
            $builder->set('etapas_mes', $datos['etapas_mes']);
        }
        if ($datos['autorretrato_taller'] != 'NULL') {
            $builder->set('autorretrato_taller', $datos['autorretrato_taller']);
        }
        if ($datos['autorretrato_taller_mes'] != 'NULL') {
            $builder->set('autorretrato_taller_mes', $datos['autorretrato_taller_mes']);
        }
        if ($datos['incluir_clases'] != 'NULL') {
            $builder->set('incluir_clases', $datos['incluir_clases']);
        }
        if ($datos['incluir_clases_mes'] != 'NULL') {
            $builder->set('incluir_clases_mes', $datos['incluir_clases_mes']);
        }
        if ($datos['autorretrato_clase'] != 'NULL') {
            $builder->set('autorretrato_clase', $datos['autorretrato_clase']);
        }
        if ($datos['autorretrato_clase_mes'] != 'NULL') {
            $builder->set('autorretrato_clase_mes', $datos['autorretrato_clase_mes']);
        }
        if ($datos['emociones'] != 'NULL') {
            $builder->set('emociones', $datos['emociones']);
        }
        if ($datos['emociones_mes'] != 'NULL') {
            $builder->set('emociones_mes', $datos['emociones_mes']);
        }
        if ($datos['familia'] != 'NULL') {
            $builder->set('familia', $datos['familia']);
        }
        if ($datos['familia_mes'] != 'NULL') {
            $builder->set('familia_mes', $datos['familia_mes']);
        }
        if ($datos['camiseta'] != 'NULL') {
            $builder->set('camiseta', $datos['camiseta']);
        }
        if ($datos['camiseta_mes'] != 'NULL') {
            $builder->set('camiseta_mes', $datos['camiseta_mes']);
        }
        $builder->set('id_prod_3', $datos['id_prod_3']);
        
        $builder->insert();
    }
}
