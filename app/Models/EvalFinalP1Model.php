<?php

namespace App\Models;

use CodeIgniter\Model;

class EvalFinalP1Model extends Model {
    
    protected $DBGroup          = 'default';
    protected $table            = 'eval_final';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'necesito_apoyo',
        'observacion',
        'p1_comprension_lectora',
        'p1_inteligibilidad',
        'p2_comprension_lectora',
        'p2_descripcion_dibujo',
        'p3_comprension_lectora',
        'p3_inteligibilidad',
        'p3_coherencia',
        'p3_sintaxis',
        'p3_estandares_egb_sub2y3',
        'p4_comprension_lectora',
        'p4_inteligibilidad',
        'p4_coherencia',
        'p4_sintaxis',
        'p4_estandares_egb_sub2y3',
        'idtipo',
        'idprod'
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

    public function _getEvalFinal($idprod) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*')->where('idprod', $idprod);
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
        if ($datos['necesito_apoyo'] != 'NULL') {
            $builder->set('necesito_apoyo', $datos['necesito_apoyo']);
        }
        if ($datos['observacion'] != 'NULL') {
            $builder->set('observacion', $datos['observacion']);
        }
        if ($datos['p1_comprension_lectora'] != 'NULL') {
            $builder->set('p1_comprension_lectora', $datos['p1_comprension_lectora']);
        }
        if ($datos['p1_inteligibilidad'] != 'NULL') {
            $builder->set('p1_inteligibilidad', $datos['p1_inteligibilidad']);
        }
        if ($datos['p2_comprension_lectora'] != 'NULL') {
            $builder->set('p2_comprension_lectora', $datos['p2_comprension_lectora']);
        }
        if ($datos['p2_descripcion_dibujo'] != 'NULL') {
            $builder->set('p2_descripcion_dibujo', $datos['p2_descripcion_dibujo']);
        }
        if ($datos['p3_comprension_lectora'] != 'NULL') {
            $builder->set('p3_comprension_lectora', $datos['p3_comprension_lectora']);
        }
        if ($datos['p3_inteligibilidad'] != 'NULL') {
            $builder->set('p3_inteligibilidad', $datos['p3_inteligibilidad']);
        }
        if ($datos['p3_coherencia'] != 'NULL') {
            $builder->set('p3_coherencia', $datos['p3_coherencia']);
        }
        if ($datos['p3_sintaxis'] != 'NULL') {
            $builder->set('p3_sintaxis', $datos['p3_sintaxis']);
        }
        if ($datos['p3_estandares_egb_sub2y3'] != 'NULL') {
            $builder->set('p3_estandares_egb_sub2y3', $datos['p3_estandares_egb_sub2y3']);
        }
        if ($datos['p4_comprension_lectora'] != 'NULL') {
            $builder->set('p4_comprension_lectora', $datos['p4_comprension_lectora']);
        }
        if ($datos['p4_inteligibilidad'] != 'NULL') {
            $builder->set('p4_inteligibilidad', $datos['p4_inteligibilidad']);
        }
        if ($datos['p4_coherencia'] != 'NULL') {
            $builder->set('p4_coherencia', $datos['p4_coherencia']);
        }
        if ($datos['p4_sintaxis'] != 'NULL') {
            $builder->set('p4_sintaxis', $datos['p4_sintaxis']);
        }
        if ($datos['p4_estandares_egb_sub2y3'] != 'NULL') {
            $builder->set('p4_estandares_egb_sub2y3', $datos['p4_estandares_egb_sub2y3']);
        }
        $builder->set('idtipo', $datos['idtipo']);
        $builder->where('idprod', $datos['idprod']);
        $builder->update();
    }

    public function _save($datos) {
        
        $builder = $this->db->table($this->table);
        if ($datos['necesito_apoyo'] != 'NULL') {
            $builder->set('necesito_apoyo', $datos['necesito_apoyo']);
        }
        if ($datos['observacion'] != 'NULL') {
            $builder->set('observacion', $datos['observacion']);
        }
        if ($datos['p1_comprension_lectora'] != 'NULL') {echo 141;
            $builder->set('p1_comprension_lectora', $datos['p1_comprension_lectora']);
        }
        if ($datos['p1_inteligibilidad'] != 'NULL') {
            $builder->set('p1_inteligibilidad', $datos['p1_inteligibilidad']);
        }
        if ($datos['p2_comprension_lectora'] != 'NULL') {
            $builder->set('p2_comprension_lectora', $datos['p2_comprension_lectora']);
        }
        if ($datos['p2_descripcion_dibujo'] != 'NULL') {
            $builder->set('p2_descripcion_dibujo', $datos['p2_descripcion_dibujo']);
        }
        if ($datos['p3_comprension_lectora'] != 'NULL') {
            $builder->set('p3_comprension_lectora', $datos['p3_comprension_lectora']);
        }
        if ($datos['p3_inteligibilidad'] != 'NULL') {
            $builder->set('p3_inteligibilidad', $datos['p3_inteligibilidad']);
        }
        if ($datos['p3_coherencia'] != 'NULL') {
            $builder->set('p3_coherencia', $datos['p3_coherencia']);
        }
        if ($datos['p3_sintaxis'] != 'NULL') {
            $builder->set('p3_sintaxis', $datos['p3_sintaxis']);
        }
        if ($datos['p3_estandares_egb_sub2y3'] != 'NULL') {
            $builder->set('p3_estandares_egb_sub2y3', $datos['p3_estandares_egb_sub2y3']);
        }
        if ($datos['p4_comprension_lectora'] != 'NULL') {
            $builder->set('p4_comprension_lectora', $datos['p4_comprension_lectora']);
        }
        if ($datos['p4_inteligibilidad'] != 'NULL') {
            $builder->set('p4_inteligibilidad', $datos['p4_inteligibilidad']);
        }
        if ($datos['p4_coherencia'] != 'NULL') {
            $builder->set('p4_coherencia', $datos['p4_coherencia']);
        }
        if ($datos['p4_sintaxis'] != 'NULL') {
            $builder->set('p4_sintaxis', $datos['p4_sintaxis']);
        }
        if ($datos['p4_estandares_egb_sub2y3'] != 'NULL') {
            $builder->set('p4_estandares_egb_sub2y3', $datos['p4_estandares_egb_sub2y3']);
        }
        $builder->set('idtipo', $datos['idtipo']);
        $builder->set('idprod', $datos['idprod']);
        
        $builder->insert();
    }

    public function _getDatosEvalLenguajeMyrp($registros) {
        
        $result = null;
        foreach ($registros as $key => $value) {
            
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where('idprod', $value->id);
            $query = $builder->get();
            if ($query->getResult() != null) {
                foreach ($query->getResult() as $row) {
                    $result[] = $row;
                }
            }
            //echo $this->db->getLastQuery();
        }
        return $result;
    }
}
