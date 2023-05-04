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
        'regimen',
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

    public function _save($centro) {
        $builder = $this->db->table($this->table);
        //echo '<pre>'.var_export($ciudad, true).'</pre>';exit;
        $builder->set('amie', $centro['amie']);
        $builder->set('nombre', $centro['nombre']);
        $builder->set('idciudades', $centro['idciudades']);
        $builder->set('idparroquia', $centro['idparroquia']);
        $builder->insert();
    }

    public function _getCentros() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->orderBy('nombre');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result[] = $row;
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

}
