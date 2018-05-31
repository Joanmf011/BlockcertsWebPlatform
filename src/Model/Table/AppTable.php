<?php
/**
 * El fichero contiene la clase AppTable
 */

namespace App\Model\Table;

use Cake\Core\Configure;
use Cake\Network\Session;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

use manager\curlmanager\Curlmanager;

/**
 * Clase madre para tables
 */
class AppTable extends Table
{
    // PUBLIC VARS =============================================================
    /**
     * Curl manager
     * @var Curlmanager
     */
    public $curlmanager;

    /**
     * Session
     * @var Cake\Network\Session
     */
    public $session;

    /**
     * Url base
     * @var string $url
     */
    public $url;

    // CALLBACK FUNCTIONS ======================================================
    /**
     * Funcion callback cuando se inicialice la clase
     * @param array $config
     * @return void
     */
    public function initialize(array $config)
    {
        // Llamar al metodo padre
        parent::initialize($config);

        // Inicializar curlmanager
        $api_url = Configure::read("api_url");
        $this->curlmanager = new Curlmanager($api_url);

        $this->session = new Session();
        $token = $this->session->read("token");

        if ( isset($token) ) {
            $this->curlmanager->setToken($token);
        }
    }

    // PROTECTED FUNCTIONS =====================================================
    /**
     * Llamada curl tipo get
     * @param string $url Url destino
     * @return array Respuesta de la API
     */
    protected function curlDelete($url)
    {
        $result = $this->curlmanager->curlDelete($url);
        // Escribir codigo de respuesta en sesion
        $this->session->write("api_code", $result["code"]);
        // Decodificar el JSON
        $result["result"] = json_decode($result["result"], true);
        return $result;
    }

    /**
     * Llamada curl tipo get
     * @param string $url Url destino
     * @return array Respuesta de la API
     */
    protected function curlGet($url)
    {
        $result = $this->curlmanager->curlGet($url);
        // Escribir codigo de respuesta en sesion
        $this->session->write("api_code", $result["code"]);
        // Decodificar el JSON
        $result["result"] = json_decode($result["result"], true);
        return $result;
    }

    /**
     * Llamada curl tipo get
     * @param string $url Url destino
     * @return array Respuesta de la API
     */
    protected function curlPatch($url, $data)
    {
        $result = $this->curlmanager->curlPatch($url, $data);
        // Escribir codigo de respuesta en sesion
        $this->session->write("api_code", $result["code"]);
        // Decodificar el JSON
        $result["result"] = json_decode($result["result"], true);
        return $result;
    }

    /**
     * Llamada curl tipo get
     * @param string $url Url destino
     * @return array Respuesta de la API
     */
    protected function curlPost($url, $data)
    {
        $result = $this->curlmanager->curlPost($url, $data);
        // Escribir codigo de respuesta en sesion
        $this->session->write("api_code", $result["code"]);
        // Decodificar el JSON
        $result["result"] = json_decode($result["result"], true);
        return $result;
    }

    // PUBLIC FUNCTIONS ========================================================
    
    /**
     * Agregar item
     *
     * @param array $data Datos a agregar
     *
     * @return array Respuesta de la API
     */
    public function add(array $data)
    {
        // Obtenemos item
        $result = $this->curlPost($this->url, $data);
        return $result;
    }

    /**
     * Contar items
     *
     * @param array $opt Opciones de busqueda
     *
     * @return array Respuesta de la API
     */
    public function count(array $opt = [])
    {
        $url = $this->url . "/count";
        if (!empty($opt) ) {
            $url .= "?";
            $i = 0;
            foreach ($opt as $key => $value) {
                if ($i > 0) {
                    $url .= "&";
                }
                $url .= $key . "=" . $value;
                $i++;
            }
        }
        $result = $this->curlGet($url);
        return $result;
    }

    /**
     * Editar item
     *
     * @param int $id Identificador unico
     * @param array $data Datos a modificar
     *
     * @return array Respuesta de la API
     */
    public function edit(int $id, array $data)
    {
        // Obtenemos item
        $url = $this->url . "/" . $id;
        $result = $this->curlPatch($url, $data);
        return $result;
    }

    /**
     * Obtener item unico
     *
     * @param int $id Identificador unico
     *
     * @return array Respuesta de la API
     */
    public function fetch(int $id)
    {
        // Obtenemos item
        $url = $this->url . "/" . $id;
        $result = $this->curlGet($url);
        return $result;
    }


    /**
     * Eliminar elemento
     *
     * @param int $id Identificador unico
     *
     * @return array Respuesta de la API
     */
    public function remove(int $id)
    {
        $url = $this->url . "/" . $id;
        $result = $this->curlDelete($url);
        return $result;
    }

    /**
     * Set attribute token
     *
     * @param string $token User token
     *
     * @return void
     */
    public function setToken(string $token)
    {
        $this->token = $token;
        $this->curlmanager->setToken($this->token);
    }

}
