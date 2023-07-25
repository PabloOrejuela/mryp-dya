<?php

namespace App\Models;

use CodeIgniter\Model;

class CentroProd4Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'centro_prod_4';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'centro','tecnico','idciudades'
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
     * Esta función trae los Centros educativos que están bajo un ID del Prod 4
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getAmiesUsuarioProd4($id) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('tecnico, centro, id, idciudades, ciudad');
        $builder->where('centro_prod_4.tecnico', $id);
        $builder->join('ciudades', 'ciudades.idciudades = centro_prod_4.idciudades');
        // $builder->join('provincias', 'provincias.idprovincias = ciudades.idprovincias');
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
