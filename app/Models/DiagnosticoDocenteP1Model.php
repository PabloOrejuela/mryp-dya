<?php

namespace App\Models;

use CodeIgniter\Model;

class DiagnosticoDocenteP1Model extends Model {
    
    protected $DBGroup          = 'default';
    protected $table            = 'diagnostico_docente';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'escritura',
        'lectura',
        'matematica',
        'idtipo',
        'idprod'
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

    public function _getDiagDocente($id) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*')->where('idprod', $id);
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
        if ($datos['escritura'] != 'NULL') {
            $builder->set('escritura', $datos['escritura']);
        }

        if ($datos['lectura'] != 'NULL') {
            $builder->set('lectura', $datos['lectura']);
        }
        
        if ($datos['matematica'] != 'NULL') {
            $builder->set('matematica', $datos['matematica']);
        }
        $builder->set('idtipo', $datos['idtipo']);
        $builder->where('idprod', $datos['idprod']);
        $builder->update();
    }

    public function _save($datos) {
        $builder = $this->db->table($this->table);
        if ($datos['escritura'] != 'NULL') {
            $builder->set('escritura', $datos['escritura']);
        }

        if ($datos['lectura'] != 'NULL') {
            $builder->set('lectura', $datos['lectura']);
        }
        
        if ($datos['matematica'] != 'NULL') {
            $builder->set('matematica', $datos['matematica']);
        }
        $builder->set('idtipo', $datos['idtipo']);
        $builder->set('idprod', $datos['idprod']);
        $builder->insert();
    }

    public function _getDiagDocenteLectura($registros) {
        $porcentaje = 0;
        $result = 0;
        foreach ($registros as $key => $value) {
            
            $builder = $this->db->table($this->table);
            $builder->select('id');
            $builder->where('idprod', $value->id);
            $builder->where('lectura', 'SI');
            $query = $builder->get();
            if ($query->getResult() != null) {
                $result++;
            }
            //echo $this->db->getLastQuery();
        }
        
        $porcentaje = ($result * 100) / count($registros);
        return number_format($porcentaje, 2);
    }

    public function _getDiagDocenteEscritura($registros) {
        $porcentaje = 0;
        $result = 0;
        foreach ($registros as $key => $value) {
            
            $builder = $this->db->table($this->table);
            $builder->select('id');
            $builder->where('idprod', $value->id);
            $builder->where('escritura', 'SI');
            $query = $builder->get();
            if ($query->getResult() != null) {
                $result++;
            }
            //echo $this->db->getLastQuery();
        }
        $porcentaje = ($result * 100) / count($registros);
        return number_format($porcentaje, 2);
    }

    public function _getDiagDocenteMate($registros) {
        $porcentaje = 0;
        $result = 0;
        foreach ($registros as $key => $value) {
            
            $builder = $this->db->table($this->table);
            $builder->select('id');
            $builder->where('idprod', $value->id);
            $builder->where('matematica', 'SI');
            $query = $builder->get();
            if ($query->getResult() != null) {
                $result++;
            }
            //echo $this->db->getLastQuery();
        }

        $porcentaje = ($result * 100) / count($registros);
        return number_format($porcentaje, 2);
    }
}
