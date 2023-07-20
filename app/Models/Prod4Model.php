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
        $builder->select('producto_4.id as id, apellidos, nombres, documento');
        //$builder->join('usuarios_centros_prod3', 'usuarios_centros_prod3.amie = producto_4.amie');
        //$builder->where('usuarios_centros_prod3.idusuario', $id);
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
