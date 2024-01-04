<?php

namespace App\Models;

use CodeIgniter\Model;

class Prod1Model extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'producto_1';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'amie',
        'cohorte',
        'fecha_inicio',
        'fecha_fin',
        'anio_lectivo',
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
        'anio_egb',
        'tutor_apoyo',
        'docente_tutor',
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

    public function _getNacionalidades() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('nacionalidad');
        $builder->distinct();
        $builder->orderBy('nacionalidad');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                if ($row->nacionalidad != NULL && $row != '') {
                    $result[] = $row;
                }
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _getRegistros($amie, $cohorte, $tutor) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('amie', $amie);
        $builder->where('cohorte', $cohorte);
        $builder->where('tutor_apoyo', $tutor);
        //$builder->join('eval_final', 'eval_final.idprod = producto_1.id');
        $builder->orderBy('apellidos');
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

    public function _getRegistrosCoordinador($amie, $result) {
        //$result = null;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('amie', $amie);
        //$builder->where('cohorte', 'SEGUNDA COHORTE');
        //$builder->join('eval_final', 'eval_final.idprod = producto_1.id');
        $builder->orderBy('apellidos');
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

    public function _getRegistrosCoordinadorDiagMYRP($amie, $result) {
        //$result = null;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('amie', $amie);
        //$builder->where('cohorte', 'SEGUNDA COHORTE');
        $builder->join('diag_myrp', 'diag_myrp.idprod = producto_1.id');
        $builder->orderBy('apellidos');
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

    public function _getRegistrosCoordinadorDiagFinal($amie, $result) {
        //$result = null;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('amie', $amie);
        //$builder->where('cohorte', 'SEGUNDA COHORTE');
        $builder->join('eval_final', 'eval_final.idprod = producto_1.id');
        $builder->orderBy('apellidos');
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

    public function _getRegistrosTecnico($amie, $result) {
        $result = null;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('amie', $amie);
        //$builder->where('cohorte', $cohorte);
        //$builder->join('eval_final', 'eval_final.idprod = producto_1.id');
        $builder->orderBy('apellidos');
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

    public function _getRegistrosCentros($centros) {
        
        $result = null;
        foreach ($centros as $key => $value) {
            //echo $value->amie;
            $result = $this->_getRegistrosCoordinador($value->amie, $result);
            //array_push($result, $this->_getRegistrosCoordinador($value->amie));
        }
        return $result;
    }

    public function _getRegistrosReporte($object) {
        $result = NULL;
        $builder = $this->db->table($this->table);

        if (isset($object['centros']) && $object['centros'] != NULL) {
            foreach ($object['centros'] as $key => $value) {
            
                $builder->select('*');
                $builder->where('amie', $value);
                if ($object['nivel'] == 1){
                    $builder->where('anio_egb >=', 1);
                    $builder->where('anio_egb <=', 4);
                }elseif ($object['nivel'] == 2) {
                    $builder->where('anio_egb >=', 5);
                    $builder->where('anio_egb <=', 7);
                }elseif ($object['nivel'] == 3) {
                    $builder->where('anio_egb >=', 8);
                    $builder->where('anio_egb <=', 10);
                }elseif ($object['nivel'] == 4) {
                    $builder->where('anio_egb >=', 11);
                    $builder->where('anio_egb <=', 14);
                }
    
                if ($object['cohorte'] == 1){
                    $builder->where('cohorte', 'PRIMERA COHORTE');
                }elseif ($object['cohorte'] == 2) {
                    $builder->where('cohorte', 'SEGUNDA COHORTE');
                }
                
                //$builder->join('eval_final', 'eval_final.idprod = producto_1.id');
                //$builder->orderBy('apellidos');
                $query = $builder->get();
                if ($query->getResult() != null) {
                    foreach ($query->getResult() as $row) {
                        if ($row->id != NULL && $row != '') {
                            $result[] = $row;
                        }
                    }
                }
            } 
        }
              
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _getEdadMax($object) {
        $result = NULL;
        $builder = $this->db->table($this->table);
            
        $builder->selectMax('edad');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result[] = $row->edad;
            }
        }     
        
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _getEdad($id) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('edad');
        $builder->where('id', $id);
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result = $row->edad;
            }
        }     
        
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _getRegistrosAdmin($amie, $cohorte) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('amie', $amie);
        $builder->where('cohorte', $cohorte);
        //$builder->join('eval_final', 'eval_final.idprod = producto_1.id');
        $builder->orderBy('apellidos');
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

    public function _getAllRegistrosExcel() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('centro_educativo', 'centro_educativo.amie = producto_1.amie');
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

    public function _getGeneros() {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('genero');
        $builder->distinct();
        $builder->orderBy('genero');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                if ($row->genero != NULL && $row != '') {
                    $result[] = $row;
                }
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }

    public function _getIdsAmie($amie) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('id');
        $builder->where('amie', $amie);
        $builder->orderBy('id');
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

    public function _getRegistrosAmieCohorte($amie, $cohorte, $tutor) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('id');
        $builder->where('amie', $amie);
        $builder->where('cohorte', $cohorte);
        //$builder->where('tutor_apoyo', $tutor);
        $builder->orderBy('id');
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

    public function _getRegistrosAmieCohorteAdmin($amie, $cohorte) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('id');
        $builder->where('amie', $amie);
        $builder->where('cohorte', $cohorte);
        $builder->orderBy('id');
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



    /**
     *
     * Esta función trae los Centros educativos cuyos registros tienen a
     * tutor de apoyo y tutor de apoyo 2
     *
     * @param Type $var El código amie del CE
     * @return array
     **/
    public function _getMisAmie($nombre) {
        $result = NULL;
        $builder = $this->db->table($this->table);
        $builder->select('producto_1.amie as amie, nombre');
        $builder->distinct();
        $builder->where('tutor_apoyo', $nombre);
        $builder->orWhere('tutor_apoyo_2', $nombre);
        $builder->join('centro_educativo', 'centro_educativo.amie = producto_1.amie');
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
        $builder->orWhere('tutor_apoyo_2', $nombre);
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
        $builder->select('producto_1.amie as amie, nombre');
        $builder->distinct();
        $builder->join('centro_educativo', 'centro_educativo.amie = producto_1.amie');
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
}
