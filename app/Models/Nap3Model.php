<?php

namespace App\Models;

use CodeIgniter\Model;

class Nap3Model extends Model {
    
    protected $DBGroup          = 'default';
    protected $table            = 'nap3_doc_dya';
    protected $primaryKey       = 'idnap3';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'anio_lectivo' ,
        'num_est' ,
        'documento',
        'apellidos',
        'nombres',
        'edad',
        'email',
        'celular',
        'autoidentificacion',
        'titulo_pro',
        'genero',
        'discapacidad',
        'tipo',
        'amie',
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
     * Esta función trae los registros que tienen a
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    //PABLO con esta función filtrar los tutores
    public function _getMisRegistros($nombre) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('tutor_apoyo', $nombre);
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
