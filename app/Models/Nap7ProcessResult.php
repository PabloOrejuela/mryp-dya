<?php

namespace App\Models;

use CodeIgniter\Model;

class Nap7ProcessResult extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'nap7_procesos_result';
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

    public function _getNap7Process($id) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*')->where('idnap7', $id);
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
        if ($datos['lineamiento_nap'] != 'NULL') {
            $builder->set('lineamiento_nap', $datos['lineamiento_nap']);
        }

        if ($datos['avance_curricular'] != 'NULL') {
            $builder->set('avance_curricular', $datos['avance_curricular']);
        }

        if ($datos['curriculo_competencias'] != 'NULL') {
            $builder->set('curriculo_competencias', $datos['curriculo_competencias']);
        }

        if ($datos['plan_microcurricular_erca'] != 'NULL') {
            $builder->set('plan_microcurricular_erca', $datos['plan_microcurricular_erca']);
        }

        if ($datos['conciencia_linguistica'] != 'NULL') {
            $builder->set('conciencia_linguistica', $datos['conciencia_linguistica']);
        }

        if ($datos['destrezas_desempeño'] != 'NULL') {
            $builder->set('destrezas_desempeño', $datos['destrezas_desempeño']);
        }

        if ($datos['produccion_textos'] != 'NULL') {
            $builder->set('produccion_textos', $datos['produccion_textos']);
        }

        if ($datos['eval_metacognitiva'] != 'NULL') {
            $builder->set('eval_metacognitiva', $datos['eval_metacognitiva']);
        }

        if ($datos['estrategias_didacticas'] != 'NULL') {
            $builder->set('estrategias_didacticas', $datos['estrategias_didacticas']);
        }

        if ($datos['plan_microcurricular'] != 'NULL') {
            $builder->set('plan_microcurricular', $datos['plan_microcurricular']);
        }

        if ($datos['eval_promo_est'] != 'NULL') {
            $builder->set('eval_promo_est', $datos['eval_promo_est']);
        }

        if ($datos['innova_aula'] != 'NULL') {
            $builder->set('innova_aula', $datos['innova_aula']);
        }

        if ($datos['const_infor_aprendizaje'] != 'NULL') {
            $builder->set('const_infor_aprendizaje', $datos['const_infor_aprendizaje']);
        }

        if ($datos['tecnico_virtual'] != 'NULL') {
            $builder->set('tecnico_virtual', $datos['tecnico_virtual']);
        }

        if ($datos['induccion'] != 'NULL') {
            $builder->set('induccion', $datos['induccion']);
        }

        if ($datos['curriculo_mate'] != 'NULL') {
            $builder->set('curriculo_mate', $datos['curriculo_mate']);
        }

        if ($datos['congre_curriculo_mate'] != 'NULL') {
            $builder->set('congre_curriculo_mate', $datos['congre_curriculo_mate']);
        }

        if ($datos['crea_edu_mate_vida'] != 'NULL') {
            $builder->set('crea_edu_mate_vida', $datos['crea_edu_mate_vida']);
        }

        if ($datos['habil_mate_trad_actual'] != 'NULL') {
            $builder->set('habil_mate_trad_actual', $datos['habil_mate_trad_actual']);
        }

        if ($datos['habil_mate_nivel_sup'] != 'NULL') {
            $builder->set('habil_mate_nivel_sup', $datos['habil_mate_nivel_sup']);
        }

        if ($datos['aprendizaje_activo'] != 'NULL') {
            $builder->set('aprendizaje_activo', $datos['aprendizaje_activo']);
        }

        if ($datos['metodologia_activa'] != 'NULL') {
            $builder->set('metodologia_activa', $datos['metodologia_activa']);
        }

        if ($datos['didactica_modela'] != 'NULL') {
            $builder->set('didactica_modela', $datos['didactica_modela']);
        }

        if ($datos['trabajo_final'] != 'NULL') {
            $builder->set('trabajo_final', $datos['trabajo_final']);
        }

        if ($datos['resultado_curso'] != 'NULL') {
            $builder->set('resultado_curso', $datos['resultado_curso']);
        }

        if ($datos['observaciones'] != 'NULL') {
            $builder->set('observaciones', $datos['observaciones']);
        }

        $builder->where('idnap7', $datos['idnap7']);
        $builder->update();
    }

    public function _save($datos) {
        $builder = $this->db->table($this->table);
        if ($datos['lineamiento_nap'] != 'NULL') {
            $builder->set('lineamiento_nap', $datos['lineamiento_nap']);
        }

        if ($datos['avance_curricular'] != 'NULL') {
            $builder->set('avance_curricular', $datos['avance_curricular']);
        }

        if ($datos['curriculo_competencias'] != 'NULL') {
            $builder->set('curriculo_competencias', $datos['curriculo_competencias']);
        }

        if ($datos['plan_microcurricular_erca'] != 'NULL') {
            $builder->set('plan_microcurricular_erca', $datos['plan_microcurricular_erca']);
        }

        if ($datos['conciencia_linguistica'] != 'NULL') {
            $builder->set('conciencia_linguistica', $datos['conciencia_linguistica']);
        }

        if ($datos['destrezas_desempeño'] != 'NULL') {
            $builder->set('destrezas_desempeño', $datos['destrezas_desempeño']);
        }

        if ($datos['produccion_textos'] != 'NULL') {
            $builder->set('produccion_textos', $datos['produccion_textos']);
        }

        if ($datos['eval_metacognitiva'] != 'NULL') {
            $builder->set('eval_metacognitiva', $datos['eval_metacognitiva']);
        }

        if ($datos['estrategias_didacticas'] != 'NULL') {
            $builder->set('estrategias_didacticas', $datos['estrategias_didacticas']);
        }

        if ($datos['plan_microcurricular'] != 'NULL') {
            $builder->set('plan_microcurricular', $datos['plan_microcurricular']);
        }

        if ($datos['eval_promo_est'] != 'NULL') {
            $builder->set('eval_promo_est', $datos['eval_promo_est']);
        }

        if ($datos['innova_aula'] != 'NULL') {
            $builder->set('innova_aula', $datos['innova_aula']);
        }

        if ($datos['const_infor_aprendizaje'] != 'NULL') {
            $builder->set('const_infor_aprendizaje', $datos['const_infor_aprendizaje']);
        }

        if ($datos['tecnico_virtual'] != 'NULL') {
            $builder->set('tecnico_virtual', $datos['tecnico_virtual']);
        }

        if ($datos['induccion'] != 'NULL') {
            $builder->set('induccion', $datos['induccion']);
        }

        if ($datos['curriculo_mate'] != 'NULL') {
            $builder->set('curriculo_mate', $datos['curriculo_mate']);
        }

        if ($datos['congre_curriculo_mate'] != 'NULL') {
            $builder->set('congre_curriculo_mate', $datos['congre_curriculo_mate']);
        }

        if ($datos['crea_edu_mate_vida'] != 'NULL') {
            $builder->set('crea_edu_mate_vida', $datos['crea_edu_mate_vida']);
        }

        if ($datos['habil_mate_trad_actual'] != 'NULL') {
            $builder->set('habil_mate_trad_actual', $datos['habil_mate_trad_actual']);
        }

        if ($datos['habil_mate_nivel_sup'] != 'NULL') {
            $builder->set('habil_mate_nivel_sup', $datos['habil_mate_nivel_sup']);
        }

        if ($datos['aprendizaje_activo'] != 'NULL') {
            $builder->set('aprendizaje_activo', $datos['aprendizaje_activo']);
        }

        if ($datos['metodologia_activa'] != 'NULL') {
            $builder->set('metodologia_activa', $datos['metodologia_activa']);
        }

        if ($datos['didactica_modela'] != 'NULL') {
            $builder->set('didactica_modela', $datos['didactica_modela']);
        }

        if ($datos['trabajo_final'] != 'NULL') {
            $builder->set('trabajo_final', $datos['trabajo_final']);
        }

        if ($datos['resultado_curso'] != 'NULL') {
            $builder->set('resultado_curso', $datos['resultado_curso']);
        }

        if ($datos['observaciones'] != 'NULL') {
            $builder->set('observaciones', $datos['observaciones']);
        }
        
        $builder->set('idnap7', $datos['idnap7']);
        $builder->insert();
    }
}
