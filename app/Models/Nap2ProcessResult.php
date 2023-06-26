<?php

namespace App\Models;

use CodeIgniter\Model;

class Nap2ProcessResult extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'nap2_process_result';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false; //PABLO cambiar a true y especificar los campos
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

    public function _getNap2Process($id) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('nap2_est_dya','nap2_est_dya.id = '.$this->table.'.idestudiante');
        $builder->join('centro_educativo','centro_educativo.amie = nap2_est_dya.amie');
        $builder->where('idestudiante', $id);
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
        if ($datos['kit'] != 'NULL') {
            $builder->set('kit', $datos['kit']);
        }

        if ($datos['guias'] != 'NULL') {
            $builder->set('guias', $datos['guias']);
        }
        
        if ($datos['asistencia_oct'] != 'NULL') {
            $builder->set('asistencia_oct', $datos['asistencia_oct']);
        }

        if ($datos['asistencia_nov'] != 'NULL') {
            $builder->set('asistencia_nov', $datos['asistencia_nov']);
        }

        if ($datos['asistencia_dic'] != 'NULL') {
            $builder->set('asistencia_dic', $datos['asistencia_dic']);
        }

        if ($datos['asistencia_ene'] != 'NULL') {
            $builder->set('asistencia_ene', $datos['asistencia_ene']);
        }

        if ($datos['asistencia_feb'] != 'NULL') {
            $builder->set('asistencia_feb', $datos['asistencia_feb']);
        }

        if ($datos['asistencia_mar'] != 'NULL') {
            $builder->set('asistencia_mar', $datos['asistencia_mar']);
        }

        if ($datos['asistencia_abr'] != 'NULL') {
            $builder->set('asistencia_abr', $datos['asistencia_abr']);
        }

        if ($datos['asistencia_may'] != 'NULL') {
            $builder->set('asistencia_may', $datos['asistencia_may']);
        }

        if ($datos['asistencia_jun'] != 'NULL') {
            $builder->set('asistencia_jun', $datos['asistencia_jun']);
        }

        if ($datos['asistencia_total'] != 'NULL') {
            $builder->set('asistencia_total', $datos['asistencia_total']);
        }

        if ($datos['rendimiento_quim_1'] != 'NULL') {
            $builder->set('rendimiento_quim_1', $datos['rendimiento_quim_1']);
        }

        if ($datos['rendimiento_quim_2'] != 'NULL') {
            $builder->set('rendimiento_quim_2', $datos['rendimiento_quim_2']);
        }

        if ($datos['expediente'] != 'NULL') {
            $builder->set('expediente', $datos['expediente']);
        }

        if ($datos['examen_ubicacion'] != 'NULL') {
            $builder->set('examen_ubicacion', $datos['examen_ubicacion']);
        }

        if ($datos['resultado_ubicacion'] != 'NULL') {
            $builder->set('resultado_ubicacion', $datos['resultado_ubicacion']);
        }

        if ($datos['reporte_caso'] != 'NULL') {
            $builder->set('reporte_caso', $datos['reporte_caso']);
        }

        if ($datos['tipo_caso'] != 'NULL') {
            $builder->set('tipo_caso', $datos['tipo_caso']);
        }

        if ($datos['fecha_caso'] != 'NULL') {
            $builder->set('fecha_caso', $datos['fecha_caso']);
        }

        if ($datos['seguimiento'] != 'NULL') {
            $builder->set('seguimiento', $datos['seguimiento']);
        }

        if ($datos['remision_caso'] != 'NULL') {
            $builder->set('remision_caso', $datos['remision_caso']);
        }

        if ($datos['remision_caso_complementario'] != 'NULL') {
            $builder->set('remision_caso_complementario', $datos['remision_caso_complementario']);
        }

        if ($datos['prom_final'] != 'NULL') {
            $builder->set('prom_final', $datos['prom_final']);
        }

        if ($datos['edu_regular'] != 'NULL') {
            $builder->set('edu_regular', $datos['edu_regular']);
        }

        if ($datos['nivel'] != 'NULL') {
            $builder->set('nivel', $datos['nivel']);
        }

        if ($datos['institucion_destino'] != 'NULL') {
            $builder->set('institucion_destino', $datos['institucion_destino']);
        }

        $builder->where('idestudiante', $datos['idestudiante']);
        $builder->update();
    }

    public function _save($datos) {
        $builder = $this->db->table($this->table);
        if ($datos['kit'] != 'NULL') {
            $builder->set('kit', $datos['kit']);
        }

        if ($datos['guias'] != 'NULL') {
            $builder->set('guias', $datos['guias']);
        }
        
        if ($datos['asistencia_oct'] != 'NULL') {
            $builder->set('asistencia_oct', $datos['asistencia_oct']);
        }

        if ($datos['asistencia_nov'] != 'NULL') {
            $builder->set('asistencia_nov', $datos['asistencia_nov']);
        }

        if ($datos['asistencia_dic'] != 'NULL') {
            $builder->set('asistencia_dic', $datos['asistencia_dic']);
        }

        if ($datos['asistencia_ene'] != 'NULL') {
            $builder->set('asistencia_ene', $datos['asistencia_ene']);
        }

        if ($datos['asistencia_feb'] != 'NULL') {
            $builder->set('asistencia_feb', $datos['asistencia_feb']);
        }

        if ($datos['asistencia_mar'] != 'NULL') {
            $builder->set('asistencia_mar', $datos['asistencia_mar']);
        }

        if ($datos['asistencia_abr'] != 'NULL') {
            $builder->set('asistencia_abr', $datos['asistencia_abr']);
        }

        if ($datos['asistencia_may'] != 'NULL') {
            $builder->set('asistencia_may', $datos['asistencia_may']);
        }

        if ($datos['asistencia_jun'] != 'NULL') {
            $builder->set('asistencia_jun', $datos['asistencia_jun']);
        }

        if ($datos['asistencia_total'] != 'NULL') {
            $builder->set('asistencia_total', $datos['asistencia_total']);
        }

        if ($datos['rendimiento_quim_1'] != 'NULL') {
            $builder->set('rendimiento_quim_1', $datos['rendimiento_quim_1']);
        }

        if ($datos['rendimiento_quim_2'] != 'NULL') {
            $builder->set('rendimiento_quim_2', $datos['rendimiento_quim_2']);
        }

        if ($datos['expediente'] != 'NULL') {
            $builder->set('expediente', $datos['expediente']);
        }

        if ($datos['examen_ubicacion'] != 'NULL') {
            $builder->set('examen_ubicacion', $datos['examen_ubicacion']);
        }

        if ($datos['resultado_ubicacion'] != 'NULL') {
            $builder->set('resultado_ubicacion', $datos['resultado_ubicacion']);
        }

        if ($datos['reporte_caso'] != 'NULL') {
            $builder->set('reporte_caso', $datos['reporte_caso']);
        }

        if ($datos['tipo_caso'] != 'NULL') {
            $builder->set('tipo_caso', $datos['tipo_caso']);
        }

        if ($datos['fecha_caso'] != 'NULL') {
            $builder->set('fecha_caso', $datos['fecha_caso']);
        }

        if ($datos['seguimiento'] != 'NULL') {
            $builder->set('seguimiento', $datos['seguimiento']);
        }

        if ($datos['remision_caso'] != 'NULL') {
            $builder->set('remision_caso', $datos['remision_caso']);
        }

        if ($datos['remision_caso_complementario'] != 'NULL') {
            $builder->set('remision_caso_complementario', $datos['remision_caso_complementario']);
        }

        if ($datos['prom_final'] != 'NULL') {
            $builder->set('prom_final', $datos['prom_final']);
        }

        if ($datos['edu_regular'] != 'NULL') {
            $builder->set('edu_regular', $datos['edu_regular']);
        }

        if ($datos['nivel'] != 'NULL') {
            $builder->set('nivel', $datos['nivel']);
        }

        if ($datos['institucion_destino'] != 'NULL') {
            $builder->set('institucion_destino', $datos['institucion_destino']);
        }

        $builder->set('idestudiante', $datos['idestudiante']);
        $builder->insert();
    }
}
