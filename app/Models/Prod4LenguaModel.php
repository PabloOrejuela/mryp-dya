<?php

namespace App\Models;

use CodeIgniter\Model;

class Prod4LenguaModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'prod4_process_lengua';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];
    //Activar los campos protegidos

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

    public function _getProd4lengua($id) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*')->where('idProd4', $id);
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result = $row;
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _update($datos) {
        $builder = $this->db->table($this->table);
        if ($datos['conoce_letras'] != 'NULL') {
            $builder->set('conoce_letras', $datos['conoce_letras']);
        }
        if ($datos['escribe_textos'] != 'NULL') {
            $builder->set('escribe_textos', $datos['escribe_textos']);
        }
        if ($datos['compreende_lee'] != 'NULL') {
            $builder->set('compreende_lee', $datos['compreende_lee']);
        }
        if ($datos['uso_formal_escritura'] != 'NULL') {
            $builder->set('uso_formal_escritura', $datos['uso_formal_escritura']);
        }
        if ($datos['expresa_ideas'] != 'NULL') {
            $builder->set('expresa_ideas', $datos['expresa_ideas']);
        }


        $builder->where('idProd4', $datos['idProd4']);
        $builder->update();
    }

    public function _save($datos) {
        
        $builder = $this->db->table($this->table);
        if ($datos['conoce_letras'] != 'NULL') {
            $builder->set('conoce_letras', $datos['conoce_letras']);
        }
        if ($datos['escribe_textos'] != 'NULL') {
            $builder->set('escribe_textos', $datos['escribe_textos']);
        }
        if ($datos['compreende_lee'] != 'NULL') {
            $builder->set('compreende_lee', $datos['compreende_lee']);
        }
        if ($datos['uso_formal_escritura'] != 'NULL') {
            $builder->set('uso_formal_escritura', $datos['uso_formal_escritura']);
        }
        if ($datos['expresa_ideas'] != 'NULL') {
            $builder->set('expresa_ideas', $datos['expresa_ideas']);
        }
        

        $builder->set('idProd4', $datos['idProd4']);
        $builder->insert();
    }
}
