<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosCentrosProd3Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'usuarios_centros_prod3';
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
     * Esta función trae los Centros educativos que están bajo un ID del Prod 3
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getAmiesUsuarioProd3($id) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('idusuario, usuarios_centros_prod3.amie as amie, centro_educativo.nombre as nombre, idparroquia');
        $builder->where('usuarios_centros_prod3.idusuario', $id);
        $builder->join('centro_educativo', 'centro_educativo.amie = usuarios_centros_prod3.amie');
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
