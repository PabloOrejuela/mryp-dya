<?php

namespace App\Models;

use CodeIgniter\Model;

class CentrosProvProd1ViewModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'centros_prov_prod_1';
    protected $primaryKey       = 'amie';
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

    public function _obtenCentrosCiudad($ciudad) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('amie,nombre');
        $builder->where('idciudades', $ciudad);
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

    public function _obtenCiudades($provincia) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('ciudad,idciudades')->distinct()->where('idprovincias', $provincia);
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result[] = $row;
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _getProvincias() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('idprovincias,provincia')->distinct();
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
