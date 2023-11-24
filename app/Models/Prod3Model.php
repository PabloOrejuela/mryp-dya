<?php

namespace App\Models;

use CodeIgniter\Model;

class Prod3Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'producto_3';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'amie',
        'nombre',
        'documento',
        'nacionalidad',                
        'genero',
        'discapacidad',
        'tipo',
        'email',
        'celular',
        'inicial_1',
        'inicial_2',
        'pri_egb',
        'seg_egb',
        'ter_egb',
        'cuart_egb',
        'quin_egb',
        'sex_egb',
        'sept_egb',
        'oct_egb',
        'nov_egb',
        'dec_egb',
        'pri_bach',
        'seg_bach',
        'ter_bach',
        'especialidad',
        'funcion',
        'edad',
        'etnia'
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
     * Esta función trae los registros que tienen a
     * tutor de apoyo y tutor de apoyo 2
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getMisRegistros($id) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('producto_3.id as id, producto_3.amie as amie, nombre, documento');
        $builder->join('usuarios_centros_prod3', 'usuarios_centros_prod3.amie = producto_3.amie');
        $builder->where('usuarios_centros_prod3.idusuario', $id);
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
     * Esta función trae todos los registros del Prod 3 para coordinadores y admin
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getAllRegistros() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('producto_3.id as id, producto_3.amie as amie, nombre, documento');
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
     * Esta función trae todos los registros del Prod 3 para coordinadores y admin
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getAllRegistrosCentro($amie) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('producto_3.id as id, producto_3.amie as amie, nombre, documento');
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
     * Esta función trae los Centros educativos que están bajo un ID del Prod 3
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getMisAmie($id) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('producto_3.amie as amie, centro_educativo.nombre')->distinct();
        $builder->join('usuarios_centros_prod3', 'usuarios_centros_prod3.amie = producto_3.amie');
        $builder->where('usuarios_centros_prod3.idusuario', $id);
        $builder->join('centro_educativo', 'centro_educativo.amie = producto_3.amie');
        $builder->orderBy('nombre');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result[] = $row;
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _getCentrosEducativosProd3() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('producto_3.amie as amie, centro_educativo.nombre as Centro, idparroquia');
        $builder->distinct();
        $builder->join('centro_educativo', 'centro_educativo.amie = producto_3.amie');
        $builder->orderBy('Centro');
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

    public function _getCentrosEducativosProd3All() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('producto_3.amie as amie, centro_educativo.nombre as Centro, idparroquia,centro_educativo.nombre as nombre');
        $builder->distinct();
        $builder->join('centro_educativo', 'centro_educativo.amie = producto_3.amie');
        $builder->orderBy('Centro');
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
     * Esta función trae los registros dado un amie
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getRegistrosAmie($amie) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('id, amie, nombre, documento');
        //$builder->join('usuarios_centros_prod3', 'usuarios_centros_prod3.amie = producto_3.amie');
        $builder->where('producto_3.amie', $amie);
        $builder->orderBy('nombre', 'asc');
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
        $builder->select($this->table.'.id as id,edad,centro_educativo.amie as amie,centro_educativo.nombre as ce,ciudad,provincia,producto_3.nombre as nombre,documento,nacionalidad,etnia.etnia as etnia,genero,discapacidad,tipo,celular,email');
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

    public function _updateCedula($datos) {
        $builder = $this->db->table($this->table);
        $builder->set('documento', $datos['documento']);
        $builder->where('id', $datos['id']);
        $builder->update();
    }

    public function _getCamposEstadistica() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select($this->table.'.id as id,AVG(edad) as promEdad,nacionalidad,etnia.etnia as etnia,genero');
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

    public function _getTotalGeneros($genero) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('id, COUNT(genero) as genero');
        $builder->where('genero', $genero);
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                if ($row->id != NULL && $row != '') {
                    $result = $row->genero;
                }
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }
}