<?php

namespace App\Models;

use CodeIgniter\Model;

class AnioLectivoModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'anio_lectivo';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
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

    //Devuelve el ultimo año registrado como cadena
    public function _getLast() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->orderBy('id', 'asc');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result = $row->anio_lectivo;
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _insert($anio) {
        $builder = $this->db->table($this->table);
        //echo '<pre>'.var_export($ciudad, true).'</pre>';exit;
        $builder->set('anio_lectivo', $anio['anio_lectivo_desde'].' - '.$anio['anio_lectivo_hasta']);
        $builder->insert();
    }
}
