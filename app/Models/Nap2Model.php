<?php

namespace App\Models;

use CodeIgniter\Model;

class Nap2Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'nap2_est_dya';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'amie',
        'fecha_inicio',
        'fecha_fin',
        'nombres',
        'apellidos',
        'documento',
        'nacionalidad',                
        'etnia',
        'fecha_nac',
        'edad',
        'genero',
        'discapacidad',
        'tipo_discapacidad',
        'representante',
        'documento_rep',
        'parentesto_rep',
        'nacionalidad_rep',
        'direccion_rep',
        'contacto_telf',
        'email'                
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
     * Esta función trae los registros que tienen a
     * tutor de apoyo y tutor de apoyo 2
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getMisRegistros($nombre) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('tutor_apoyo', $nombre);
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

    public function _getCentrosEducativos() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('nap2_est_dya.amie as amie, nombre');
        $builder->distinct();
        $builder->join('centro_educativo', 'centro_educativo.amie = nap2_est_dya.amie');
        $builder->orderBy('nombre');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                if ($row->amie != NULL && $row != '') {
                    $result[] = $row;
                }
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    /**
     *
     * Esta función trae los registros que tienen el NAP 2 sin filtrar por Técnico
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getRegistrosNap2() {
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
        if ($datos['amie'] != 'NULL') {
            $builder->set('amie', $datos['amie']);
        }

        if ($datos['anio_lectivo'] != 'NULL') {
            $builder->set('anio_lectivo', $datos['anio_lectivo']);
        }

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

        if ($datos['genero'] != 'NULL') {
            $builder->set('genero', $datos['genero']);
        }

        if ($datos['fecha_nac'] != 'NULL') {
            $builder->set('fecha_nac', $datos['fecha_nac']);
        }

        if ($datos['edad'] != 'NULL') {
            $builder->set('edad', $datos['edad']);
        }

        if ($datos['ingresado_sistema'] != 'NULL') {
            $builder->set('ingresado_sistema', $datos['ingresado_sistema']);
        }

        if ($datos['discapacidad'] != 'NULL') {
            $builder->set('discapacidad', $datos['discapacidad']);
        }

        if ($datos['tipo_discapacidad'] != 'NULL') {
            $builder->set('tipo_discapacidad', $datos['tipo_discapacidad']);
        }

        if ($datos['documento_rep'] != 'NULL') {
            $builder->set('documento_rep', $datos['documento_rep']);
        }

        if ($datos['representante'] != 'NULL') {
            $builder->set('representante', $datos['representante']);
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

        $builder->insert();
    }

    public function _getAllRegistrosExcel() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select($this->table.'.id as id,edad,centro_educativo.amie as amie,centro_educativo.nombre as ce, anio_lectivo, fecha_nac, representante,documento_rep,
                        ciudad,provincia,'.$this->table.'.nombres as nombres,'.$this->table.'.apellidos as apellidos, documento,nacionalidad,parentesto_rep,nacionalidad_rep,
                        direccion_rep,etnia.etnia as etnia, genero,discapacidad,tipo_discapacidad,contacto_telf,email');
        $builder->join('centro_educativo', 'centro_educativo.amie = '.$this->table.'.amie');
        $builder->join('ciudades', 'ciudades.idciudades = centro_educativo.idciudades');
        $builder->join('provincias', 'provincias.idprovincias = ciudades.idprovincias');
        $builder->join('etnia', 'etnia.id = '.$this->table.'.etnia','left');
        //$builder->join('anio_lectivo', 'anio_lectivo.id = producto_1.anio_lectivo');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                if ($row->id != NULL && $row != '') {
                    $result[] = $row;
                }
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }
}
