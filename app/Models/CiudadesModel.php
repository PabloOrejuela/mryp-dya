<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadesModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'ciudades';
    protected $primaryKey       = 'idciudades';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ciudad', 'cod_ciudad', 'idprovincias'
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

    public function _getIdciudades($ciudad) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*')->where('ciudad', strtoupper($ciudad));
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result = $row;
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _save($ciudad) {
        $builder = $this->db->table($this->table);
        //echo '<pre>'.var_export($ciudad, true).'</pre>';exit;
        $builder->set('ciudad', $ciudad['ciudad']);
        $builder->set('idprovincias', $ciudad['idprovincias']);
        $builder->insert();
    }

    public function _obtenCiudades($provincia) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*')->where('idprovincias', $provincia);
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result[] = $row;
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _getCiudades() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->orderBy('ciudad', 'asc');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result[] = $row;
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _getCiudadesProd4() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('centro_prod_4', 'centro_prod_4.idciudades = '.$this->table.'.idciudades');
        $builder->orderBy('ciudad', 'asc');
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
