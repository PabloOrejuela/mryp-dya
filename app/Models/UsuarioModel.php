<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model {

    protected $DBGroup          = 'default';
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nombre',
        'user',
        'telefono',
        'email',
        'password',
        'cedula',
        'idrol',
        'is_logged',
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

    function _getUsuario($usuario){
        $result = NULL;
        $builder = $this->db->table('usuarios');
        $builder->select(
            'usuarios.id as id,
            nombre,
            user,
            telefono,
            email,
            password,
            cedula,
            idrol,
            is_logged,
            rol,
            centro_educativo,
            editar,
            componente_1,
            ver_info,
            descargar_info,
            cargar_info,
            reportes,
            reportes_dinamico,
            componente_2,
            componente_3,
            componente_4'
        )->where('user', $usuario['user'])->where('password', md5($usuario['password']));
        $builder->join('roles', 'roles.id=usuarios.idrol');
        $query = $builder->get();
        if ($query->getResult() != null) {
            foreach ($query->getResult() as $row) {
                $result = $row;
            }
        }
        //echo $this->db->getLastQuery();
        return $result;
    }
}
