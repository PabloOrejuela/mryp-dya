<?php

namespace App\Models;

use CodeIgniter\Model;

class Nap6Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'nap6_mineduc_est_virt';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'amie',
        'anio_lectivo',
        'subnivel',
        'documento',
        'nombres_est',
        'apellidos_est',
        'nacionalidad',
        'etnia',
        'genero',
        'fecha_nac',
        'edad',
        'nivel',
        'discapacidad',
        'tipo_discapacidad',
        'institucion',
        'documento_rep',
        'representante',
        'parentesto_rep',
        'nacionalidad_rep',
        'direccion_rep',
        'contacto_telf',
        'email',
        'observaciones'
    ];

    // Dates
    protected $useTimestamps = true;
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
     * Esta función trae los registros que tienen el NAP 6 sin filtrar por Técnico
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getRegistrosNap6() {
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
