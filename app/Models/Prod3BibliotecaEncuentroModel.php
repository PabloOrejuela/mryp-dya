<?php

namespace App\Models;

use CodeIgniter\Model;

class Prod3BibliotecaEncuentroModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'prod3_biblioteca_encuentro';
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

    public function _getProd3BibliotecaEncuentro($amie) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('amie', $amie);
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
        if ($datos['primera_visita'] != 'NULL') {
            $builder->set('primera_visita', $datos['primera_visita']);
        }

        if ($datos['fecha_primera_visita'] != 'NULL') {
            $builder->set('fecha_primera_visita', $datos['fecha_primera_visita']);
        }

        if ($datos['segunda_visita'] != 'NULL') {
            $builder->set('segunda_visita', $datos['segunda_visita']);
        }

        if ($datos['fecha_segunda_visita'] != 'NULL') {
            $builder->set('fecha_segunda_visita', $datos['fecha_segunda_visita']);
        }

        if ($datos['tercera_visita'] != 'NULL') {
            $builder->set('tercera_visita', $datos['tercera_visita']);
        }

        if ($datos['fecha_tercera_visita'] != 'NULL') {
            $builder->set('fecha_tercera_visita', $datos['fecha_tercera_visita']);
        }

        if ($datos['encuentro_intercultural'] != 'NULL') {
            $builder->set('encuentro_intercultural', $datos['encuentro_intercultural']);
        }

        if ($datos['fecha_encuentro'] != 'NULL') {
            $builder->set('fecha_encuentro', $datos['fecha_encuentro']);
        }

        if ($datos['expo_trabajos'] != 'NULL') {
            $builder->set('expo_trabajos', $datos['expo_trabajos']);
        }

        if ($datos['expo_trabajos_evidencia'] != 'NULL' && $datos['expo_trabajos_evidencia'] != '') {
            $builder->set('expo_trabajos_evidencia', $datos['expo_trabajos_evidencia']);
        }

        if ($datos['exp_oral'] != 'NULL') {
            $builder->set('exp_oral', $datos['exp_oral']);
        }
        
        if ($datos['exp_oral_evidencia'] != 'NULL' && $datos['exp_oral_evidencia'] != '') {
            $builder->set('exp_oral_evidencia', $datos['exp_oral_evidencia']);
        }

        if ($datos['exp_escr_grafica'] != 'NULL') {
            $builder->set('exp_escr_grafica', $datos['exp_escr_grafica']);
        }

        if ($datos['exp_escr_grafica_evidencia'] != 'NULL' && $datos['exp_escr_grafica_evidencia'] != '') {
            $builder->set('exp_escr_grafica_evidencia', $datos['exp_escr_grafica_evidencia']);
        }

        if ($datos['part_docentes'] != 'NULL') {
            $builder->set('part_docentes', $datos['part_docentes']);
        }

        if ($datos['part_docentes_evidencia'] != 'NULL' && $datos['part_docentes_evidencia'] != '') {
            $builder->set('part_docentes_evidencia', $datos['part_docentes_evidencia']);
        }

        if ($datos['part_padres'] != 'NULL') {
            $builder->set('part_padres', $datos['part_padres']);
        }

        if ($datos['part_padres_evidencia'] != 'NULL' && $datos['part_padres_evidencia'] != '') {
            $builder->set('part_padres_evidencia', $datos['part_padres_evidencia']);
        }

        $builder->where('amie', $datos['amie']);
        $builder->update();
    }

    public function _save($datos) {
        $builder = $this->db->table($this->table);
        if ($datos['primera_visita'] != 'NULL') {
            $builder->set('primera_visita', $datos['primera_visita']);
        }

        if ($datos['fecha_primera_visita'] != 'NULL') {
            $builder->set('fecha_primera_visita', $datos['fecha_primera_visita']);
        }

        if ($datos['segunda_visita'] != 'NULL') {
            $builder->set('segunda_visita', $datos['segunda_visita']);
        }

        if ($datos['fecha_segunda_visita'] != 'NULL') {
            $builder->set('fecha_segunda_visita', $datos['fecha_segunda_visita']);
        }

        if ($datos['tercera_visita'] != 'NULL') {
            $builder->set('tercera_visita', $datos['tercera_visita']);
        }

        if ($datos['fecha_tercera_visita'] != 'NULL') {
            $builder->set('fecha_tercera_visita', $datos['fecha_tercera_visita']);
        }

        if ($datos['encuentro_intercultural'] != 'NULL') {
            $builder->set('encuentro_intercultural', $datos['encuentro_intercultural']);
        }

        if ($datos['fecha_encuentro'] != 'NULL') {
            $builder->set('fecha_encuentro', $datos['fecha_encuentro']);
        }

        if ($datos['expo_trabajos'] != 'NULL') {
            $builder->set('expo_trabajos', $datos['expo_trabajos']);
        }

        if ($datos['expo_trabajos_evidencia'] != 'NULL' && $datos['expo_trabajos_evidencia'] != '') {
            $builder->set('expo_trabajos_evidencia', $datos['expo_trabajos_evidencia']);
        }

        if ($datos['exp_oral'] != 'NULL') {
            $builder->set('exp_oral', $datos['exp_oral']);
        }
        
        if ($datos['exp_oral_evidencia'] != 'NULL' && $datos['exp_oral_evidencia'] != '') {
            $builder->set('exp_oral_evidencia', $datos['exp_oral_evidencia']);
        }

        if ($datos['exp_escr_grafica'] != 'NULL') {
            $builder->set('exp_escr_grafica', $datos['exp_escr_grafica']);
        }

        if ($datos['exp_escr_grafica_evidencia'] != 'NULL' && $datos['exp_escr_grafica_evidencia'] != '') {
            $builder->set('exp_escr_grafica_evidencia', $datos['exp_escr_grafica_evidencia']);
        }

        if ($datos['part_docentes'] != 'NULL') {
            $builder->set('part_docentes', $datos['part_docentes']);
        }

        if ($datos['part_docentes_evidencia'] != 'NULL' && $datos['part_docentes_evidencia'] != '') {
            $builder->set('part_docentes_evidencia', $datos['part_docentes_evidencia']);
        }

        if ($datos['part_padres'] != 'NULL') {
            $builder->set('part_padres', $datos['part_padres']);
        }

        if ($datos['part_padres_evidencia'] != 'NULL' && $datos['part_padres_evidencia'] != '') {
            $builder->set('part_padres_evidencia', $datos['part_padres_evidencia']);
        }
        
        $builder->set('amie', $datos['amie']);
        $builder->insert();
    }
}
