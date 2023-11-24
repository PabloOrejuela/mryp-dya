<?php

namespace App\Models;

use CodeIgniter\Model;

class Nap3Model extends Model {
    
    protected $DBGroup          = 'default';
    protected $table            = 'nap3_doc_dya';
    protected $primaryKey       = 'idnap3';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'anio_lectivo' ,
        'num_est' ,
        'documento',
        'apellidos',
        'nombres',
        'edad',
        'email',
        'celular',
        'autoidentificacion',
        'titulo_pro',
        'genero',
        'discapacidad',
        'tipo',
        'amie',
        'observaciones'
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
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    //PABLO con esta función filtrar los tutores
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

    /**
     *
     * Esta función trae los registros que tienen el NAP 3 sin filtrar por Técnico
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getRegistrosNap3() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('centro_educativo','centro_educativo.amie = '.$this->table.'.amie');
        $builder->orderBy('idnap3');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result[] = $row;
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _getAllRegistrosExcel() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select($this->table.'.idnap3 as id,edad,centro_educativo.amie as amie,centro_educativo.nombre as ce, num_est,titulo_pro,genero,
                        discapacidad,tipo,anio_lectivo,ciudad,provincia,'.$this->table.'.nombres as nombres,'.$this->table.'.apellidos as apellidos, 
                        documento,email, celular,autoidentificacion,observaciones');
        $builder->join('centro_educativo', 'centro_educativo.amie = '.$this->table.'.amie');
        $builder->join('ciudades', 'ciudades.idciudades = centro_educativo.idciudades');
        $builder->join('provincias', 'provincias.idprovincias = ciudades.idprovincias');
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

        if ($datos['num_est'] != 'NULL') {
            $builder->set('num_est', $datos['num_est']);
        }

        if ($datos['autoidentificacion'] != 'NULL') {
            $builder->set('autoidentificacion', $datos['autoidentificacion']);
        }

        if ($datos['genero'] != 'NULL') {
            $builder->set('genero', $datos['genero']);
        }

        if ($datos['edad'] != 'NULL') {
            $builder->set('edad', $datos['edad']);
        }

        if ($datos['discapacidad'] != 'NULL') {
            $builder->set('discapacidad', $datos['discapacidad']);
        }

        if ($datos['tipo'] != 'NULL') {
            $builder->set('tipo', $datos['tipo']);
        }

        if ($datos['titulo_pro'] != 'NULL') {
            $builder->set('titulo_pro', $datos['titulo_pro']);
        }

        if ($datos['celular'] != 'NULL') {
            $builder->set('celular', $datos['celular']);
        }

        if ($datos['email'] != 'NULL') {
            $builder->set('email', $datos['email']);
        }

        if ($datos['observaciones'] != 'NULL') {
            $builder->set('observaciones', $datos['observaciones']);
        }

        $builder->insert();
    }

    public function _update($datos) {
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

        if ($datos['num_est'] != 'NULL') {
            $builder->set('num_est', $datos['num_est']);
        }

        if ($datos['autoidentificacion'] != 'NULL') {
            $builder->set('autoidentificacion', $datos['autoidentificacion']);
        }

        if ($datos['genero'] != 'NULL') {
            $builder->set('genero', $datos['genero']);
        }

        if ($datos['edad'] != 'NULL') {
            $builder->set('edad', $datos['edad']);
        }

        if ($datos['discapacidad'] != 'NULL') {
            $builder->set('discapacidad', $datos['discapacidad']);
        }

        if ($datos['tipo'] != 'NULL') {
            $builder->set('tipo', $datos['tipo']);
        }

        if ($datos['titulo_pro'] != 'NULL') {
            $builder->set('titulo_pro', $datos['titulo_pro']);
        }

        if ($datos['celular'] != 'NULL') {
            $builder->set('celular', $datos['celular']);
        }

        if ($datos['email'] != 'NULL') {
            $builder->set('email', $datos['email']);
        }

        if ($datos['observaciones'] != 'NULL') {
            $builder->set('observaciones', $datos['observaciones']);
        }

        $builder->where('idnap3', $datos['idnap3']);
        $builder->update();
    }
}
