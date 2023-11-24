<?php

namespace App\Models;

use CodeIgniter\Model;

class LenguaProd3Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'lenguaje_prod3';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [

        'enfoque_sociocultural',
        'exp_dialectales',
        'exp_oral',
        'comp_lectora',
        'prod_textos',
        'extrategia_prod_text',
        'zapatos',
        'noticia',
        'carta',
        'ninia_abeja',
        'cuento',
        'cuerdas',
        'refranes',
        'juegos',
        'derechos_humanos',
        'noticiero',
        'discurso',
        'influencers',
        'inferencias',
        'elefante',
        'pitch',
        'id_prod_3',

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

    public function _getProd3lengua($id) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*')->where('id_prod_3', $id);
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result = $row;
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _getTotalTalleresLengua($id) {
        $total = 0;
        $builder = $this->db->table($this->table);
        $builder->select('enfoque_sociocultural,exp_dialectales,exp_oral,comp_lectora,prod_textos,extrategia_prod_text')->where('id_prod_3', $id);
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                if ($row->enfoque_sociocultural == 1) {
                    $total += 1;
                }

                if ($row->exp_dialectales == 1) {
                    $total += 1;
                }

                if ($row->exp_oral == 1) {
                    $total += 1;
                }

                if ($row->comp_lectora == 1) {
                    $total += 1;
                }

                if ($row->prod_textos == 1) {
                    $total += 1;
                }

                if ($row->extrategia_prod_text == 1) {
                    $total += 1;
                }
            }
        }
        //echo $this->db->getLastQuery();
        return $total;
    }

    public function _getTalleresLengua($id) {
        $total['enfoque_sociocultural'] = 0;
        $total['exp_dialectales'] = 0;
        $total['exp_oral'] = 0;
        $total['comp_lectora'] = 0;
        $total['prod_textos'] = 0;
        $total['extrategia_prod_text'] = 0;

        $builder = $this->db->table($this->table);
        $builder->select('enfoque_sociocultural,exp_dialectales,exp_oral,comp_lectora,prod_textos,extrategia_prod_text')->where('id_prod_3', $id);
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                if ($row->enfoque_sociocultural == 1) {
                    $total['enfoque_sociocultural'] += 1;
                }

                if ($row->exp_dialectales == 1) {
                    $total['exp_dialectales'] += 1;
                }

                if ($row->exp_oral == 1) {
                    $total['exp_oral'] += 1;
                }

                if ($row->comp_lectora == 1) {
                    $total['comp_lectora'] += 1;
                }

                if ($row->prod_textos == 1) {
                    $total['prod_textos'] += 1;
                }

                if ($row->extrategia_prod_text == 1) {
                    $total['extrategia_prod_text'] += 1;
                }
            }
        }
        //echo $this->db->getLastQuery();
        return $total;
    }

    public function _getClasesLengua($id) {
        $total = null;

        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_prod_3', $id);
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $total = $row;
            }
        }
        //echo $this->db->getLastQuery();
        return $total;
    }

    public function _update($datos) {
        $builder = $this->db->table($this->table);
        if ($datos['enfoque_sociocultural'] != 'NULL') {
            $builder->set('enfoque_sociocultural', $datos['enfoque_sociocultural']);
        }
        if ($datos['exp_dialectales'] != 'NULL') {
            $builder->set('exp_dialectales', $datos['exp_dialectales']);
        }
        if ($datos['exp_oral'] != 'NULL') {
            $builder->set('exp_oral', $datos['exp_oral']);
        }
        if ($datos['comp_lectora'] != 'NULL') {
            $builder->set('comp_lectora', $datos['comp_lectora']);
        }
        if ($datos['prod_textos'] != 'NULL') {
            $builder->set('prod_textos', $datos['prod_textos']);
        }
        if ($datos['extrategia_prod_text'] != 'NULL') {
            $builder->set('extrategia_prod_text', $datos['extrategia_prod_text']);
        }
        if ($datos['zapatos'] != 'NULL') {
            $builder->set('zapatos', $datos['zapatos']);
        }
        if ($datos['noticia'] != 'NULL') {
            $builder->set('noticia', $datos['noticia']);
        }
        if ($datos['carta'] != 'NULL') {
            $builder->set('carta', $datos['carta']);
        }
        if ($datos['ninia_abeja'] != 'NULL') {
            $builder->set('ninia_abeja', $datos['ninia_abeja']);
        }
        if ($datos['cuento'] != 'NULL') {
            $builder->set('cuento', $datos['cuento']);
        }
        if ($datos['cuerdas'] != 'NULL') {
            $builder->set('cuerdas', $datos['cuerdas']);
        }
        if ($datos['refranes'] != 'NULL') {
            $builder->set('refranes', $datos['refranes']);
        }
        if ($datos['juegos'] != 'NULL') {
            $builder->set('juegos', $datos['juegos']);
        }
        if ($datos['derechos_humanos'] != 'NULL') {
            $builder->set('derechos_humanos', $datos['derechos_humanos']);
        }
        if ($datos['noticiero'] != 'NULL') {
            $builder->set('noticiero', $datos['noticiero']);
        }
        if ($datos['discurso'] != 'NULL') {
            $builder->set('discurso', $datos['discurso']);
        }
        if ($datos['influencers'] != 'NULL') {
            $builder->set('influencers', $datos['influencers']);
        }
        if ($datos['inferencias'] != 'NULL') {
            $builder->set('inferencias', $datos['inferencias']);
        }
        if ($datos['elefante'] != 'NULL') {
            $builder->set('elefante', $datos['elefante']);
        }
        if ($datos['pitch'] != 'NULL') {
            $builder->set('pitch', $datos['pitch']);
        }

        if ($datos['enfoque_sociocultural_mes'] != 'NULL') {
            $builder->set('enfoque_sociocultural_mes', $datos['enfoque_sociocultural_mes']);
        }
        if ($datos['exp_dialectales_mes'] != 'NULL') {
            $builder->set('exp_dialectales_mes', $datos['exp_dialectales_mes']);
        }
        if ($datos['exp_oral_mes'] != 'NULL') {
            $builder->set('exp_oral_mes', $datos['exp_oral_mes']);
        }
        if ($datos['comp_lectora_mes'] != 'NULL') {
            $builder->set('comp_lectora_mes', $datos['comp_lectora_mes']);
        }
        if ($datos['prod_textos_mes'] != 'NULL') {
            $builder->set('prod_textos_mes', $datos['prod_textos_mes']);
        }
        if ($datos['extrategia_prod_text_mes'] != 'NULL') {
            $builder->set('extrategia_prod_text_mes', $datos['extrategia_prod_text_mes']);
        }
        if ($datos['zapatos_mes'] != 'NULL') {
            $builder->set('zapatos_mes', $datos['zapatos_mes']);
        }
        if ($datos['noticia_mes'] != 'NULL') {
            $builder->set('noticia_mes', $datos['noticia_mes']);
        }
        if ($datos['carta_mes'] != 'NULL') {
            $builder->set('carta_mes', $datos['carta_mes']);
        }
        if ($datos['ninia_abeja_mes'] != 'NULL') {
            $builder->set('ninia_abeja_mes', $datos['ninia_abeja_mes']);
        }
        if ($datos['cuento_mes'] != 'NULL') {
            $builder->set('cuento_mes', $datos['cuento_mes']);
        }
        if ($datos['cuerdas_mes'] != 'NULL') {
            $builder->set('cuerdas_mes', $datos['cuerdas_mes']);
        }
        if ($datos['refranes_mes'] != 'NULL') {
            $builder->set('refranes_mes', $datos['refranes_mes']);
        }
        if ($datos['juegos_mes'] != 'NULL') {
            $builder->set('juegos_mes', $datos['juegos_mes']);
        }
        if ($datos['derechos_humanos_mes'] != 'NULL') {
            $builder->set('derechos_humanos_mes', $datos['derechos_humanos_mes']);
        }
        if ($datos['noticiero_mes'] != 'NULL') {
            $builder->set('noticiero_mes', $datos['noticiero_mes']);
        }
        if ($datos['discurso_mes'] != 'NULL') {
            $builder->set('discurso_mes', $datos['discurso_mes']);
        }
        if ($datos['influencers_mes'] != 'NULL') {
            $builder->set('influencers_mes', $datos['influencers_mes']);
        }
        if ($datos['inferencias_mes'] != 'NULL') {
            $builder->set('inferencias_mes', $datos['inferencias_mes']);
        }
        if ($datos['elefante_mes'] != 'NULL') {
            $builder->set('elefante_mes', $datos['elefante_mes']);
        }
        if ($datos['pitch_mes'] != 'NULL') {
            $builder->set('pitch_mes', $datos['pitch_mes']);
        }


        $builder->where('id_prod_3', $datos['id_prod_3']);
        $builder->update();
    }

    public function _save($datos) {
        
        $builder = $this->db->table($this->table);
        if ($datos['enfoque_sociocultural'] != 'NULL') {
            $builder->set('enfoque_sociocultural', $datos['enfoque_sociocultural']);
        }
        if ($datos['exp_dialectales'] != 'NULL') {
            $builder->set('exp_dialectales', $datos['exp_dialectales']);
        }
        if ($datos['exp_oral'] != 'NULL') {
            $builder->set('exp_oral', $datos['exp_oral']);
        }
        if ($datos['comp_lectora'] != 'NULL') {
            $builder->set('comp_lectora', $datos['comp_lectora']);
        }
        if ($datos['prod_textos'] != 'NULL') {
            $builder->set('prod_textos', $datos['prod_textos']);
        }
        if ($datos['extrategia_prod_text'] != 'NULL') {
            $builder->set('extrategia_prod_text', $datos['extrategia_prod_text']);
        }
        if ($datos['zapatos'] != 'NULL') {
            $builder->set('zapatos', $datos['zapatos']);
        }
        if ($datos['noticia'] != 'NULL') {
            $builder->set('noticia', $datos['noticia']);
        }
        if ($datos['carta'] != 'NULL') {
            $builder->set('carta', $datos['carta']);
        }
        if ($datos['ninia_abeja'] != 'NULL') {
            $builder->set('ninia_abeja', $datos['ninia_abeja']);
        }
        if ($datos['cuento'] != 'NULL') {
            $builder->set('cuento', $datos['cuento']);
        }
        if ($datos['cuerdas'] != 'NULL') {
            $builder->set('cuerdas', $datos['cuerdas']);
        }
        if ($datos['refranes'] != 'NULL') {
            $builder->set('refranes', $datos['refranes']);
        }
        if ($datos['juegos'] != 'NULL') {
            $builder->set('juegos', $datos['juegos']);
        }
        if ($datos['derechos_humanos'] != 'NULL') {
            $builder->set('derechos_humanos', $datos['derechos_humanos']);
        }
        if ($datos['noticiero'] != 'NULL') {
            $builder->set('noticiero', $datos['noticiero']);
        }
        if ($datos['discurso'] != 'NULL') {
            $builder->set('discurso', $datos['discurso']);
        }
        if ($datos['influencers'] != 'NULL') {
            $builder->set('influencers', $datos['influencers']);
        }
        if ($datos['inferencias'] != 'NULL') {
            $builder->set('inferencias', $datos['inferencias']);
        }
        if ($datos['elefante'] != 'NULL') {
            $builder->set('elefante', $datos['elefante']);
        }
        if ($datos['pitch'] != 'NULL') {
            $builder->set('pitch', $datos['pitch']);
        }

        if ($datos['enfoque_sociocultural_mes'] != 'NULL') {
            $builder->set('enfoque_sociocultural_mes', $datos['enfoque_sociocultural_mes']);
        }
        if ($datos['exp_dialectales_mes'] != 'NULL') {
            $builder->set('exp_dialectales_mes', $datos['exp_dialectales_mes']);
        }
        if ($datos['exp_oral_mes'] != 'NULL') {
            $builder->set('exp_oral_mes', $datos['exp_oral_mes']);
        }
        if ($datos['comp_lectora_mes'] != 'NULL') {
            $builder->set('comp_lectora_mes', $datos['comp_lectora_mes']);
        }
        if ($datos['prod_textos_mes'] != 'NULL') {
            $builder->set('prod_textos_mes', $datos['prod_textos_mes']);
        }
        if ($datos['extrategia_prod_text_mes'] != 'NULL') {
            $builder->set('extrategia_prod_text_mes', $datos['extrategia_prod_text_mes']);
        }
        if ($datos['zapatos_mes'] != 'NULL') {
            $builder->set('zapatos_mes', $datos['zapatos_mes']);
        }
        if ($datos['noticia_mes'] != 'NULL') {
            $builder->set('noticia_mes', $datos['noticia_mes']);
        }
        if ($datos['carta_mes'] != 'NULL') {
            $builder->set('carta_mes', $datos['carta_mes']);
        }
        if ($datos['ninia_abeja_mes'] != 'NULL') {
            $builder->set('ninia_abeja_mes', $datos['ninia_abeja_mes']);
        }
        if ($datos['cuento_mes'] != 'NULL') {
            $builder->set('cuento_mes', $datos['cuento_mes']);
        }
        if ($datos['cuerdas_mes'] != 'NULL') {
            $builder->set('cuerdas_mes', $datos['cuerdas_mes']);
        }
        if ($datos['refranes_mes'] != 'NULL') {
            $builder->set('refranes_mes', $datos['refranes_mes']);
        }
        if ($datos['juegos_mes'] != 'NULL') {
            $builder->set('juegos_mes', $datos['juegos_mes']);
        }
        if ($datos['derechos_humanos_mes'] != 'NULL') {
            $builder->set('derechos_humanos_mes', $datos['derechos_humanos_mes']);
        }
        if ($datos['noticiero_mes'] != 'NULL') {
            $builder->set('noticiero_mes', $datos['noticiero_mes']);
        }
        if ($datos['discurso_mes'] != 'NULL') {
            $builder->set('discurso_mes', $datos['discurso_mes']);
        }
        if ($datos['influencers_mes'] != 'NULL') {
            $builder->set('influencers_mes', $datos['influencers_mes']);
        }
        if ($datos['inferencias_mes'] != 'NULL') {
            $builder->set('inferencias_mes', $datos['inferencias_mes']);
        }
        if ($datos['elefante_mes'] != 'NULL') {
            $builder->set('elefante_mes', $datos['elefante_mes']);
        }
        if ($datos['pitch_mes'] != 'NULL') {
            $builder->set('pitch_mes', $datos['pitch_mes']);
        }

        $builder->set('id_prod_3', $datos['id_prod_3']);
        $builder->insert();
    }

}
