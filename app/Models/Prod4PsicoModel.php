<?php

namespace App\Models;

use CodeIgniter\Model;

class Prod4PsicoModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'prod4_process_psico';
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

    public function _getProd4Psico($id) {
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
        if ($datos['reconoce_caract_fisicas'] != 'NULL') {
            $builder->set('reconoce_caract_fisicas', $datos['reconoce_caract_fisicas']);
        }
        if ($datos['reconoce_fortalezas'] != 'NULL') {
            $builder->set('reconoce_fortalezas', $datos['reconoce_fortalezas']);
        }
        if ($datos['reconoce_caract_personales'] != 'NULL') {
            $builder->set('reconoce_caract_personales', $datos['reconoce_caract_personales']);
        }
        if ($datos['prioriza_aspectos'] != 'NULL') {
            $builder->set('prioriza_aspectos', $datos['prioriza_aspectos']);
        }
        if ($datos['identifica_apoyo'] != 'NULL') {
            $builder->set('identifica_apoyo', $datos['identifica_apoyo']);
        }
        if ($datos['reconoce_debilidades'] != 'NULL') {
            $builder->set('reconoce_debilidades', $datos['reconoce_debilidades']);
        }

        if ($datos['metas_corto'] != 'NULL') {
            $builder->set('metas_corto', $datos['metas_corto']);
        }
        if ($datos['metas_largo'] != 'NULL') {
            $builder->set('metas_largo', $datos['metas_largo']);
        }


        $builder->where('idProd4', $datos['idProd4']);
        $builder->update();
    }

    public function _save($datos) {
        
        $builder = $this->db->table($this->table);
        if ($datos['reconoce_caract_fisicas'] != 'NULL') {
            $builder->set('reconoce_caract_fisicas', $datos['reconoce_caract_fisicas']);
        }
        if ($datos['reconoce_fortalezas'] != 'NULL') {
            $builder->set('reconoce_fortalezas', $datos['reconoce_fortalezas']);
        }
        if ($datos['reconoce_caract_personales'] != 'NULL') {
            $builder->set('reconoce_caract_personales', $datos['reconoce_caract_personales']);
        }
        if ($datos['prioriza_aspectos'] != 'NULL') {
            $builder->set('prioriza_aspectos', $datos['prioriza_aspectos']);
        }
        if ($datos['identifica_apoyo'] != 'NULL') {
            $builder->set('identifica_apoyo', $datos['identifica_apoyo']);
        }
        if ($datos['reconoce_debilidades'] != 'NULL') {
            $builder->set('reconoce_debilidades', $datos['reconoce_debilidades']);
        }

        if ($datos['metas_corto'] != 'NULL') {
            $builder->set('metas_corto', $datos['metas_corto']);
        }
        if ($datos['metas_largo'] != 'NULL') {
            $builder->set('metas_largo', $datos['metas_largo']);
        }
        

        $builder->set('idProd4', $datos['idProd4']);
        $builder->insert();
    }
}
