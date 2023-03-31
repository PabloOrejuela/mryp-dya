<?php

namespace App\Models;

use CodeIgniter\Model;

class CentroEducativoModel extends Model {
    
    protected $DBGroup          = 'default';
    protected $table            = 'centro_educativo';
    protected $primaryKey       = 'amie';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'amie',
        'intervencion' ,
        'observacion',
        'clima_escolar'  ,
        'cod_parroquia',
        'nombre',
        'escolarizacion',
        'tipo_educacion',
        'nivel_educacion'   ,
        'sostenimiento',
        'num_docentes',
        'num_docentes_evaluados',
        'res_evaluacion_docentes',
        'cant_est',
        'cant_est_discapacidad',
        'proporcion_ninias_adoles',
        'ecuatoriana' ,
        'colombiana' ,
        'peruana' ,
        'venezolana' ,
        'otros_paises' ,
        'porcentaje_extranjeros',
        'alumnos_docente',
        'agua',
        'higiene',
        'saneamiento',
        'prioridad',
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
