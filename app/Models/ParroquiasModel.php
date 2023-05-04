<?php

namespace App\Models;

use CodeIgniter\Model;

class ParroquiasModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'parroquias';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'cod_parroquia', 'parroquia', 'idciudades '
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

    public function _getIdParroquia($parroquia) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*')->where('parroquia', strtoupper($parroquia));
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result = $row;
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _save($parroquia) {
        $builder = $this->db->table($this->table);
        //echo '<pre>'.var_export($ciudad, true).'</pre>';exit;
        $builder->set('parroquia', $parroquia['parroquia']);
        $builder->set('idciudades', $parroquia['idciudades']);
        $builder->insert();
    }
}
