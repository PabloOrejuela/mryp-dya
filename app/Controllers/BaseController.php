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
use App\Models\Nap2ProcessResult;
use App\Models\Nap3Model;
use App\Models\Nap3ProcessResult;
use App\Models\Nap4Model;
use App\Models\Nap4ProcessResult;
use App\Models\Nap5Model;
use App\Models\Nap5ProcessResult;
use App\Models\Nap6Model;
use App\Models\Nap6ProcessResult;
use App\Models\Nap7Model;
use App\Models\Nap7ProcessResult;
use App\Models\CiudadesModel;
use App\Models\ParroquiasModel;
use App\Models\Prod1Model;
use App\Models\Prod3Model;
use App\Models\Prod4Model;
use App\Models\VarProd3Model;
use App\Models\DiagnosticoDocenteP1Model;
use App\Models\DiagnosticoMyrpP1Model;
use App\Models\AsistenciaP1Model;
use App\Models\EvalFinalP1Model;
use App\Models\EvalMateP1Model;
use App\Models\EvalMateElementalP1Model;
use App\Models\EvalMateFinalP1Model;
use App\Models\EvalMateFinalElementalP1Model;
use App\Models\OtrosProd3Model;
use App\Models\ArteProd3Model;
use App\Models\LenguaProd3Model;
use App\Models\CiudadProd3Model;
use App\Models\ProvinciaModel;
use App\Models\CentrosProvProd1ViewModel;
use App\Models\Prod3BibliotecaEncuentroModel;
use App\Models\UsuariosCentrosProd3Model;
use App\Models\Prod3CentroCertificadosModel;
use App\Models\Prod4LenguaModel;
use App\Models\Prod4MateModel;
use App\Models\Prod4PsicoModel;
use App\Models\Prod4PedagogicaModel;
use App\Models\Prod4OtrosModel;
use App\Models\Prod4AtencionesModel;
use App\Models\Prod4ResultadosModel;



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
        $this->nap2ProcessResult  = new Nap2ProcessResult($this->db);
        $this->nap3Model = new Nap3Model($this->db);
        $this->nap3ProcessResult  = new Nap3ProcessResult($this->db);
        $this->nap4Model = new Nap4Model($this->db);
        $this->nap4ProcessResult  = new Nap4ProcessResult($this->db);
        $this->nap5Model = new Nap5Model($this->db);
        $this->nap5ProcessResult  = new Nap5ProcessResult($this->db);
        $this->nap6Model = new Nap6Model($this->db);
        $this->nap6ProcessResult  = new Nap6ProcessResult($this->db);
        $this->nap7Model = new Nap7Model($this->db);
        $this->nap7ProcessResult  = new Nap7ProcessResult($this->db);
        $this->ciudadesModel = new CiudadesModel($this->db);
        $this->parroquiasModel = new ParroquiasModel($this->db);
        $this->prod1Model = new Prod1Model($this->db);
        $this->prod3Model = new Prod3Model($this->db);
        $this->prod4Model = new Prod4Model($this->db);
        $this->diagDocenteP1 = new DiagnosticoDocenteP1Model($this->db);
        $this->diagMyrpP1 = new DiagnosticoMyrpP1Model($this->db);
        $this->asistenciaP1 = new AsistenciaP1Model($this->db);
        $this->evalFinalP1 = new EvalFinalP1Model($this->db);
        $this->evalMateP1 = new EvalMateP1Model($this->db);
        $this->evalMateElemP1 = new EvalMateElementalP1Model($this->db);
        $this->evalMateFinalP1 = new EvalMateFinalP1Model($this->db);
        $this->evalMateFinalElemP1 = new EvalMateFinalElementalP1Model($this->db);
        $this->varProd3Model = new VarProd3Model($this->db);
        $this->otrosProd3Model = new OtrosProd3Model($this->db);
        $this->arteProd3Model = new ArteProd3Model($this->db);
        $this->lenguaProd3Model = new LenguaProd3Model($this->db);
        $this->ciudadProd3Model = new CiudadProd3Model($this->db);
        $this->provinciaModel = new ProvinciaModel($this->db);
        $this->prod3BibliotecaEncuentroModel = new Prod3BibliotecaEncuentroModel($this->db);
        $this->centrosProvProd1ViewModel = new CentrosProvProd1ViewModel($this->db);
        $this->usuariosCentrosProd3Model = new UsuariosCentrosProd3Model($this->db);
        $this->prod3CentroCertificadosModel = new Prod3CentroCertificadosModel($this->db);
        $this->prod4LenguaModel = new Prod4LenguaModel($this->db);
        $this->prod4MateModel = new Prod4MateModel($this->db);
        $this->prod4PsicoModel = new Prod4PsicoModel($this->db);
        $this->prod4PedagogicaModel = new Prod4PedagogicaModel($this->db);
        $this->prod4OtrosModel = new Prod4OtrosModel($this->db);
        $this->prod4AtencionesModel = new Prod4AtencionesModel($this->db);
        $this->prod4ResultadosModel = new Prod4ResultadosModel($this->db);

        // E.g.: $this->session = \Config\Services::session();
        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();
        $this->validation = \Config\Services::validation();
        $this->image = \Config\Services::image();
    }
}
