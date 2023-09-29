<?php

namespace App\Models;

use CodeIgniter\Model;

class Nap7ProcessResultSierra extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'nap7_procesos_result_sierra';
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
        if ($datos['lineamiento_rubrica'] != 'NULL') {
            $builder->set('lineamiento_rubrica', $datos['lineamiento_rubrica']);
        }

        if ($datos['estrategia_didactica'] != 'NULL') {
            $builder->set('estrategia_didactica', $datos['estrategia_didactica']);
        }

        if ($datos['curriculo_competencias'] != 'NULL') {
            $builder->set('curriculo_competencias', $datos['curriculo_competencias']);
        }

        if ($datos['innova_aula'] != 'NULL') {
            $builder->set('innova_aula', $datos['innova_aula']);
        }

        if ($datos['comple_inova_aula'] != 'NULL') {
            $builder->set('comple_inova_aula', $datos['comple_inova_aula']);
        }

        if ($datos['tec_instrument_eval'] != 'NULL') {
            $builder->set('tec_instrument_eval', $datos['tec_instrument_eval']);
        }

        if ($datos['pract_instr_eval'] != 'NULL') {
            $builder->set('pract_instr_eval', $datos['pract_instr_eval']);
        }

        if ($datos['valor_arte_educa'] != 'NULL') {
            $builder->set('valor_arte_educa', $datos['valor_arte_educa']);
        }

        if ($datos['disciplina_positiva'] != 'NULL') {
            $builder->set('disciplina_positiva', $datos['disciplina_positiva']);
        }

        if ($datos['retro_lineamiento_instr'] != 'NULL') {
            $builder->set('retro_lineamiento_instr', $datos['retro_lineamiento_instr']);
        }

        if ($datos['eval_prom_final'] != 'NULL') {
            $builder->set('eval_prom_final', $datos['eval_prom_final']);
        }

        if ($datos['infor_apren_cierre'] != 'NULL') {
            $builder->set('infor_apren_cierre', $datos['infor_apren_cierre']);
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


        if ($datos['tic_tecno_digital'] != 'NULL') {
            $builder->set('tic_tecno_digital', $datos['tic_tecno_digital']);
        }
        if ($datos['competencia_digital_docente'] != 'NULL') {
            $builder->set('competencia_digital_docente', $datos['competencia_digital_docente']);
        }
        if ($datos['competencias_informacionales'] != 'NULL') {
            $builder->set('competencias_informacionales', $datos['competencias_informacionales']);
        }
        if ($datos['gestion_datos'] != 'NULL') {
            $builder->set('gestion_datos', $datos['gestion_datos']);
        }
        if ($datos['educomunicacion'] != 'NULL') {
            $builder->set('educomunicacion', $datos['educomunicacion']);
        }
        if ($datos['herramientas_compartir'] != 'NULL') {
            $builder->set('herramientas_compartir', $datos['herramientas_compartir']);
        }
        if ($datos['plataformas_web'] != 'NULL') {
            $builder->set('plataformas_web', $datos['plataformas_web']);
        }
        if ($datos['rea_licencias'] != 'NULL') {
            $builder->set('rea_licencias', $datos['rea_licencias']);
        }
        if ($datos['contenido_interactivo'] != 'NULL') {
            $builder->set('contenido_interactivo', $datos['contenido_interactivo']);
        }
        if ($datos['contenido_audiovisual'] != 'NULL') {
            $builder->set('contenido_audiovisual', $datos['contenido_audiovisual']);
        }
        if ($datos['resultado_curso_2'] != 'NULL') {
            $builder->set('resultado_curso_2', $datos['resultado_curso_2']);
        }

        $builder->where('idnap7', $datos['idnap7']);
        $builder->update();
    }

    public function _save($datos) {
        $builder = $this->db->table($this->table);
        if ($datos['lineamiento_rubrica'] != 'NULL') {
            $builder->set('lineamiento_rubrica', $datos['lineamiento_rubrica']);
        }

        if ($datos['estrategia_didactica'] != 'NULL') {
            $builder->set('estrategia_didactica', $datos['estrategia_didactica']);
        }

        if ($datos['curriculo_competencias'] != 'NULL') {
            $builder->set('curriculo_competencias', $datos['curriculo_competencias']);
        }

        if ($datos['innova_aula'] != 'NULL') {
            $builder->set('innova_aula', $datos['innova_aula']);
        }

        if ($datos['comple_inova_aula'] != 'NULL') {
            $builder->set('comple_inova_aula', $datos['comple_inova_aula']);
        }

        if ($datos['tec_instrument_eval'] != 'NULL') {
            $builder->set('tec_instrument_eval', $datos['tec_instrument_eval']);
        }

        if ($datos['pract_instr_eval'] != 'NULL') {
            $builder->set('pract_instr_eval', $datos['pract_instr_eval']);
        }

        if ($datos['valor_arte_educa'] != 'NULL') {
            $builder->set('valor_arte_educa', $datos['valor_arte_educa']);
        }

        if ($datos['disciplina_positiva'] != 'NULL') {
            $builder->set('disciplina_positiva', $datos['disciplina_positiva']);
        }

        if ($datos['retro_lineamiento_instr'] != 'NULL') {
            $builder->set('retro_lineamiento_instr', $datos['retro_lineamiento_instr']);
        }

        if ($datos['eval_prom_final'] != 'NULL') {
            $builder->set('eval_prom_final', $datos['eval_prom_final']);
        }

        if ($datos['infor_apren_cierre'] != 'NULL') {
            $builder->set('infor_apren_cierre', $datos['infor_apren_cierre']);
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

        if ($datos['tic_tecno_digital'] != 'NULL') {
            $builder->set('tic_tecno_digital', $datos['tic_tecno_digital']);
        }
        if ($datos['competencia_digital_docente'] != 'NULL') {
            $builder->set('competencia_digital_docente', $datos['competencia_digital_docente']);
        }
        if ($datos['competencias_informacionales'] != 'NULL') {
            $builder->set('competencias_informacionales', $datos['competencias_informacionales']);
        }
        if ($datos['gestion_datos'] != 'NULL') {
            $builder->set('gestion_datos', $datos['gestion_datos']);
        }
        if ($datos['educomunicacion'] != 'NULL') {
            $builder->set('educomunicacion', $datos['educomunicacion']);
        }
        if ($datos['herramientas_compartir'] != 'NULL') {
            $builder->set('herramientas_compartir', $datos['herramientas_compartir']);
        }
        if ($datos['plataformas_web'] != 'NULL') {
            $builder->set('plataformas_web', $datos['plataformas_web']);
        }
        if ($datos['rea_licencias'] != 'NULL') {
            $builder->set('rea_licencias', $datos['rea_licencias']);
        }
        if ($datos['contenido_interactivo'] != 'NULL') {
            $builder->set('contenido_interactivo', $datos['contenido_interactivo']);
        }
        if ($datos['contenido_audiovisual'] != 'NULL') {
            $builder->set('contenido_audiovisual', $datos['contenido_audiovisual']);
        }
        if ($datos['resultado_curso_2'] != 'NULL') {
            $builder->set('resultado_curso_2', $datos['resultado_curso_2']);
        }
        
        $builder->set('idnap7', $datos['idnap7']);
        $builder->insert();
    }
}
