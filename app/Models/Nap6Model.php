<?php

namespace App\Models;

use CodeIgniter\Model;

class Nap6Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'nap6';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'amie',
        'documento',
        'nombres_est',
        'apellidos_est',
        'nacionalidad',
        'etnia',
        'genero',
        'fecha_nac',
        'edad',
        'discapacidad',
        'tipo_discapacidad',
        'cedula_tutor',
        'apellido_doc_tutor',
        'nombre_doc_tutor',
        'email_tutor',
        'celular_tutor',
        'etnia_tutor',
        'documento_rep',
        'representante',
        'parentesto_rep',
        'nacionalidad_rep',
        'direccion_rep',
        'contacto_telf',
        'email'
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
}
