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
}
