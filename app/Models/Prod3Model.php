<?php

namespace App\Models;

use CodeIgniter\Model;

class Prod3Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'producto_3';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'amie',
        'nombre',
        'documento',
        'nacionalidad',                
        'genero',
        'discapacidad',
        'tipo',
        'email',
        'celular',
        'inicial_1',
        'inicial_2',
        'pri_egb',
        'seg_egb',
        'ter_egb',
        'cuart_egb',
        'quin_egb',
        'sex_egb',
        'sept_egb',
        'oct_egb',
        'nov_egb',
        'dec_egb',
        'pri_bach',
        'seg_bach',
        'ter_bach',
        'especialidad',
        'funcion'
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
