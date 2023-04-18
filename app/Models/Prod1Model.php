<?php

namespace App\Models;

use CodeIgniter\Model;

class Prod1Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'producto_1';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'amie',
        'cohorte',
        'fecha_inicio',
        'fecha_fin',
        'nombres',
        'apellidos',
        'documento',
        'nacionalidad',                
        'etnia',
        'fecha_nac',
        'edad',
        'genero',
        'discapacidad',
        'tipo_discapacidad',
        'anio_egb',
        'tutor_apoyo',
        'docente_tutor',
        'representante',
        'documento_rep',
        'parentesto_rep',
        'nacionalidad_rep',
        'direccion_rep',
        'contacto_telf',
        'email'
                        
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
