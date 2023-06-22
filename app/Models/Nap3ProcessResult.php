<?php

namespace App\Models;

use CodeIgniter\Model;

class Nap3ProcessResult extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'nap3_procesos_result';
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

    public function _getNap3Process($id) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*')->where('idnap3', $id);
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
        
        if ($datos['lineamiento_nap'] != 'NULL') {
            $builder->set('lineamiento_nap', $datos['lineamiento_nap']);
        }

        if ($datos['protocolo_violencia'] != 'NULL') {
            $builder->set('protocolo_violencia', $datos['protocolo_violencia']);
        }

        if ($datos['avance_curricular'] != 'NULL') {
            $builder->set('avance_curricular', $datos['avance_curricular']);
        }

        if ($datos['curriculo_competencias'] != 'NULL') {
            $builder->set('curriculo_competencias', $datos['curriculo_competencias']);
        }

        if ($datos['plan_microcurricular'] != 'NULL') {
            $builder->set('plan_microcurricular', $datos['plan_microcurricular']);
        }

        if ($datos['conciencia_linguistica'] != 'NULL') {
            $builder->set('conciencia_linguistica', $datos['conciencia_linguistica']);
        }

        if ($datos['destrezas_desempeño'] != 'NULL') {
            $builder->set('destrezas_desempeño', $datos['destrezas_desempeño']);
        }

        if ($datos['planificacion_matematica'] != 'NULL') {
            $builder->set('planificacion_matematica', $datos['planificacion_matematica']);
        }

        if ($datos['planificacion_lengua'] != 'NULL') {
            $builder->set('planificacion_lengua', $datos['planificacion_lengua']);
        }

        if ($datos['planificacion_naturales'] != 'NULL') {
            $builder->set('planificacion_naturales', $datos['planificacion_naturales']);
        }

        if ($datos['eval_promo_est'] != 'NULL') {
            $builder->set('eval_promo_est', $datos['eval_promo_est']);
        }

        if ($datos['informe_aprendizaje'] != 'NULL') {
            $builder->set('informe_aprendizaje', $datos['informe_aprendizaje']);
        }

        if ($datos['eval_metacognitiva'] != 'NULL') {
            $builder->set('eval_metacognitiva', $datos['eval_metacognitiva']);
        }

        if ($datos['disciplina_positiva'] != 'NULL') {
            $builder->set('disciplina_positiva', $datos['disciplina_positiva']);
        }

        if ($datos['tec_inst_evaluacion'] != 'NULL') {
            $builder->set('tec_inst_evaluacion', $datos['tec_inst_evaluacion']);
        }

        if ($datos['practica_inst_evaluacion'] != 'NULL') {
            $builder->set('practica_inst_evaluacion', $datos['practica_inst_evaluacion']);
        }

        if ($datos['valor_arte'] != 'NULL') {
            $builder->set('valor_arte', $datos['valor_arte']);
        }

        if ($datos['habil_multiples'] != 'NULL') {
            $builder->set('habil_multiples', $datos['habil_multiples']);
        }

        if ($datos['func_ejecutiva'] != 'NULL') {
            $builder->set('func_ejecutiva', $datos['func_ejecutiva']);
        }

        if ($datos['elabora_recursos'] != 'NULL') {
            $builder->set('elabora_recursos', $datos['elabora_recursos']);
        }

        if ($datos['revista_aula'] != 'NULL') {
            $builder->set('revista_aula', $datos['revista_aula']);
        }

        if ($datos['innova_educativa'] != 'NULL') {
            $builder->set('innova_educativa', $datos['innova_educativa']);
        }

        if ($datos['retro_rubrica'] != 'NULL') {
            $builder->set('retro_rubrica', $datos['retro_rubrica']);
        }

        if ($datos['revisa_inst_rubrica'] != 'NULL') {
            $builder->set('revisa_inst_rubrica', $datos['revisa_inst_rubrica']);
        }

        if ($datos['revisa_inst_lengua_mate'] != 'NULL') {
            $builder->set('revisa_inst_lengua_mate', $datos['revisa_inst_lengua_mate']);
        }

        if ($datos['extrategias_didacticas'] != 'NULL') {
            $builder->set('extrategias_didacticas', $datos['extrategias_didacticas']);
        }

        if ($datos['educomunicacion'] != 'NULL') {
            $builder->set('educomunicacion', $datos['educomunicacion']);
        }

        if ($datos['proyecto_vida'] != 'NULL') {
            $builder->set('proyecto_vida', $datos['proyecto_vida']);
        }

        if ($datos['neuro_educacion'] != 'NULL') {
            $builder->set('neuro_educacion', $datos['neuro_educacion']);
        }

        if ($datos['tecnico_virtual'] != 'NULL') {
            $builder->set('tecnico_virtual', $datos['tecnico_virtual']);
        }

        if ($datos['reuniones_segui_tec'] != 'NULL') {
            $builder->set('reuniones_segui_tec', $datos['reuniones_segui_tec']);
        }

        if ($datos['visita_aulica'] != 'NULL') {
            $builder->set('visita_aulica', $datos['visita_aulica']);
        }

        if ($datos['visita_domiciliaria'] != 'NULL') {
            $builder->set('visita_domiciliaria', $datos['visita_domiciliaria']);
        }

        if ($datos['casos_remitidos'] != 'NULL') {
            $builder->set('casos_remitidos', $datos['casos_remitidos']);
        }

        if ($datos['seguimiento_caso'] != 'NULL') {
            $builder->set('seguimiento_caso', $datos['seguimiento_caso']);
        }

        if ($datos['rep_legales'] != 'NULL') {
            $builder->set('rep_legales', $datos['rep_legales']);
        }

        if ($datos['refuerzo_academico'] != 'NULL') {
            $builder->set('refuerzo_academico', $datos['refuerzo_academico']);
        }

        if ($datos['tecnico_local'] != 'NULL') {
            $builder->set('tecnico_local', $datos['tecnico_local']);
        }

        $builder->where('idnap3', $datos['idnap3']);
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
        
        if ($datos['lineamiento_nap'] != 'NULL') {
            $builder->set('lineamiento_nap', $datos['lineamiento_nap']);
        }

        if ($datos['protocolo_violencia'] != 'NULL') {
            $builder->set('protocolo_violencia', $datos['protocolo_violencia']);
        }

        if ($datos['avance_curricular'] != 'NULL') {
            $builder->set('avance_curricular', $datos['avance_curricular']);
        }

        if ($datos['curriculo_competencias'] != 'NULL') {
            $builder->set('curriculo_competencias', $datos['curriculo_competencias']);
        }

        if ($datos['plan_microcurricular'] != 'NULL') {
            $builder->set('plan_microcurricular', $datos['plan_microcurricular']);
        }

        if ($datos['conciencia_linguistica'] != 'NULL') {
            $builder->set('conciencia_linguistica', $datos['conciencia_linguistica']);
        }

        if ($datos['destrezas_desempeño'] != 'NULL') {
            $builder->set('destrezas_desempeño', $datos['destrezas_desempeño']);
        }

        if ($datos['planificacion_matematica'] != 'NULL') {
            $builder->set('planificacion_matematica', $datos['planificacion_matematica']);
        }

        if ($datos['planificacion_lengua'] != 'NULL') {
            $builder->set('planificacion_lengua', $datos['planificacion_lengua']);
        }

        if ($datos['planificacion_naturales'] != 'NULL') {
            $builder->set('planificacion_naturales', $datos['planificacion_naturales']);
        }

        if ($datos['eval_promo_est'] != 'NULL') {
            $builder->set('eval_promo_est', $datos['eval_promo_est']);
        }

        if ($datos['informe_aprendizaje'] != 'NULL') {
            $builder->set('informe_aprendizaje', $datos['informe_aprendizaje']);
        }

        if ($datos['eval_metacognitiva'] != 'NULL') {
            $builder->set('eval_metacognitiva', $datos['eval_metacognitiva']);
        }

        if ($datos['disciplina_positiva'] != 'NULL') {
            $builder->set('disciplina_positiva', $datos['disciplina_positiva']);
        }

        if ($datos['tec_inst_evaluacion'] != 'NULL') {
            $builder->set('tec_inst_evaluacion', $datos['tec_inst_evaluacion']);
        }

        if ($datos['practica_inst_evaluacion'] != 'NULL') {
            $builder->set('practica_inst_evaluacion', $datos['practica_inst_evaluacion']);
        }

        if ($datos['valor_arte'] != 'NULL') {
            $builder->set('valor_arte', $datos['valor_arte']);
        }

        if ($datos['habil_multiples'] != 'NULL') {
            $builder->set('habil_multiples', $datos['habil_multiples']);
        }

        if ($datos['func_ejecutiva'] != 'NULL') {
            $builder->set('func_ejecutiva', $datos['func_ejecutiva']);
        }

        if ($datos['elabora_recursos'] != 'NULL') {
            $builder->set('elabora_recursos', $datos['elabora_recursos']);
        }

        if ($datos['revista_aula'] != 'NULL') {
            $builder->set('revista_aula', $datos['revista_aula']);
        }

        if ($datos['innova_educativa'] != 'NULL') {
            $builder->set('innova_educativa', $datos['innova_educativa']);
        }

        if ($datos['retro_rubrica'] != 'NULL') {
            $builder->set('retro_rubrica', $datos['retro_rubrica']);
        }

        if ($datos['revisa_inst_rubrica'] != 'NULL') {
            $builder->set('revisa_inst_rubrica', $datos['revisa_inst_rubrica']);
        }

        if ($datos['revisa_inst_lengua_mate'] != 'NULL') {
            $builder->set('revisa_inst_lengua_mate', $datos['revisa_inst_lengua_mate']);
        }

        if ($datos['extrategias_didacticas'] != 'NULL') {
            $builder->set('extrategias_didacticas', $datos['extrategias_didacticas']);
        }

        if ($datos['educomunicacion'] != 'NULL') {
            $builder->set('educomunicacion', $datos['educomunicacion']);
        }

        if ($datos['proyecto_vida'] != 'NULL') {
            $builder->set('proyecto_vida', $datos['proyecto_vida']);
        }

        if ($datos['neuro_educacion'] != 'NULL') {
            $builder->set('neuro_educacion', $datos['neuro_educacion']);
        }

        if ($datos['tecnico_virtual'] != 'NULL') {
            $builder->set('tecnico_virtual', $datos['tecnico_virtual']);
        }

        if ($datos['reuniones_segui_tec'] != 'NULL') {
            $builder->set('reuniones_segui_tec', $datos['reuniones_segui_tec']);
        }

        if ($datos['visita_aulica'] != 'NULL') {
            $builder->set('visita_aulica', $datos['visita_aulica']);
        }

        if ($datos['visita_domiciliaria'] != 'NULL') {
            $builder->set('visita_domiciliaria', $datos['visita_domiciliaria']);
        }

        if ($datos['casos_remitidos'] != 'NULL') {
            $builder->set('casos_remitidos', $datos['casos_remitidos']);
        }

        if ($datos['seguimiento_caso'] != 'NULL') {
            $builder->set('seguimiento_caso', $datos['seguimiento_caso']);
        }

        if ($datos['rep_legales'] != 'NULL') {
            $builder->set('rep_legales', $datos['rep_legales']);
        }

        if ($datos['refuerzo_academico'] != 'NULL') {
            $builder->set('refuerzo_academico', $datos['refuerzo_academico']);
        }

        if ($datos['tecnico_local'] != 'NULL') {
            $builder->set('tecnico_local', $datos['tecnico_local']);
        }

        
        $builder->set('idnap3', $datos['idnap3']);
        $builder->insert();
    }
}
