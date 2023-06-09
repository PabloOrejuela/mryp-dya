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
    protected $protectFields    = true;
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
        $builder->set('id_prod_3', $datos['id_prod_3']);
        
        $builder->insert();
    }

}
