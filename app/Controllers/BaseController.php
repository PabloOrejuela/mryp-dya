<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\UsuarioModel;
use App\Models\ProductoModel;
use App\Models\CentroEducativoModel;
use App\Models\CursoModel;
use App\Models\Nap2Model;
use App\Models\Nap3Model;
use App\Models\Nap4Model;
use App\Models\CiudadesModel;
use App\Models\Prod1Model;
use App\Models\DiagnosticoDocenteP1Model;
use App\Models\DiagnosticoMyrpP1Model;
use App\Models\AsistenciaP1Model;
use App\Models\EvalFinalP1Model;
use App\Models\EvalMateP1Model;
use App\Models\EvalMateElementalP1Model;





/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller {
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
    protected $CI_VERSION = \CodeIgniter\CodeIgniter::CI_VERSION;
    public $system_version = "1.0";
    public $session = null;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['form', 'url', 'html'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger){
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);


        // Preload any models, libraries, etc, here.
        $this->db = \Config\Database::connect();

        $this->usuarioModel = new UsuarioModel($this->db);
        $this->productoModel = new ProductoModel($this->db);
        $this->centroEducativoModel = new CentroEducativoModel($this->db);
        $this->cursoModel = new CursoModel($this->db);
        $this->nap2Model = new Nap2Model($this->db);
        $this->nap3Model = new Nap3Model($this->db);
        $this->nap4Model = new Nap4Model($this->db);
        $this->ciudadesModel = new CiudadesModel($this->db);
        $this->prod1Model = new Prod1Model($this->db);
        $this->diagDocenteP1 = new DiagnosticoDocenteP1Model($this->db);
        $this->diagMyrpP1 = new DiagnosticoMyrpP1Model($this->db);
        $this->asistenciaP1 = new AsistenciaP1Model($this->db);
        $this->evalFinalP1 = new EvalFinalP1Model($this->db);
        $this->evalMateP1 = new EvalMateP1Model($this->db);
        $this->evalMateElemP1 = new EvalMateElementalP1Model($this->db);

        // E.g.: $this->session = \Config\Services::session();
        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();
        $this->validation = \Config\Services::validation();
    }
}
