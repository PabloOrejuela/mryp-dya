<?php

namespace App\Models;

use CodeIgniter\Model;

class Nap5Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'nap5_mineduc_doc_pres';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'amie',
        'anio_lectivo',
        'num_est',
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
        'subnivel',
        'observaciones'
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

    /**
     *
     * Esta función trae los registros que tienen el NAP 5 sin filtrar por Técnico
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getRegistrosNap5() {
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

    public function _getAllRegistrosExcel() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select($this->table.'.id as id,edad,centro_educativo.amie as amie,centro_educativo.nombre as ce, num_est,titulo_pro,genero,
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
        if ($datos['anio_lectivo'] != 'NULL') {
            $builder->set('anio_lectivo', $datos['anio_lectivo']);
        }

        if ($datos['num_est'] != 'NULL') {
            $builder->set('num_est', $datos['num_est']);
        }

        if ($datos['documento'] != 'NULL') {
            $builder->set('documento', $datos['documento']);
        }

        if ($datos['nombres'] != 'NULL') {
            $builder->set('nombres', $datos['nombres']);
        }

        if ($datos['apellidos'] != 'NULL') {
            $builder->set('apellidos', $datos['apellidos']);
        }

        if ($datos['edad'] != 'NULL') {
            $builder->set('edad', $datos['edad']);
        }

        if ($datos['email'] != 'NULL') {
            $builder->set('email', $datos['email']);
        }

        if ($datos['celular'] != 'NULL') {
            $builder->set('celular', $datos['celular']);
        }
        
        if ($datos['autoidentificacion'] != 'NULL') {
            $builder->set('autoidentificacion', $datos['autoidentificacion']);
        }

        if ($datos['titulo_pro'] != 'NULL') {
            $builder->set('titulo_pro', $datos['titulo_pro']);
        }

        if ($datos['genero'] != 'NULL') {
            $builder->set('genero', $datos['genero']);
        }

        if ($datos['discapacidad'] != 'NULL') {
            $builder->set('discapacidad', $datos['discapacidad']);
        }

        if ($datos['tipo'] != 'NULL') {
            $builder->set('tipo', $datos['tipo']);
        }

        if ($datos['subnivel'] != 'NULL') {
            $builder->set('subnivel', $datos['subnivel']);
        }

        if ($datos['amie'] != 'NULL') {
            $builder->set('amie', $datos['amie']);
        }

        if ($datos['observaciones'] != 'NULL') {
            $builder->set('observaciones', $datos['observaciones']);
        }

        $builder->insert();
    }

    public function _update($datos) {
        $builder = $this->db->table($this->table);
        if ($datos['anio_lectivo'] != 'NULL') {
            $builder->set('anio_lectivo', $datos['anio_lectivo']);
        }

        if ($datos['num_est'] != 'NULL') {
            $builder->set('num_est', $datos['num_est']);
        }

        if ($datos['documento'] != 'NULL') {
            $builder->set('documento', $datos['documento']);
        }

        if ($datos['nombres'] != 'NULL') {
            $builder->set('nombres', $datos['nombres']);
        }

        if ($datos['apellidos'] != 'NULL') {
            $builder->set('apellidos', $datos['apellidos']);
        }

        if ($datos['edad'] != 'NULL') {
            $builder->set('edad', $datos['edad']);
        }

        if ($datos['email'] != 'NULL') {
            $builder->set('email', $datos['email']);
        }

        if ($datos['celular'] != 'NULL') {
            $builder->set('celular', $datos['celular']);
        }
        
        if ($datos['autoidentificacion'] != 'NULL') {
            $builder->set('autoidentificacion', $datos['autoidentificacion']);
        }

        if ($datos['titulo_pro'] != 'NULL') {
            $builder->set('titulo_pro', $datos['titulo_pro']);
        }

        if ($datos['genero'] != 'NULL') {
            $builder->set('genero', $datos['genero']);
        }

        if ($datos['discapacidad'] != 'NULL') {
            $builder->set('discapacidad', $datos['discapacidad']);
        }

        if ($datos['tipo'] != 'NULL') {
            $builder->set('tipo', $datos['tipo']);
        }

        if ($datos['subnivel'] != 'NULL') {
            $builder->set('subnivel', $datos['subnivel']);
        }

        if ($datos['amie'] != 'NULL') {
            $builder->set('amie', $datos['amie']);
        }

        if ($datos['observaciones'] != 'NULL') {
            $builder->set('observaciones', $datos['observaciones']);
        }
        
        $builder->where('id', $datos['id']);
        $builder->update();
    }
}
