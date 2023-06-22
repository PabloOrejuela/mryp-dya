<?php

namespace App\Models;

use CodeIgniter\Model;

class Nap4Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'nap4_mineduc_est_pres';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'amie',
        'anio_lectivo',
        'documento',
        'apellidos',
        'nombres',
        'nacionalidad',
        'etnia',
        'genero',
        'fecha_nac',
        'edad',
        'nivel',
        'discapacidad',
        'tipo_discapacidad',
        'institucion',
        'doc_tutor',
        'docente_tutor',
        'email_tutor',
        'telf_tutor',
        'etnia_tutor',
        'documento_rep',
        'representante',
        'parentesto_rep',
        'nacionalidad_rep',
        'direccion_rep',
        'contacto_telf',
        'email',
        'observaciones',
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
