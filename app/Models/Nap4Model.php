<?php

namespace App\Models;

use CodeIgniter\Model;

class Nap4Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'nap4_mineduc_est_pres';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'amie',
        'anio_lectivo',
        'documento',
        'apellidos',
        'nombres',
        'nacionalidad',
        'etnia',
        'genero',
        'fecha_nac',
        'edad',
        'nivel',
        'discapacidad',
        'tipo_discapacidad',
        'institucion',
        'doc_tutor',
        'docente_tutor',
        'email_tutor',
        'telf_tutor',
        'etnia_tutor',
        'documento_rep',
        'representante',
        'parentesto_rep',
        'nacionalidad_rep',
        'direccion_rep',
        'contacto_telf',
        'email',
        'observaciones',
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

    /**
     *
     * Esta función trae los registros que tienen el NAP 4 sin filtrar por Técnico
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getRegistrosNap4() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('centro_educativo','centro_educativo.amie = '.$this->table.'.amie');
        $builder->orderBy('id');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result[] = $row;
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _update($datos) {
        $builder = $this->db->table($this->table);
        if ($datos['nombres'] != 'NULL') {
            $builder->set('nombres', $datos['nombres']);
        }

        if ($datos['apellidos'] != 'NULL') {
            $builder->set('apellidos', $datos['apellidos']);
        }

        if ($datos['documento'] != 'NULL') {
            $builder->set('documento', $datos['documento']);
        }

        if ($datos['nacionalidad'] != 'NULL') {
            $builder->set('nacionalidad', $datos['nacionalidad']);
        }

        if ($datos['etnia'] != 'NULL') {
            $builder->set('etnia', $datos['etnia']);
        }

        if ($datos['fecha_nac'] != 'NULL') {
            $builder->set('fecha_nac', $datos['fecha_nac']);
        }

        if ($datos['edad'] != 'NULL') {
            $builder->set('edad', $datos['edad']);
        }

        if ($datos['genero'] != 'NULL') {
            $builder->set('genero', $datos['genero']);
        }

        if ($datos['discapacidad'] != 'NULL') {
            $builder->set('discapacidad', $datos['discapacidad']);
        }

        if ($datos['tipo_discapacidad'] != 'NULL') {
            $builder->set('tipo_discapacidad', $datos['tipo_discapacidad']);
        }

        if ($datos['representante'] != 'NULL') {
            $builder->set('representante', $datos['representante']);
        }

        if ($datos['documento_rep'] != 'NULL') {
            $builder->set('documento_rep', $datos['documento_rep']);
        }

        if ($datos['parentesto_rep'] != 'NULL') {
            $builder->set('parentesto_rep', $datos['parentesto_rep']);
        }

        if ($datos['nacionalidad_rep'] != 'NULL') {
            $builder->set('nacionalidad_rep', $datos['nacionalidad_rep']);
        }

        if ($datos['direccion_rep'] != 'NULL') {
            $builder->set('direccion_rep', $datos['direccion_rep']);
        }

        if ($datos['contacto_telf'] != 'NULL') {
            $builder->set('contacto_telf', $datos['contacto_telf']);
        }

        if ($datos['email'] != 'NULL') {
            $builder->set('email', $datos['email']);
        }
        
        $builder->where('id', $datos['id']);
        $builder->update();
    }

    public function _save($datos) {
        $builder = $this->db->table($this->table);
        if ($datos['nombres'] != 'NULL') {
            $builder->set('nombres', $datos['nombres']);
        }

        if ($datos['apellidos'] != 'NULL') {
            $builder->set('apellidos', $datos['apellidos']);
        }

        if ($datos['documento'] != 'NULL') {
            $builder->set('documento', $datos['documento']);
        }

        if ($datos['nacionalidad'] != 'NULL') {
            $builder->set('nacionalidad', $datos['nacionalidad']);
        }

        if ($datos['etnia'] != 'NULL') {
            $builder->set('etnia', $datos['etnia']);
        }

        if ($datos['fecha_nac'] != 'NULL') {
            $builder->set('fecha_nac', $datos['fecha_nac']);
        }

        if ($datos['edad'] != 'NULL') {
            $builder->set('edad', $datos['edad']);
        }

        if ($datos['genero'] != 'NULL') {
            $builder->set('genero', $datos['genero']);
        }

        if ($datos['discapacidad'] != 'NULL') {
            $builder->set('discapacidad', $datos['discapacidad']);
        }

        if ($datos['tipo_discapacidad'] != 'NULL') {
            $builder->set('tipo_discapacidad', $datos['tipo_discapacidad']);
        }

        if ($datos['representante'] != 'NULL') {
            $builder->set('representante', $datos['representante']);
        }

        if ($datos['documento_rep'] != 'NULL') {
            $builder->set('documento_rep', $datos['documento_rep']);
        }

        if ($datos['parentesto_rep'] != 'NULL') {
            $builder->set('parentesto_rep', $datos['parentesto_rep']);
        }

        if ($datos['nacionalidad_rep'] != 'NULL') {
            $builder->set('nacionalidad_rep', $datos['nacionalidad_rep']);
        }

        if ($datos['direccion_rep'] != 'NULL') {
            $builder->set('direccion_rep', $datos['direccion_rep']);
        }

        if ($datos['contacto_telf'] != 'NULL') {
            $builder->set('contacto_telf', $datos['contacto_telf']);
        }

        if ($datos['email'] != 'NULL') {
            $builder->set('email', $datos['email']);
        }

        $builder->set('id', $datos['id']);
        $builder->insert();
    }
}
