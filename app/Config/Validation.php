<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig {

    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $login = [
        'user'  => 'required',
        'password'   => 'required',
    ];

    public $login_errors = [
        'user' => [
            'required' => 'El campo "Usuario" es obligatorio',
        ],
        'password' => [
            'required' => 'El campo "Contraseña" es obligatorio',
        ]
    ];

    public $uploadFile = [
        'tablaDatos' => 'uploaded[tablaDatos]',
    ];

    public $uploadFile_errors = [
        'tablaDatos' => [
            'uploaded' => 'Es necesario seleccionar un archivo para poder subirlo',
        ]
    ];

    public $tipo_prueba_mate = [
        'idprod'  => 'required',
        'tipo_prueba'   => 'required',
    ];

    public $tipo_prueba_mate_errors = [
        'tipo_prueba' => [
            'required' => 'Es obligatorio elegir un tipo de prueba',
            'greater_than' => 'Es obligatorio elegir un tipo de prueba',
        ]
    ];

    public $prod4Create= [
        'nombres' => 'required',
        'idcentro4' => 'required',
        'cohorte' => 'required',
    ];

    public $prod4Create_errors = [
        'nombres' => [
            'required' => 'El campo NOMBRES es obligatorio',
        ],
        'idcentro4' => [
            'required' => 'El campo CENTRO es obligatorio',
        ],
        'cohorte' => [
            'required' => 'El campo COHORTE es obligatorio',
        ]
    ];
}
