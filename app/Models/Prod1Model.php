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

    public function _getNacionalidades() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('nacionalidad');
        $builder->distinct();
        $builder->orderBy('nacionalidad');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                if ($row->nacionalidad != NULL && $row != '') {
                    $result[] = $row;
                }
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _getGeneros() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('genero');
        $builder->distinct();
        $builder->orderBy('genero');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                if ($row->genero != NULL && $row != '') {
                    $result[] = $row;
                }
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _getIdsAmie($amie) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('id');
        $builder->where('amie', $amie);
        $builder->orderBy('id');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                if ($row->id != NULL && $row != '') {
                    $result[] = $row;
                }
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _getCentrosEducativos() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('producto_1.amie as amie, nombre');
        $builder->distinct();
        $builder->join('centro_educativo', 'centro_educativo.amie = producto_1.amie');
        $builder->orderBy('nombre');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                if ($row->amie != NULL && $row != '') {
                    $result[] = $row;
                }
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }
}
