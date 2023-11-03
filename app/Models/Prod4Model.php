<?php

namespace App\Models;

use CodeIgniter\Model;

class Prod4Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'producto_4';
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

    /**
     *
     * Esta función trae los registros del usuario
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getMisRegistros($id) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('producto_4.id as id, nombres, documento, cohorte');
        $builder->join('centro_prod_4', 'centro_prod_4.id = producto_4.idcentro4');
        $builder->where('centro_prod_4.tecnico', $id);
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
     * Esta función trae todos los registros
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getAllRegistros() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('producto_4.id as id, cohortes.cohorte as cohorte, nombres, documento');
        $builder->join('cohortes', 'cohortes.id = producto_4.cohorte');
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
        $builder->select(
            $this->table.'.id as id, cohorte,ciudad,provincia,
            edad,fecha_nac,edad,discapacidad,tipo_discapacidad,barrio,num_hijos,edad_hijo_1,edad_hijo_2,edad_hijo_3,
            centro_prod_4.centro as ce,ciudad,'.$this->table.'.nombres as nombres,estudia,tiempo_sin_estudiar,institucion,anio_egb,
            documento,nacionalidad,genero,contacto_telf,email,embarazada,semanas,controles'
        );
        $builder->join('centro_prod_4', 'centro_prod_4.id = '.$this->table.'.idcentro4');
        $builder->join('ciudades', 'ciudades.idciudades = centro_prod_4.idciudades');
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

    public function _getDatosReporte($filtros, $variables) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select(
            $this->table.'.id as id, centro_prod_4.centro as ce,ciudad,'.$this->table.'.nombres as nombres,
            '.$variables['variable_1'].','.$variables['variable_2'].','.$variables['variable_3']
        );
        $builder->join('centro_prod_4', 'centro_prod_4.id = '.$this->table.'.idcentro4');
        $builder->join('ciudades', 'ciudades.idciudades = centro_prod_4.idciudades');
        $builder->join('provincias', 'provincias.idprovincias = ciudades.idprovincias');
        $builder->join('prod4_process_resultado', 'prod4_process_resultado.idProd4 = '.$this->table.'.id');
        $builder->where('centro_prod_4.idciudades',$filtros['idciudades']);
        $builder->where('cohorte',$filtros['cohorte']);
        if (isset($filtros['signo']) && $filtros['signo'] != null && $filtros['edad'] != '') {
            $builder->where('edad '.$filtros["signo"], $filtros['edad']);
        }
        //$builder->orderBy($variables['order_by'], 'asc');
        //$builder->join('anio_lectivo', 'anio_lectivo.id = producto_1.anio_lectivo');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                if ($row->id != NULL && $row != '') {
                    $result[] = $row;
                }
            }
        }
        echo $this->db->getLastQuery();
        return $result;
    }

}
