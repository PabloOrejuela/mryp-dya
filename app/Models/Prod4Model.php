<?php

namespace App\Models;

use CodeIgniter\Model;

class Prod4Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'producto_4';
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

    /**
     *
     * Esta función trae los registros del usuario
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getMisRegistros($id) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('producto_4.id as id, nombres, documento, cohorte');
        $builder->join('centro_prod_4', 'centro_prod_4.id = producto_4.idcentro4');
        $builder->where('centro_prod_4.tecnico', $id);
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

    /**
     *
     * Esta función trae todos los registros
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getAllRegistros() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('producto_4.id as id, cohorte, nombres, documento, estado');
        $builder->join('prod4_process_resultado', 'prod4_process_resultado.idProd4 = producto_4.id');
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
