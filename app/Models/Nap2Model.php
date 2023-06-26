<?php

namespace App\Models;

use CodeIgniter\Model;

class Nap2Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'nap2_est_dya';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'amie',
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

    /**
     *
     * Esta función trae los registros que tienen a
     * tutor de apoyo y tutor de apoyo 2
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getMisRegistros($nombre) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('tutor_apoyo', $nombre);
        $builder->orderBy('id');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result[] = $row;
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _getCentrosEducativos() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('nap2_est_dya.amie as amie, nombre');
        $builder->distinct();
        $builder->join('centro_educativo', 'centro_educativo.amie = nap2_est_dya.amie');
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

    /**
     *
     * Esta función trae los registros que tienen el NAP 2 sin filtrar por Técnico
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getRegistrosNap2() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('centro_educativo','centro_educativo.amie = '.$this->table.'.amie');
        $builder->orderBy('id');
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
