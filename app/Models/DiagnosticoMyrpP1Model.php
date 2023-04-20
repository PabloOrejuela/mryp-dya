<?php

namespace App\Models;

use CodeIgniter\Model;

class DiagnosticoMyrpP1Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'diag_myrp';
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

    public function _getDiagMyrpP1($idprod) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*')->where('idprod', strtoupper($idprod));
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result = $row;
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }
}
