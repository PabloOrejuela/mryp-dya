<?php

namespace App\Models;

use CodeIgniter\Model;

class EvalMateFinalP1Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'prod1_eval_mate_final';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'orientacion_espacial_1',
        'orientacion_espacial_2',
        'orientacion_espacial_3',
        'orientacion_espacial_4',
        'clasificacion_5',
        'clasificacion_6',
        'seriacion_7',
        'seriacion_8',
        'seriacion_9',
        'esquema_corporal_10',
        'esquema_corporal_11',
        'suma_dos_cifras',
        'suma_cuatro_cifras',
        'suma_cinco_mas',
        'resta_tres_cifras',
        'resta_cuatro_cifras',
        'multiplicacion_una_cifra',
        'multiplicacion_dos_cifras',
        'division_una_cifra',
        'division_dos_cifras',
        'idprod',
        'created_at',
        'updated_at',
        'idtipo'
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

    public function _getEvalMateFinal($idprod) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*')->where('idprod', strtoupper($idprod));
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
        if ($datos['orientacion_espacial_1'] != 'NULL') {
            $builder->set('orientacion_espacial_1', $datos['orientacion_espacial_1']);
        }
        if ($datos['orientacion_espacial_2'] != 'NULL') {
            $builder->set('orientacion_espacial_2', $datos['orientacion_espacial_2']);
        }
        if ($datos['orientacion_espacial_3'] != 'NULL') {
            $builder->set('orientacion_espacial_3', $datos['orientacion_espacial_3']);
        }
        if ($datos['orientacion_espacial_4'] != 'NULL') {
            $builder->set('orientacion_espacial_4', $datos['orientacion_espacial_4']);
        }
        if ($datos['clasificacion_5'] != 'NULL') {
            $builder->set('clasificacion_5', $datos['clasificacion_5']);
        }
        if ($datos['clasificacion_6'] != 'NULL') {
            $builder->set('clasificacion_6', $datos['clasificacion_6']);
        }
        if ($datos['seriacion_7'] != 'NULL') {
            $builder->set('seriacion_7', $datos['seriacion_7']);
        }
        if ($datos['seriacion_8'] != 'NULL') {
            $builder->set('seriacion_8', $datos['seriacion_8']);
        }
        if ($datos['seriacion_9'] != 'NULL') {
            $builder->set('seriacion_9', $datos['seriacion_9']);
        }
        if ($datos['esquema_corporal_10'] != 'NULL') {
            $builder->set('esquema_corporal_10', $datos['esquema_corporal_10']);
        }
        if ($datos['esquema_corporal_11'] != 'NULL') {
            $builder->set('esquema_corporal_11', $datos['esquema_corporal_11']);
        }
        if ($datos['suma_dos_cifras'] != 'NULL') {
            $builder->set('suma_dos_cifras', $datos['suma_dos_cifras']);
        }
        if ($datos['suma_cuatro_cifras'] != 'NULL') {
            $builder->set('suma_cuatro_cifras', $datos['suma_cuatro_cifras']);
        }
        if ($datos['suma_cinco_mas'] != 'NULL') {
            $builder->set('suma_cinco_mas', $datos['suma_cinco_mas']);
        }
        if ($datos['resta_tres_cifras'] != 'NULL') {
            $builder->set('resta_tres_cifras', $datos['resta_tres_cifras']);
        }
        if ($datos['resta_cuatro_cifras'] != 'NULL') {
            $builder->set('resta_cuatro_cifras', $datos['resta_cuatro_cifras']);
        }
        if ($datos['multiplicacion_una_cifra'] != 'NULL') {
            $builder->set('multiplicacion_una_cifra', $datos['multiplicacion_una_cifra']);
        }
        if ($datos['multiplicacion_dos_cifras'] != 'NULL') {
            $builder->set('multiplicacion_dos_cifras', $datos['multiplicacion_dos_cifras']);
        }
        if ($datos['division_una_cifra'] != 'NULL') {
            $builder->set('division_una_cifra', $datos['division_una_cifra']);
        }
        if ($datos['division_dos_cifras'] != 'NULL') {
            $builder->set('division_dos_cifras', $datos['division_dos_cifras']);
        }
        $builder->set('idtipo', $datos['idtipo']);
        $builder->where('idprod', $datos['idprod']);
        $builder->update();
    }

    public function _save($datos) {
        
        $builder = $this->db->table($this->table);
        if ($datos['orientacion_espacial_1'] != 'NULL') {
            $builder->set('orientacion_espacial_1', $datos['orientacion_espacial_1']);
        }
        if ($datos['orientacion_espacial_2'] != 'NULL') {
            $builder->set('orientacion_espacial_2', $datos['orientacion_espacial_2']);
        }
        if ($datos['orientacion_espacial_3'] != 'NULL') {
            $builder->set('orientacion_espacial_3', $datos['orientacion_espacial_3']);
        }
        if ($datos['orientacion_espacial_4'] != 'NULL') {
            $builder->set('orientacion_espacial_4', $datos['orientacion_espacial_4']);
        }
        if ($datos['clasificacion_5'] != 'NULL') {
            $builder->set('clasificacion_5', $datos['clasificacion_5']);
        }
        if ($datos['clasificacion_6'] != 'NULL') {
            $builder->set('clasificacion_6', $datos['clasificacion_6']);
        }
        if ($datos['seriacion_7'] != 'NULL') {
            $builder->set('seriacion_7', $datos['seriacion_7']);
        }
        if ($datos['seriacion_8'] != 'NULL') {
            $builder->set('seriacion_8', $datos['seriacion_8']);
        }
        if ($datos['seriacion_9'] != 'NULL') {
            $builder->set('seriacion_9', $datos['seriacion_9']);
        }
        if ($datos['esquema_corporal_10'] != 'NULL') {
            $builder->set('esquema_corporal_10', $datos['esquema_corporal_10']);
        }
        if ($datos['esquema_corporal_11'] != 'NULL') {
            $builder->set('esquema_corporal_11', $datos['esquema_corporal_11']);
        }
        if ($datos['suma_dos_cifras'] != 'NULL') {
            $builder->set('suma_dos_cifras', $datos['suma_dos_cifras']);
        }
        if ($datos['suma_cuatro_cifras'] != 'NULL') {
            $builder->set('suma_cuatro_cifras', $datos['suma_cuatro_cifras']);
        }
        if ($datos['suma_cinco_mas'] != 'NULL') {
            $builder->set('suma_cinco_mas', $datos['suma_cinco_mas']);
        }
        if ($datos['resta_tres_cifras'] != 'NULL') {
            $builder->set('resta_tres_cifras', $datos['resta_tres_cifras']);
        }
        if ($datos['resta_cuatro_cifras'] != 'NULL') {
            $builder->set('resta_cuatro_cifras', $datos['resta_cuatro_cifras']);
        }
        if ($datos['multiplicacion_una_cifra'] != 'NULL') {
            $builder->set('multiplicacion_una_cifra', $datos['multiplicacion_una_cifra']);
        }
        if ($datos['multiplicacion_dos_cifras'] != 'NULL') {
            $builder->set('multiplicacion_dos_cifras', $datos['multiplicacion_dos_cifras']);
        }
        if ($datos['division_una_cifra'] != 'NULL') {
            $builder->set('division_una_cifra', $datos['division_una_cifra']);
        }
        if ($datos['division_dos_cifras'] != 'NULL') {
            $builder->set('division_dos_cifras', $datos['division_dos_cifras']);
        }
        $builder->set('idtipo', $datos['idtipo']);
        $builder->set('idprod', $datos['idprod']);
        
        $builder->insert();
    }
}
