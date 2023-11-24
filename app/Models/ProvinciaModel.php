<?php

namespace App\Models;

use CodeIgniter\Model;

class ProvinciaModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'provincias';
    protected $primaryKey       = 'idprovincias';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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

    public function _getProvinciasProd1() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('provincia');
        $builder->distinct();
        $builder->join('centro_educativo', 'centro_educativo.amie = '.$this->table.'.amie');
        $builder->join('ciudades', 'ciudades.idciudades = centro_educativo.idciudades');
        $builder->join('provincias', 'provincias.idprovincias = ciudades.idprovincias');
        $builder->orderBy('provincia');
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
}
